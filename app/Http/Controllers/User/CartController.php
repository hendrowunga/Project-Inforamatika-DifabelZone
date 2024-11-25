<?php

namespace App\Http\Controllers\Cart;

//controlernya dan request
use App\Http\Controllers\Controller;
use App\Http\Requests\cart\cart as CartCart;
use App\Http\Requests\cart\cartRequest;
// use App\Http\Requests\cart\cart_of_productRequest;

//viewnya
use Illuminate\Http\Request;

//model
use App\Models\Carts;
use App\Models\User;
use App\Models\OrderItems;
use App\Models\Cart_of_product;
use App\Models\Product;

//tambahan
use Illuminate\Support\Facades\DB;


//keranjang dan hubungan dengan produknya
class CartController extends Controller
{
    public function create_cart(cartRequest $request)
    {
        // Ambil ID pengguna yang sedang login
        $customerId = auth()->id(); 

        // Cek apakah pengguna sudah memiliki keranjang aktif
        $existingCart = Carts::where('customer_id', $customerId)
                            ->where('status', 'active')
                            ->first();

        //cek
        if ($existingCart) {
            return response()->json(['message' => 'You already have an active cart', 'data' => $existingCart], 400);
        }

        // Buat keranjang baru
        $cart = Carts::create([
            'customer_id' => $customerId, // sesuaikan dengan kolom di database
            'status' => 'active',
            'total_quantity' => 0,
        ]);        

        //berhasil
        return response()->json(['message' => 'You now have a cart', 'data' => $cart], 201);
    }


    public function view_cart_product($cartId)
    {
        //cek status
        $cart = Carts::where('id', $cartId)
                ->where('status', 'active') // Filter berdasarkan status aktif
                ->first();

        // Cek cart 
        $cart = Carts::find($cartId);
        if (!$cart) {
            return response()->json(['message' => 'pesen dulu dong'], 404);
        }

        // Mengambil data produk yang terkait dengan cart ini, termasuk detail produk dari tabel `products`
        $products = $cart->products->map(function ($product) {
            return [
                'name' => $product->name,
                'image' => $product->images,  // Menampilkan gambar produk (anggap ini array atau string JSON)
                'description' => $product->description,
                'category' => $product->category->name, // Ambil nama kategori produk
                'price' => $product->price,
                'quantity' => $product->pivot->quantity // Mengambil jumlah produk dari tabel pivot
            ];
        });

        //return data
        return response()->json($products, 200);
    }

    public function get_cart_total($cartId)
    {
        //cek status
        $cart = Carts::where('id', $cartId)
                ->where('status', 'active') // Filter berdasarkan status aktif
                ->first();

        $cart = Carts::find($cartId);

        if (!$cart) {
            return response()->json(['message' => 'Cart not found'], 404);
        }

        // Hitung total harga produk dalam keranjang
        $totalPrice = $cart->products->sum(function($product) {
            return $product->price * $product->pivot->quantity; // Harga produk * jumlah produk
        });

        return response()->json([
            'message' => 'Total price calculated successfully',
            'total_price' => $totalPrice
        ], 200);
    }


    public function addProduct(cartRequest $request, $cartId)
    {
        // // memulai transakasi untuk menyimpan data
        DB::beginTransaction();

        try {
            // Ambil ID pengguna yang sedang login
            $customerId = auth()->id(); 

            // Cek apakah pengguna sudah memiliki keranjang aktif
            $cart = Carts::where('id','id')
                                ->where('customer_id', $customerId)
                                ->where('status', 'active')
                                ->first();
            
            //cek data
            $cart = Carts::find($cartId);
            $product = Product::find($request->product_id); // Cari produk berdasarkan ID

            //cek
            if (!$cart) {
                // Buat keranjang baru
                $cart = Carts::create([
                    'user_id' => $customerId,
                    'status' => 'active', // Status aktif untuk keranjang baru
                    'quantity' => 0, // Inisialisasi quantity dengan 0
                ]);
            };

            if(!$product){
                return response()->json(['message' => 'product not found'], 404);
            };

            // Cek jika produk sudah ada dalam keranjang
            $existingProduct = $cart->products()->where('product_id', $product->id)->first();

            if ($existingProduct) {
                // Jika produk sudah ada, update quantity
                $newQuantity = $existingProduct->pivot->quantity + $request->quantity;
                $cart->products()->updateExistingPivot($product->id, ['quantity' => $newQuantity]);

                DB::commit();

                return response()->json([
                    'message' => 'Product quantity updated successfully',
                    'data' => [
                        'product_name' => $product->name,
                        'new_quantity' => $newQuantity
                    ]
                ], 200);
            } else {
                // Jika produk belum ada dalam keranjang, tambahkan produk ke keranjang
                $cart->products()->attach($product->id, ['quantity' => $request->quantity]);

                DB::commit();

                return response()->json([
                    'message' => 'Product added to cart successfully',
                    'data' => [
                        'product_name' => $product->name,
                        'quantity' => $request->quantity
                    ]
                ], 201);
            }
        } catch (\Exception $e) {
            // Jika terjadi error, rollback transaksi
            DB::rollBack();

            return response()->json(['message' => 'Failed to add product to cart', 'error' => $e->getMessage()], 500);
        }
    }

