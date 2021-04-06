<?php

namespace App\Http\Livewire\Department;

use App\Models\Department;
use Livewire\Component;

class CreateDepartment extends Component
{
    public $name;
    public $description;
    public $status;

    protected $rules = [
        'name' => 'required|min:2|max:255|unique:departments,name',
        'description' => 'nullable|max:255',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function add(){
        $this->validate();
        $department = new Department();
        $department->name = $this->name;
        $department->description = $this->description;
        if($department->save()){
            session()->flash('success', 'Department successfully created.');
            $this->emit('refreshDepartment');
            $this->reset();
        }else{
            session()->flash('error', 'Something went to wrong!! Please Try again.');
        }
    }

    
    public function render()
    {
        return view('livewire.department.create-department');
    }
}
