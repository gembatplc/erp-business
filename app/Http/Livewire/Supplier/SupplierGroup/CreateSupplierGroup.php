<?php

namespace App\Http\Livewire\Supplier\SupplierGroup;

use Livewire\Component;
use App\Models\SupplierGroup;

class CreateSupplierGroup extends Component
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
        $supplier_group = new SupplierGroup();
        $supplier_group->name = $this->name;
        $supplier_group->description = $this->description;
        if($supplier_group->save()){
            session()->flash('success', 'Supplier group successfully created.');
            $this->emit('refreshSupplierGroup');
            $this->reset();
        }else{
            session()->flash('error', 'Something went to wrong!! Please Try again.');
        }
    }

    public function render()
    {
        return view('livewire.supplier.supplier-group.create-supplier-group');
    }
}
