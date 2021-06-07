<?php

namespace App\Http\Livewire\Account\AccountType;

use App\Models\AccountType;
use Livewire\Component;

class CreateAccountType extends Component
{
    public $name;
    public $description;
    public $status;

    protected $rules = [
        'name' => 'required|min:2|max:255|unique:account_types,name',
        'description' => 'nullable|max:255',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function add(){
        $this->validate();
        $accountType = new AccountType();
        $accountType->name = $this->name;
        $accountType->description = $this->description;
        if($accountType->save()){
            session()->flash('success', 'Account Type successfully created.');
            $this->emit('refreshAccountType');
            $this->reset();
        }else{
            session()->flash('error', 'Something went to wrong!! Please Try again.');
        }
    }

    public function render()
    {
        return view('livewire.account.account-type.create-account-type');
    }
}
