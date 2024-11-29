<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ([
        'category_id',
        'name',
        'company',
        'country',
        'price',
    ]);

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
