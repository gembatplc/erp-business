<?php

namespace App\Http\Livewire\Sale;

use Livewire\Component;

class AddSale extends Component
{
    public function render()
    {
        return view('livewire.sale.add-sale')->extends('layouts.app');
    }
}
