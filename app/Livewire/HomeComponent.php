<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class HomeComponent extends Component
{
    public $models;
    public $categories;
    public $activeForm = false;
    public $activeEdit = false;
    public $editFromProduct = false;

    public $category_id;
    public $name;
    public $company;
    public $country;
    public $price;

    public $searchCategory;
    public $searchName;
    public $searchCompany;
    public $searchCountry;
    public $searchPrice;

    public $editCategory_id;
    public $editName;
    public $editCompany;
    public $editCountry;
    public $editPrice;

    public function mount()
    {
        $this->all();
    }

    public function all()
    {
        $this->models = Product::all();
        $this->categories = Category::all();
        return [$this->models, $this->categories];
    }

    public function render()
    {
        return view('livewire.home-component');
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

       if(!empty($this->category_id) && !empty($this->name) && !empty($this->company) && !empty($this->country) && !empty($this->price)){ 
            Product::create([
                'category_id' => $this->category_id,
                'name' => $this->name,
                'company' => $this->company,
                'country' => $this->country,
                'price' => $this->price,
            ]);
            $this->activeForm = false;
        }
        $this->category_id = '';
        $this->name = '';
        $this->company = '';
        $this->country = '';
        $this->price = '';
        $this->all();
    }   

    public function delete(Product $product)
    {
        if ($product) {
            $product->delete();
        }
        $this->all();
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

    public function searchColumns()
    {
        $this->models = Product::whereHas('category', function($query){
            $query->where('id', 'LIKE', "{$this->searchCategory}%");
        })
        ->where('name', 'LIKE', "{$this->searchName}%")
        ->where('company', 'LIKE', "{$this->searchCompany}%")
        ->where('country', 'LIKE', "{$this->searchCountry}%")
        ->where('price', 'LIKE', "{$this->searchPrice}%")->get();
    }

    public function refresh()
    {
        $this->searchCategory = '';
        $this->searchName = '';
        $this->searchCompany = '';
        $this->searchCountry = '';
        $this->searchPrice = '';
        $this->all();
    }

    public function changeActive(Product $product)
    {
        $product->is_active = !$product->is_active;
        $product->save();
        $this->all();
    }

    public function editForm(Product $product)
    {
        $this->editFromProduct = $product->id;
        $this->editCategory_id = $product->category_id;
        $this->editName = $product->name;
        $this->editCompany = $product->company;
        $this->editCountry = $product->country;
        $this->editPrice = $product->price;
    }

    public function updateForm()
    {
        $models = Product::findOrFail($this->editFromProduct);
        $models->update([
            'category_id' => $this->editCategory_id,
            'name' => $this->editName,
            'company' => $this->editCompany,
            'country' => $this->editCountry,
            'price' => $this->editPrice
        ]);
        $this->editFromProduct = false;
        $this->all();
    }
    
}

