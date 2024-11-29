<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class HomeComponent extends Component
{
    public $models;
    public $activeForm = false;
    public $activeEdit = false;
    public $name;
    public $price;
    public $count;

    public $editname;
    public $editprice;
    public $editcount;

    public function render()
    {
        $this->models = Product::all();
        return view('livewire.home-component');
    }

    public function create()
    {
        $this->activeForm = true;
    }

    public function save()
    {
       if(!empty($this->name) && !empty($this->price) && !empty($this->count)){ 
            Product::create([
                'name' => $this->name,
                'price' => $this->price,
                'count' => $this->count,
            ]);
            $this->activeForm = false;
        }
    }   

    public function delete(Product $product)
    {
        if ($product) {
            $product->delete();
        }
    }

    public function edit()
    {
        $this->activeEdit = true;
    }

    public function update()
    {
        if(!empty($this->editname) && !empty($this->editprice) && !empty($this->editcount)){ 
            Product::create([
                'name' => $this->editname,
                'price' => $this->editprice,
                'count' => $this->editcount,
            ]);
            $this->activeEdit = false;
        }

    }
    
}

