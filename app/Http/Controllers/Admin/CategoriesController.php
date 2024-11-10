<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    // View category and subcategory list
    public function catSubcatList(Request $request)
    {
        $categories = Category::all(); // Get all categories

        return view('back.pages.admin.categories.cats-subcats-list', [
            'pageTitle' => 'Categories',
            'categories' => $categories
        ]);
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('back.pages.admin.categories.create-category', [
            'pageTitle' => 'Create Category'
        ]);
    }

    // Store a newly created category
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:255|unique:categories,name',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
        ], [
            'name.required' => 'The category name is required.',
            'name.min' => 'The category name must be at least 3 characters.',
            'name.unique' => 'This category name already exists.',
            'image.required' => 'The image is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be in jpg, jpeg, png, or svg format.',
            'image.max' => 'The image size may not exceed 2MB.'
        ]);

        $slug = Str::slug($request->name); // Generate slug from name

        // Check if slug exists
        $count = 1;
        while (Category::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->name) . '-' . $count;
            $count++;
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('category_images', 'public');
        }

        Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'image' => $imagePath,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.manage-categories.cats-subcats-list')
            ->with('success', 'Category created successfully.');
    }

    // Show the form for editing the specified category
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('back.pages.admin.categories.edit-category', [
            'pageTitle' => 'Edit Category',
            'category' => $category
        ]);
    }

    // Update the specified category
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:255|unique:categories,name,' . $category->id,
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'image' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
        ], [
            'name.required' => 'The category name is required.',
            'name.min' => 'The category name must be at least 3 characters.',
            'name.unique' => 'This category name already exists.',
            'slug.required' => 'The slug is required.',
            'slug.unique' => 'This slug already exists.',
            'image.required' => 'The image is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be in jpg, jpeg, png, or svg format.',
            'image.max' => 'The image size may not exceed 2MB.'
        ]);
        $slug = Str::slug($request->name);
        $count = 1;
        while (Category::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = Str::slug($request->name) . '-' . $count;
            $count++;
        }

        $imagePath = $category->image;
        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('category_images', 'public');
        }

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'image' => $imagePath,
            'is_active' => $request->is_active
        ]);

        return redirect()->route('admin.manage-categories.cats-subcats-list')->with('success', 'Category updated successfully.');
    }

    // Remove the specified category
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->route('admin.manage-categories.cats-subcats-list')->with('success', 'Category deleted successfully.');
    }

    // Show the details of a category
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('back.pages.admin.categories.view-category', [
            'pageTitle' => 'View Category',
            'category' => $category
        ]);
    }
}
