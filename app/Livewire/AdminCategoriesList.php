<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminCategoriesList extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    public $temp_image;
    public $is_active = true;
    public $category_id;
    public $old_image;
    public $iteration = 0;

    protected $listeners = ['deleteConfirmed' => 'deleteCategory'];

    protected function rules()
    {
        return [
            'name' => 'required|min:3|unique:categories,name,' . ($this->category_id ?? ''),
            'slug' => 'required|unique:categories,slug,' . ($this->category_id ?? ''),
            'image' => $this->category_id ? 'nullable|image|mimes:jpg,jpeg,png|max:1024' : 'required|image|mimes:jpg,jpeg,png|max:1024',
            'is_active' => 'boolean'
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function storeCategory()
    {
        $validatedData = $this->validate();

        if ($this->image) {
            $imageName = $this->slug . '-' . time() . '.' . $this->image->extension();
            $this->image->storeAs('public/categories', $imageName);
            $validatedData['image'] = $imageName;
        }

        try {
            Category::create($validatedData);
            $this->reset();
            $this->iteration++;
            session()->flash('success', 'Category added successfully!');
            $this->dispatch('close-modal');
        } catch (\Exception $e) {
            session()->flash('error', 'Something went wrong!');
        }
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->old_image = $category->image;
        $this->is_active = $category->is_active;
        $this->dispatch('show-edit-modal');
    }

    public function updateCategory()
    {
        $validatedData = $this->validate();

        try {
            $category = Category::findOrFail($this->category_id);

            if ($this->image) {
                // Delete old image
                if ($category->image) {
                    Storage::delete('public/categories/' . $category->image);
                }

                // Store new image
                $imageName = $this->slug . '-' . time() . '.' . $this->image->extension();
                $this->image->storeAs('public/categories', $imageName);
                $validatedData['image'] = $imageName;
            }

            $category->update($validatedData);
            $this->reset();
            $this->iteration++;
            session()->flash('success', 'Category updated successfully!');
            $this->dispatch('close-modal');
        } catch (\Exception $e) {
            session()->flash('error', 'Something went wrong!');
        }
    }

    public function deleteConfirm($id)
    {
        $this->dispatch('show-delete-confirmation', [
            'id' => $id,
            'message' => 'Are you sure you want to delete this category?'
        ]);
    }

    public function deleteCategory($id)
    {
        try {
            $category = Category::findOrFail($id);
            if ($category->image) {
                Storage::delete('public/categories/' . $category->image);
            }
            $category->delete();
            session()->flash('success', 'Category deleted successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'Something went wrong!');
        }
    }


    public function render()
    {
        $categories = Category::latest()->paginate(10);
        return view('livewire.admin-categories-list', [
            'categories' => $categories
        ]);
    }
}
