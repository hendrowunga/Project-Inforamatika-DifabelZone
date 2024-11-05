<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Tampil
    public function index()
    {
        $products = Product::all();
        return view('admin/adminPage', compact('products'));
    }

    // Input & Update
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            // 'image' => 'nullable|image', // jika ada upload gambar
        ]);

        // Jika ada ID, update produk, jika tidak, buat produk baru
        Product::updateOrCreate(['id' => $request->id], $validatedData);

        return redirect()->route('admin.index')->with('success', 'Produk berhasil disimpan.');
    }

    // Ambil Data untuk update
    public function edit($id)
    {
        $product = Product::findOrFail($id); // Mengambil produk berdasarkan ID
        return response()->json($product); // Mengembalikan produk dalam format JSON
    }


    // Hapus
    public function destroy($id)
    {
        Product::destroy($id); // Menghapus produk berdasarkan ID
        return redirect()->route('admin.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function reloadProducts()
    {
        $products = Product::all();
        return response()->json(['products' => $products]);
    }

}
