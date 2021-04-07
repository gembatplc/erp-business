<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;

class Category extends Component
{
    public function render()
    {
        return view('livewire.category.category')->extends('layouts.app');
    }
}
