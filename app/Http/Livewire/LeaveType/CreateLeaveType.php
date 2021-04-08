<?php

namespace App\Http\Livewire\LeaveType;

use App\Models\LeaveType;
use Livewire\Component;

class CreateLeaveType extends Component
{
    public $name;
    public $description;
    public $max_leave_count = 2;
    public $leave_count_interval = 'monthly';
    public $status;

    protected $rules = [
        'name' => 'required|unique:leave_types,name|min:2|max:255',
        'description' => 'nullable|max:255',
        'max_leave_count' => 'required|between:1,10',
        'leave_count_interval' => 'nullable|max:100'
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function add(){
        $this->validate();
        $leaveType = new LeaveType();
        $leaveType->name = $this->name;
        $leaveType->description = $this->description;
        $leaveType->max_leave_count = $this->max_leave_count;
        $leaveType->leave_count_interval = $this->leave_count_interval;
        if($leaveType->save()){
            session()->flash('success', 'Leave TYpe successfully created.');
            $this->emit('refreshLeaveType');
            $this->reset();
        }else{
            session()->flash('error', 'Something went to wrong!! Please Try again.');
        }
    }


    public function render()
    {
        return view('livewire.leave-type.create-leave-type');
    }
}
