<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of products
     */
    public function productsList()
    {
        $products = Product::with('category')->latest()->get();
        return view('back.pages.admin.products.product_list', [
            'pageTitle' => 'Product List',
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new product
     */
    public function createProduct()
    {
        $categories = Category::orderBy('name')->get();
        return view('back.pages.admin.products.create_product', [
            'pageTitle' => 'Add Product',
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created product
     */
    // public function storeProduct(Request $request)
    public function storeProduct(Request $request)
    {


        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255|unique:products,name',
            'slug' => 'required|string|unique:products,slug',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'name.required' => 'The product name is required.',
            'name.min' => 'The product name must be at least 3 characters.',
            'name.unique' => 'This product name already exists.',
            'slug.required' => 'The slug is required.',
            'slug.unique' => 'This slug already exists.',
            'category_id.required' => 'The category is required.',
            'category_id.exists' => 'The selected category does not exist.',
            'description.string' => 'The description must be a string.',
            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price must be at least 0.',
            'images.*.image' => 'The image must be an image.',
            'images.*.mimes' => 'The image must be in jpg, jpeg, png, or svg format.',
            'images.*.max' => 'The image size may not exceed 2MB.'

        ]);
        $slug = $request->slug ?: Str::slug($request->name);

        // Handle image upload
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('product_images', $filename, 'public');
                $images[] = $path;
            }
        }

        // Create product
        $product = Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'images' => $images,
            'is_active' => $request->has('is_active'),
            'is_featured' => $request->has('is_featured'),
            'in_stock' => $request->has('in_stock'),
            'on_sale' => $request->has('on_sale'),
        ]);


        return redirect()
            ->route('admin.manage-products.product_list')
            ->with('success', 'Product created successfully!');
    }
    public function editProduct($id)
    {
        $product = Product::findOrFail($id);

        return view('back.pages.admin.products.edit_product', [
            'pageTitle' => 'Edit Product',
            'category' => $product
        ]);
    }

    // Update the specified product
    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => "required|string|min:3|max:255|unique:products,name,$product->id",
            'category_id' => "required|exists:categories,id",
            'description' => "nullable|string",
            'price' => "required|numeric|min:0",
            'images.*' => "nullable|image|mimes:jpeg,png,jpg|max:2048",
        ], [
            'name.required' => 'The category name is required.',
            'name.min' => 'The category name must be at least 3 characters.',
            'name.unique' => 'This category name already exists.',
            'category_id.exists' => 'Category does not exist.',
            'price.numeric' => 'Price must be a number.',
            'price.min' => 'Price must be greater than or equal to 0.',
            'images.image' => 'The file must be an image.',
            'images.mimes' => 'The file must be in jpg, jpeg, png, or svg format.',
            'images.max' => 'The file may not be greater than 2MB.',
        ]);
        $slug = Str::slug($request->name);
        $count = 1;
        while (Product::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = Str::slug($request->name) . '-' . $count;
            $count++;
        }

        $imagePath = $product->image;
        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('category_images', 'public');
        }

        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
            'price' => $request->price,
            'images' => $imagePath,
            'is_active' => $request->boolean('is_active', true),
            'is_featured' => $request->boolean('is_featured', false),
            'in_stock' => $request->boolean('in_stock', true),
            'on_sale' => $request->boolean('on_sale', false),
        ]);
        return redirect()->route('admin.manage-products.product_list')->with('success', 'Product updated successfully!');
    }

    public function showProduct($id)
    {
        $product = Product::findOrFail($id);

        return view('back.pages.admin.products.view_product', [
            'pageTitle' => 'View Product',
            'products' => $product
        ]);
    }
}
