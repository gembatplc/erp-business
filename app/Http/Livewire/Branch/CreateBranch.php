<?php

namespace App\Http\Livewire\Branch;

use App\Models\Branch;
use Livewire\Component;

class CreateBranch extends Component
{
    public $name;
    public $description;
    public $location;
    public $status;

    protected $rules = [
        'name' => 'required|unique:branches,name|min:2|max:255',
        'description' => 'nullable|max:255',
        'location' => 'nullable|min:2|max:255'
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function add(){
        $this->validate();
        $branch = new Branch();
        $branch->name = $this->name;
        $branch->description = $this->description;
        $branch->location = $this->location;
        if($branch->save()){
            session()->flash('success', 'Branch successfully created.');
            $this->emit('refreshBranch');
            $this->reset();
        }else{
            session()->flash('error', 'Something went to wrong!! Please Try again.');
        }
    }


    public function render()
    {
        return view('livewire.branch.create-branch');
    }
}
