<?php

use App\Livewire\CategoryComponent;
use App\Livewire\HomeComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeComponent::class);
Route::get('/category', CategoryComponent::class);