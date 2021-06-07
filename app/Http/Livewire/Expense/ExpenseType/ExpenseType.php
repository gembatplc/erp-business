<?php

namespace App\Http\Livewire\Expense\ExpenseType;

use Livewire\Component;

class ExpenseType extends Component
{
    public function render()
    {
        return view('livewire.expense.expense-type.expense-type')->extends('layouts.app');
    }
}
