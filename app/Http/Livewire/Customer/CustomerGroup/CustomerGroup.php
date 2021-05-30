<?php

namespace App\Http\Livewire\Customer\CustomerGroup;

use Livewire\Component;

class CustomerGroup extends Component
{
    
    public function render()
    {
        return view('livewire.customer.customer-group.customer-group')->extends('layouts.app');
    }
}
