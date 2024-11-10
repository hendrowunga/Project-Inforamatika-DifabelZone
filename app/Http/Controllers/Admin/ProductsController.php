<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function storeProduct(Request $request)
    {
        // Validation rules
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|min:3|max:255|unique:products,name',
            'slug' => 'required|string|unique:products,slug',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'in_stock' => 'boolean',
            'on_sale' => 'boolean'
        ], [
            'category_id.required' => 'Please select a category',
            'category_id.exists' => 'The selected category is invalid',
            'name.required' => 'Product name is required',
            'name.min' => 'Product name must be at least 3 characters',
            'name.unique' => 'This product name already exists',
            'slug.required' => 'Product slug is required',
            'slug.unique' => 'This slug is already in use',
            'price.required' => 'Product price is required',
            'price.min' => 'Price cannot be negative',
            'images.*.image' => 'File must be an image',
            'images.*.mimes' => 'Image must be jpg, jpeg, or png',
            'images.*.max' => 'Image size cannot exceed 2MB'
        ]);

        // Handle image upload
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '-' . $image->getClientOriginalName();
                $path = $image->storeAs('public/product_images', $filename);
                $images[] = str_replace('public/', '', $path);
            }
        }

        // Create product
        try {
            Product::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
                'price' => $request->price,
                'images' => $images,
                'is_active' => $request->boolean('is_active', true),
                'is_featured' => $request->boolean('is_featured', false),
                'in_stock' => $request->boolean('in_stock', true),
                'on_sale' => $request->boolean('on_sale', false)
            ]);

            return redirect()
                ->route('admin.manage-products.product_list')
                ->with('success', 'Product created successfully');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Failed to create product. Please try again.');
        }
    }
}
