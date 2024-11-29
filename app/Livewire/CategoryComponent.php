<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{
    public $models;
    public $activeForm = false;
    public $name;
    public $editName;

    public $editFromCategory = false;

    public function mount()
    {
        $this->all();
    }

    public function all()
    {
        $this->models = Category::all();
        return $this->models;
    }

    public function render()
    {
        return view('livewire.category-component');
    }

    public function create()
    {
        $this->activeForm = true;
    }

    public function cancel()
    {
        $this->activeForm = false;
    }
    

    public function save()
    {
       if(!empty($this->name)){ 
            Category::create([
                'name' => $this->name,
            ]);
            $this->activeForm = false;
        }
        $this->name = '';
        $this->all();
    }  

    
    public function delete(Category $category)
    {
        $category->delete();
        $this->all();
    }


    public function editForm(Category $category)
    {
        $this->editFromCategory = $category->id;
        $this->editName = $category->name;
    }

    public function updateForm()
    {
        $models = Category::findOrFail($this->editFromCategory);
        $models->update([
            'name' => $this->editName,
        ]);
        $this->editFromCategory = false;
        $this->all();
    }
}
