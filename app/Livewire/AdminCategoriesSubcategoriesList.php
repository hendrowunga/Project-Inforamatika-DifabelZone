<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;

class AdminCategoriesSubcategoriesList extends Component
{
    use WithPagination;
    public $categoriesPerPage = 5;
    public $subcategoriesPerPage = 3;
    protected $listener = [
        'updateCategoriesOrdering',
        'deleteCategory',
        'updateSubCategoriesOrdering',
        'updateChildSubCategoriesOrdering',
        'deleteSubCategory'

    ];

    public function updateSubCategoriesOrdering($positions)
    {
        foreach ($positions as $position) {
            $index = $position[0];
            $newPosition = $position[1];
            SubCategory::where('id', $index)->update([
                'ordering' => $newPosition
            ]);
            $this->showToastr('success', 'Sub Categories ordering have been successfully updated.');
        }
    }

    public function updateChildSubCategoriesOrdering($positions)
    {
        foreach ($positions as $position) {
            $index = $position[0];
            $newPosition = $position[1];
            SubCategory::where('id', $index)->update([
                'ordering' => $newPosition
            ]);
            $this->showToastr('success', 'Child Sub Categories ordering have been successfully updated.');
        }
    }

    public function updateCategoriesOrdering($positions)
    {
        foreach ($positions as $position) {
            $index = $position[0];
            $newPosition = $position[1];
            Category::where('id', $index)->update([
                'ordering' => $newPosition
            ]);

            $this->showToastr('success', 'Categories ordering have been successfully updated.');
        }
    }

    public function deleteCategory($category_id)
    {
        $category = Category::findOrFail($category_id);

        // Periksa apakah kategori ini memiliki subkategori
        if ($category->subcategories->count() > 0) {
            // Hapus semua subkategori terkait
            foreach ($category->subcategories as $subcategory) {
                $subcategory->delete();
            }
        }

        // Hapus gambar kategori jika ada
        $path = 'images/categories/';
        $category_image = $category->category_image;
        if (File::exists(public_path($path . $category_image))) {
            File::delete($path . $category_image);
        }

        // Hapus kategori dari database
        $delete = $category->delete();

        if ($delete) {
            $this->showToastr('success', 'Category has been successfully deleted.');
        } else {
            $this->showToastr('error', 'Something went wrong.');
        }
    }

    public function deleteSubCategory($subcategory_id)
    {
        $subcategory = SubCategory::findOrFail($subcategory_id);

        // Periksa apakah subkategori ini memiliki subkategori anak
        if ($subcategory->children->count() > 0) {
            // Hapus semua subkategori anak terkait
            foreach ($subcategory->children as $child) {
                $child->delete();
            }
        }

        //DELETE CATEGORY FROM DB
        $delete = $subcategory->delete();

        if ($delete) {
            $this->showToastr('success', 'Category has been successfully deleted.');
        } else {
            $this->showToastr('error', 'Something went wrong.');
        }
    }

    public function showToastr($type, $message)
    {
        return $this->dispatch('showToastr', [
            'type' => $type,
            'message' => $message
        ]);
    }

    public function render()
    {
        return view('livewire.admin-categories-subcategories-list', [
            'categories' => Category::orderBy('ordering', 'asc')->paginate($this->categoriesPerPage, ['*'], 'categoriesPage'),
            'subcategories' => SubCategory::where('is_child_of', 0)->orderBy('ordering', 'asc')->paginate($this->subcategoriesPerPage, ['*'], 'subcategoriesPage')
        ]);
    }
}