<?php

namespace App\Http\Livewire\Brand;

use Livewire\Component;

class Brand extends Component
{
    public function render()
    {
        return view('livewire.brand.brand')->extends('layouts.app');
    }
}
