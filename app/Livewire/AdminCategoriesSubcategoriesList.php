<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class AdminCategoriesSubcategoriesList extends Component
{
    public function render()
    {
        return view('livewire.admin-categories-subcategories-list', [
            'categories' => Category::orderBy('ordering', 'asc')->paginate($this->categoriesPerPage, ['*'], 'categoriesPage'),
            'subcategories' => SubCategory::where('is_child_of', 0)->orderBy('ordering', 'asc')->paginate($this->subcategoriesPerPage, ['*'], 'subcategoriesPage')
        ]);
    }
}
