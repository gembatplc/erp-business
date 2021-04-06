<?php

namespace App\Http\Livewire\Designation;

use Livewire\Component;
use App\Models\Designation;

class CreateDesignation extends Component
{
    public $name;
    public $description;
    public $status;

    protected $rules = [
        'name' => 'required|min:2|max:255|unique:designations',
        'description' => 'nullable|max:255',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function add(){
        $this->validate();
        $designation = new Designation();
        $designation->name = $this->name;
        $designation->description = $this->description;
        if($designation->save()){
            session()->flash('success', 'Designation successfully created.');
            $this->emit('refreshDesignation');
            $this->reset();
        }else{
            session()->flash('error', 'Something went to wrong!! Please Try again.');
        }
    }


    public function render()
    {
        return view('livewire.designation.create-designation');
    }
}
