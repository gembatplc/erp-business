<?php

namespace App\Http\Livewire\Shift;

use App\Models\Branch;
use App\Models\Shift;
use Livewire\Component;

class CreateShift extends Component
{

    public $branch_id;
    public $shift_type = 0;
    public $start_time; 
    public $end_time;
    public $weekly_holiday = ['friday'];
    public $status;

    protected $rules = [
        'branch_id' => 'required',
        'shift_type' => 'nullable|max:255',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i|after:start_time',
        'weekly_holiday' => 'nullable',

    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function add(){
        $this->validate();
        $shift = new Shift();
        $shift->branch_id = $this->branch_id;
        $shift->shift_type = $this->shift_type;
        $shift->start_time = $this->start_time;
        $shift->end_time = $this->end_time;
        $shift->weekly_holiday = implode(',',$this->weekly_holiday);
        if($shift->save()){
            session()->flash('success', 'Shift successfully created.');
            $this->emit('refreshShift');
            $this->reset();
        }else{
            session()->flash('error', 'Something went to wrong!! Please Try again.');
        }
    }


    public function render()
    {
        $branches = Branch::get();
        return view('livewire.shift.create-shift',['branches' => $branches]);
    }
}
