<?php

namespace App\Http\Livewire\ExpenseType;

use Livewire\Component;

class ExpenseType extends Component
{
    public function render()
    {
        return view('livewire.expense-type.expense-type')->extends('layouts.app');
    }
}
