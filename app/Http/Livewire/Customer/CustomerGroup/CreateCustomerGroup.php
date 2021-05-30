<?php

namespace App\Http\Livewire\Customer\CustomerGroup;

use App\Models\CustomerGroup;
use Livewire\Component;

class CreateCustomerGroup extends Component
{
    public $name;
    public $description;
    public $status;

    protected $rules = [
        'name' => 'required|min:2|max:255|unique:customer_groups,name',
        'description' => 'nullable|max:255',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function add(){
        $this->validate();
        $customer_group = new CustomerGroup();
        $customer_group->name = $this->name;
        $customer_group->description = $this->description;
        if($customer_group->save()){
            session()->flash('success', 'customer group successfully created.');
            $this->emit('refreshCustomerGroup');
            $this->reset();
        }else{
            session()->flash('error', 'Something went to wrong!! Please Try again.');
        }
    }

    public function render()
    {
        return view('livewire.customer.customer-group.create-customer-group');
    }
}
