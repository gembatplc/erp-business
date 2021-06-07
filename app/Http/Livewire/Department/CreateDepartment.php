<?php

namespace App\Http\Livewire\Department;

use App\Models\Department;
use Livewire\Component;

class CreateDepartment extends Component
{
    public $name;
    public $description;
    public $parent_id;
    public $status;

    protected $rules = [
        'name' => 'required|min:2|max:255|unique:departments,name',
        'description' => 'nullable|max:255',
        'parent_id' => 'nullable'
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function add(){
        $this->validate();
        $department = new Department();
        $department->name = $this->name;
        $department->parent_id = $this->parent_id ?? null;
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
        $departments = Department::get();
        return view('livewire.department.create-department',['departments' => $departments]);
    }
}
