<?php

namespace App\Http\Livewire\Warehouse;

use Livewire\Component;

class Warehouse extends Component
{
    public function render()
    {
        return view('livewire.warehouse.warehouse')->extends('layouts.app');
    }
}
