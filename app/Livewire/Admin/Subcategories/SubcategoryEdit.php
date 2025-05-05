<?php

namespace App\Livewire\Admin\Subcategories;

use App\Models\Category;
use App\Models\Family;
use App\Models\Subcategory;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SubcategoryEdit extends Component
{
    public $subcategory;

    public $families;

    public $subcategoriesEdit;

    public function mount($subcategory)
    {
        $this->families = Family::all();
        $this->subcategoriesEdit = [
            'family_id' => $subcategory->category->family_id,
            'category_id' => $subcategory->category_id,
            'name' => $subcategory->name,
        ];
    }

    public function updateSubcategoryEditFamilyId()
    {
        $this->subcategoriesEdit['category_id'] = '';
    }

    #[Computed()]
    public function categories()
    {
        return Category::where('family_id', $this->subcategoriesEdit['family_id'])->get();

    }

    public function save()
    {
        $this->validate([
            'subcategoriesEdit.family_id' => 'required|exists:families,id',
            'subcategoriesEdit.category_id' => 'required|exists:categories,id',
            'subcategoriesEdit.name' => 'required'
        ]);

        $this->subcategory->update($this->subcategoriesEdit);

//        session()->flash('swal', [
//            'icon' => 'success',
//            'title' => 'Bien Hecho!',
//            'text' => 'Subcategoría creada correctamente!',
//            'draggable' => true,
//        ]);
        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => 'Bien Hecho!',
            'text' => 'Subcategoría creada correctamente!',
            'draggable' => true,
        ]);
//        return redirect()->route('admin.subcategories.index');
    }


    public function render()
    {
        return view('livewire.admin.subcategories.subcategory-edit');
    }
}
