<?php

namespace App\Http\Livewire\Holiday;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Holiday;
use Livewire\Component;

class CreateHoliday extends Component
{
    public $name;
    public $branch_id;
    public $department_id = [];
    public $holiday_type = 0;
    public $start_date; 
    public $end_date;
    public $holiday_reason;
    public $status;

    

    protected $rules = [
        'name' => 'required',
        'branch_id' => 'required',
        'department_id' => 'required',
        'holiday_type' => 'nullable|max:255',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'holiday_reason' => 'nullable',

    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }



    public function add(){
        $this->validate();
        $holiday = new Holiday();
        $holiday->name = $this->name;
        $holiday->department_id = implode(',',$this->department_id);;
        $holiday->branch_id = $this->branch_id;
        $holiday->holiday_type = $this->holiday_type;
        $holiday->start_date = $this->start_date;
        $holiday->end_date = $this->end_date;
        $holiday->holiday_reason = $this->holiday_reason;
        if($holiday->save()){
            session()->flash('success', 'Holiday successfully created.');
            $this->emit('refreshHoliday');
            $this->reset();
        }else{
            session()->flash('error', 'Something went to wrong!! Please Try again.');
        }
    }


    public function render()
    {
        $branches = Branch::get();
        $departments = Department::get();
        return view('livewire.holiday.create-holiday',['departments' => $departments,'branches' => $branches]);
    }
}
