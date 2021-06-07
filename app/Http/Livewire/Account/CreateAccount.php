<?php

namespace App\Http\Livewire\Account;

use App\Models\Account;
use App\Models\AccountType;
use Livewire\Component;

class CreateAccount extends Component
{
    public $account_type_id;
    public $status = 1;
    public $name; 
    public $initial_balance;
    public $account_number;


    

    protected $rules = [
        'account_type_id' => 'required',
        'name' => 'required|max:255',
        'initial_balance' => 'required|numeric',
        'account_number' => 'required|numeric',
        'status' => 'nullable',

    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }



    public function add(){
        $this->validate();
        $account = new Account();
        $account->account_type_id = $this->account_type_id;
        $account->name = $this->name;
        $account->initial_balance = $this->initial_balance;
        $account->account_number = $this->account_number;
        $account->status = $this->status;
        $account->balance = $this->initial_balance;
        if($account->save()){
            session()->flash('success', 'Account successfully created.');
            $this->emit('refreshAccount');
            $this->reset();
        }else{
            session()->flash('error', 'Something went to wrong!! Please Try again.');
        }
    }


    public function render()
    {
        $account_types = AccountType::get();
        return view('livewire.account.create-account',['account_types' => $account_types]);
    }
}
