<?php

namespace App\Http\Livewire\Expense;

use Livewire\Component;

class Expense extends Component
{
    public function render()
    {
        return view('livewire.expense.expense')->extends('layouts.app');
    }
}
