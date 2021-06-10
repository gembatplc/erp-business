<?php

namespace App\Http\Livewire\Tax;

use Livewire\Component;

class Tax extends Component
{
    public function render()
    {
        return view('livewire.tax.tax')->extends('layouts.app');
    }
}
