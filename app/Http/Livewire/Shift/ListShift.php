<?php

namespace App\Http\Livewire\Shift;

use App\Models\Branch;
use App\Models\Shift;
use Livewire\Component;
use Livewire\WithPagination;

class ListShift extends Component
{
    use WithPagination;
    protected $listeners = ['refreshShift' => '$refresh'];
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $page = 1;
    public $per_page = 10;

    public $bulkSelectAll = false;
    public $bulk_select = [];

    public $delete_id = null;
    public $delete_single_item = true;

    public $edit_shift_id = null;
    public $edit_shift_branch_id;
    public $edit_shift_shift_type;
    public $edit_shift_start_time;
    public $edit_shift_end_time;
    public $edit_shift_weekly_holiday;

    public $edit_shifts = [];



    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    protected $rules = [
        'edit_shifts.*.branch_id' => 'required',
        'edit_shifts.*.shift_type' => 'required',
        'edit_shifts.*.start_time' => 'required',
        'edit_shifts.*.end_time' => 'required',
        'edit_shifts.*.weekly_holiday' => 'nullable',
    ];




    public function updatedBulkSelectAll($value)
    {
        if($value){
            $this->bulk_select = Shift::pluck('id');
        }else{
            $this->bulk_select = [];
        }
    }

    public function deleteItem()
    {
        if($this->delete_single_item == true) {
            if($this->delete_id == null || $this->delete_id == ''){
                session()->flash('error','Something went to wrong!!,Please try agian');

            }else{
                Shift::find($this->delete_id)->delete();
                session()->flash('success','Shift Item has been successfully Deleted!!');
                $this->emit('refreshShift');
                $this->delete_id = null;
            }
        }else{
            if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
                session()->flash('error','Something went to wrong!!,Please try agian.');

            }else{
                Shift::destroy($this->bulk_select);
                session()->flash('success','Shift Items has been successfully Deleted!!');
                $this->emit('refreshShift');
                $this->bulk_select = [];
            }
        }

    }


    public function editItem($id)
    {
        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $shift = Shift::find($id);
            $this->edit_shift_id = $shift->id;
            $this->edit_shift_branch_id = $shift->branch_id;
            $this->edit_shift_shift_type = $shift->shift_type;
            $this->edit_shift_start_time = $shift->start_time;
            $this->edit_shift_end_time = $shift->end_time;
            $this->edit_shift_weekly_holiday = explode(',',$shift->weekly_holiday);
        }

    }



    public function updateItem($id)
    {
        $this->validate([
            "edit_shift_branch_id" => "required",
            "edit_shift_shift_type" => "required",
            "edit_shift_start_time" => "required",
            "edit_shift_end_time" => "required|after:edit_shift_start_time",
            "edit_shift_weekly_holiday" => "nullable",

        ]);

        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $shift = Shift::find($id);
            $shift->shift_type = $this->edit_shift_shift_type;
            $shift->branch_id = $this->edit_shift_branch_id;
            $shift->start_time = $this->edit_shift_start_time;
            $shift->end_time = $this->edit_shift_end_time;
            $shift->weekly_holiday = implode(',',$this->edit_shift_weekly_holiday);
            if($shift->update()){
                session()->flash('success','Shift Item has been successfully updated!!');
                $this->emit('refreshShift');
                // $this->edit_department_id = null;
            }else{
                session()->flash('error','Something went to wrong!!,Please try agian');
            }
        }
    }


    public function editItems()
    {
        $this->edit_shifts = Shift::whereIn('id',$this->bulk_select)->get();
    }



    public function updateItems()
    {
        $this->validate();


        foreach ($this->edit_shifts as $edit_shift) {
            $shift = Shift::find($edit_shift->id);
            $shift->shift_type = $edit_shift->shift_type;
            $shift->branch_id = $edit_shift->branch_id;
            $shift->start_time = $edit_shift->start_time;
            $shift->end_time = $edit_shift->end_time;
            $shift->weekly_holiday = implode(',',$edit_shift->weekly_holiday);

        }

        session()->flash('success', 'Shift Items has been successfully updated!!');
        $this->emit('refreshShift');
        $this->bulk_select = [];
        $this->edit_shifts = [];
        $this->bulkSelectAll = false;

    }


    public function exportItems()
    {
        if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
            session()->flash('error','Something went to wrong!!,Please try agian.');

        }else{
            return response()->streamDownload(function(){
                echo Shift::whereKey($this->bulk_select)->toCsv();
            },'shifts.csv');

           $this->bulk_select = [];
        }
    }


    public function render()
    {
        $shifts = Shift::latest()->where('shift_type', 'like', '%'.$this->search.'%')->paginate($this->per_page);
        $branches = Branch::get();
        return view('livewire.shift.list-shift',['shifts' => $shifts,'branches' => $branches]);
    }
}
