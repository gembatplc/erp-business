<?php

namespace App\Http\Livewire\Warehouse;

use Livewire\Component;
use App\Models\Warehouse;

class CreateWarehouse extends Component
{
    public $name;
    public $location;
    public $description;
    public $status;

    protected $rules = [
        'name' => 'required|min:2|max:255|unique:warehouses,name',
        'location' => 'required',
        'description' => 'nullable|max:255',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function add(){
        $this->validate();
        $warehouse = new Warehouse();
        $warehouse->name = $this->name;
        $warehouse->location = $this->location;
        $warehouse->description = $this->description;
        if($warehouse->save()){
            session()->flash('success', 'Warehouse successfully created.');
            $this->emit('refreshWarehouse');
            $this->reset();
        }else{
            session()->flash('error', 'Something went to wrong!! Please Try again.');
        }
    }

    public function render()
    {
        return view('livewire.warehouse.create-warehouse');
    }
}
