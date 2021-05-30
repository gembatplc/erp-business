<?php

namespace App\Http\Livewire\Supplier\SupplierGroup;

use Livewire\Component;

class SupplierGroup extends Component
{
    public function render()
    {
        return view('livewire.supplier.supplier-group.supplier-group')->extends('layouts.app');
    }
}