    public function updateQuantity(cartRequest $request, $cartId)
    {
        // Validasi input data
        $request->validate([
            'product_id' => 'required|exists:products,id', // Memastikan product_id valid
            'quantity' => 'required|integer|min:1', // Pastikan quantity valid
        ]);

        // Ambil ID pengguna yang sedang login
        $customerId = auth()->id();

        // Cari keranjang berdasarkan cartId dan customerId
        $cart = Carts::where('id', $cartId)
                     ->where('customer_id', $customerId)
                     ->where('status', 'active')
                     ->first();

        // Cek jika keranjang tidak ditemukan
        if (!$cart) {
            return response()->json(['message' => 'Cart not found or inactive'], 404);
        }

        // Cari produk berdasarkan product_id
        $product = Product::find($request->product_id);

        // Cek jika produk tidak ditemukan
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Cek jika produk sudah ada dalam keranjang
        $existingProduct = $cart->products()->where('product_id', $product->id)->first();

        if ($existingProduct) {
            // Jika produk sudah ada, update quantity
            $newQuantity = $existingProduct->pivot->quantity + $request->quantity;
            
            // Pastikan quantity tidak negatif
            if ($newQuantity <= 0) {
                return response()->json(['message' => 'Quantity cannot be zero or negative'], 400);
            }

            // Update jumlah produk di tabel pivot
            $cart->products()->updateExistingPivot($product->id, ['quantity' => $newQuantity]);

            return response()->json([
                'message' => 'Product quantity updated successfully',
                'data' => [
                    'product_name' => $product->name,
                    'new_quantity' => $newQuantity
                ]
            ], 200);
        } else {
            // Jika produk belum ada dalam keranjang, tambahkan produk ke keranjang
            $cart->products()->attach($product->id, ['quantity' => $request->quantity]);

            return response()->json([
                'message' => 'Product added to cart successfully',
                'data' => [
                    'product_name' => $product->name,
                    'quantity' => $request->quantity
                ]
            ], 201);
        }
    }

    public function deleteCartProduct(Request $request, $cartId)
    {
        // Validasi input data
        $request->validate([
            'product_id' => 'required|exists:products,id', // Memastikan product_id valid
            'in_stock' => 'required|in_stock'//memastikan produk masih memiliki stock
        ]);

        // Ambil ID pengguna yang sedang login
        $customerId = auth()->id();

        // Cari keranjang berdasarkan cartId dan customerId
        $cart = Carts::where('id', $cartId)
                    ->where('customer_id', $customerId)
                    ->where('status', 'active')
                    ->first();

        // Cek jika keranjang tidak ditemukan
        if (!$cart) {
            return response()->json(['message' => 'Cart not found or inactive'], 404);
        }

        // Cari produk berdasarkan product_id
        $product = Product::find($request->product_id);

        // Cek jika produk tidak ditemukan
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Cek jika produk ada dalam keranjang
        $existingProduct = $cart->products()->where('product_id', $product->id)->first();

        if ($existingProduct) {
            // Hapus produk dari keranjang
            $cart->products()->detach($product->id);

            return response()->json([
                'message' => 'Product removed from cart successfully',
                'data' => [
                    'product_name' => $product->name
                ]
            ], 200);
        } else {
            // Produk tidak ditemukan dalam keranjang
            return response()->json(['message' => 'Product not found in cart'], 404);
        }
    }


}
