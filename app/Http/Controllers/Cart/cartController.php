<?php

namespace App\Http\Controllers\Cart;

//controlernya
use App\Http\Controllers\Controller;
use App\Http\Requests\cart\cart as CartCart;
use App\Http\Requests\cart\cartRequest;
use App\Http\Requests\cart\cart_of_productRequest;

//viewnya
use Illuminate\Http\Request;

//model
use App\Models\cart;
use App\Models\User;
use App\Models\cart_of_order;
use App\Models\cart_of_product;
use App\Models\Product;

//tambahan
use Illuminate\Support\Facades\DB;


//keranjang dan hubungan dengan produknya
class cartController extends Controller
{
    public function create_cart(cartRequest $request)
    {
        // Simpan data cart
        $cart = Cart::create([
            'total_quantity' => $request->total_quantity,
            'total_price' => $request->total_price,
            'customer_id' => $request->customer_id,
        ]);

        // //ngambil langsung dari validasi
        // $cart = Cart::create($request->validated());

        //pengecekan apakah data masuk atau tidak
        return response()->json(['message' => 'you now have cart', 'data' => $cart]);
    }

    public function view_cart_product($cartId)
    {
        // Cek cart 
        $cart = Cart::find($cartId);
        if (!$cart) {
            return response()->json(['message' => 'pesen dulu dong'], 404);
        }

        // Mengambil data produk yang terkait dengan cart ini, termasuk detail produk dari tabel `products`
        $cartProducts = cart_of_product::with('product')
                        ->where('cart_id', $cartId)
                        ->get();

        return response()->json(['cart_id' => $cartId, 'products' => $cartProducts]);
    }

    public function addProduct(cart_of_productRequest $request, $cartId)
    {
        // // memulai transakasi untuk menyimpan data
        // DB::beginTransaction();

        // Cek apakah ada cart untuk customer ini
        $cart = Cart::firstOrCreate(
        ['customer_id' => $request->customer_id],
        [//default
            'total_quantity' => 0,  
            'total_price' => 0.000,
        ]);

        //nambahain produk
        $cartProduct = cart_of_product::create([
            'cart_id' => $cart->id,
            'product_id' => $request->product_id,
            'quantity_product' => $request->quantity_product,
            'price_product' => $request->price_product, //tidak harus ada untuk saat ini
        ]);

        // Update data terbaru
        $cart->total_quantity += $request->quantity_product;
        $cart->total_price += $request->quantity_product * $request->price_product;
        $cart->save();

        // //save data atau jika ingin lebih aman
        // DB::commit();

        return response()->json(['message' => 'product successfully added to cart', 'data' => $cartProduct]);
    }

    public function update_product(cart_of_productRequest $request, $cartId, $productId)
    {
        // Cari produk dalam cart berdasarkan cart_id dan product_id
        $cartProduct = cart_of_product::where('cart_id', $cartId)
                                      ->where('product_id', $productId)
                                      ->first();

        // Jika produk tidak ditemukan dalam cart
        if (!$cartProduct) {
            return response()->json(['message' => 'Productnya gak ada su, macam mana ni'], 404);
        }

        // // memulai transakasi untuk menyimpan data
        // DB::beginTransaction();

        // Hitung perubahan quantity dan price
        $oldQuantity = $cartProduct->quantity_product;
        $newQuantity = $request->quantity_product;
        $quantityDifference = $newQuantity - $oldQuantity;
        $priceDifference = $quantityDifference * $cartProduct->price_product;

        // Update quantity_product dalam tabel cart_of_product
        $cartProduct->quantity_product = $newQuantity;
        $cartProduct->save();

        // Update total_quantity dan total_price dalam tabel cart
        $cart = Cart::find($cartId);
        $cart->total_quantity += $quantityDifference;
        $cart->total_price += $priceDifference;
        $cart->save();
        
        // //save data atau jika ingin lebih aman
        // DB::commit();

        return response()->json(['message' => 'Product quantity updated successfully', 'data' => $cartProduct]);
    }

    public function removeProduct(Request $request, $cartId, $productId)
    {
        // Cek cart
        $cartProduct = cart_of_product::where('cart_id', $cartId)
                                      ->where('product_id', $productId)
                                      ->first();

        // Jika produk tidak ditemukan dalam cart
        if (!$cartProduct) {
            return response()->json(['message' => 'Product not found in cart'], 404);
        }
        
        // // memulai transakasi untuk menyimpan data
        // DB::beginTransaction();

        // Simpan quantity dan price dari produk
        $quantityToRemove = $cartProduct->quantity_product;
        $priceToRemove = $quantityToRemove * $cartProduct->price_product;

        // Hapus produk
        $cartProduct->delete();

        // Update total_quantity dan total_price di cart setelah update
        $cart = Cart::find($cartId);
        $cart->total_quantity -= $quantityToRemove;
        $cart->total_price -= $priceToRemove;
        $cart->save();
        
        // //save data atau jika ingin lebih aman
        // DB::commit();

        return response()->json(['message' => 'Product removed from cart successfully']);
    }


}
