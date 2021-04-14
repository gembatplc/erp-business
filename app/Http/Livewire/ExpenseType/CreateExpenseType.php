<?php

namespace App\Http\Livewire\ExpenseType;

use App\Models\ExpenseType;
use Livewire\Component;

class CreateExpenseType extends Component
{
    public $name;
    public $description;
    public $status;

    protected $rules = [
        'name' => 'required|min:2|max:255|unique:expense_types,name',
        'description' => 'nullable|max:255',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function add(){
        $this->validate();
        $expenseType = new ExpenseType();
        $expenseType->name = $this->name;
        $expenseType->description = $this->description;
        if($expenseType->save()){
            session()->flash('success', 'expenseTYpe successfully created.');
            $this->emit('refreshExpenseType');
            $this->reset();
        }else{
            session()->flash('error', 'Something went to wrong!! Please Try again.');
        }
    }


    public function render()
    {
        return view('livewire.expense-type.create-expense-type');
    }
}
