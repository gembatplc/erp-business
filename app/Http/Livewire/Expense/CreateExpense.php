<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use App\Models\ExpenseType;
use Livewire\Component;

class CreateExpense extends Component
{
    public $expense_type_id;
    public $date; 
    public $amount;
    public $expense_reason;
    public $reference;


    

    protected $rules = [
        'expense_type_id' => 'required',
        'date' => 'required|date',
        'amount' => 'required|numeric',
        'expense_reason' => 'nullable',
        'reference' => 'nullable',

    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }



    public function add(){
        $this->validate();
        $expense = new Expense();
        $expense->expense_type_id = $this->expense_type_id;
        $expense->date = $this->date;
        $expense->amount = $this->amount;
        $expense->expense_reason = $this->expense_reason;
        $expense->reference = $this->reference;
        if($expense->save()){
            session()->flash('success', 'Expense successfully created.');
            $this->emit('refreshExpense');
            $this->reset();
        }else{
            session()->flash('error', 'Something went to wrong!! Please Try again.');
        }
    }

    public function render()
    {
        $expense_types = ExpenseType::get();
        return view('livewire.expense.create-expense',['expense_types' => $expense_types]);
    }
}
