<?php

namespace App\Http\Livewire\Leave\LeaveType;

use Livewire\Component;
use App\Models\LeaveType;
use Livewire\WithPagination;

class ListLeaveType extends Component
{
    use WithPagination;
    protected $listeners = ['refreshLeaveType' => '$refresh'];
    protected $paginationTheme = 'bootstrap';
    
    public $search;
    public $page = 1;
    public $per_page = 10;

    public $bulkSelectAll = false;
    public $bulk_select = [];

    public $delete_id = null;
    public $delete_single_item = true;

    public $edit_leaveType_id = null;
    public $edit_leaveType_name;
    public $edit_leaveType_max_leave_count;
    public $edit_leaveType_leave_count_interval;
    public $edit_leaveType_description;

    public $edit_leaveTypes = [];



    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    protected $rules = [
        'edit_leaveTypes.*.name' => 'required|min:2|max:255',
        'edit_leaveTypes.*.max_leave_count' => 'required|between:1,10',
        'edit_leaveTypes.*.leave_count_interval' => 'nullable|min:2|max:100',
        'edit_leaveTypes.*.description' => 'nullable|max:255',
    ];


    


    public function updatedBulkSelectAll($value)
    {
        if($value){
            $this->bulk_select = LeaveType::pluck('id');
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
                LeaveType::find($this->delete_id)->delete();
                session()->flash('success','LeaveType Item has been successfully Deleted!!');
                $this->emit('refreshLeaveType');
                $this->delete_id = null;
            }
        }else{
            if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
                session()->flash('error','Something went to wrong!!,Please try agian.');

            }else{
                LeaveType::destroy($this->bulk_select);
                session()->flash('success','LeaveType Items has been successfully Deleted!!');
                $this->emit('refreshLeaveType');
                $this->bulk_select = [];
            }
        }    
        
    }


    public function editItem($id)
    {
        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $leaveType = LeaveType::find($id);
            $this->edit_leaveType_id = $leaveType->id;
            $this->edit_leaveType_name = $leaveType->name;
            $this->edit_leaveType_max_leave_count = $leaveType->max_leave_count;
            $this->edit_leaveType_leave_count_interval = $leaveType->leave_count_interval;
            $this->edit_leaveType_description = $leaveType->description;
        }
        
    }





    public function updateItem($id)
    {
        $this->validate([
            "edit_leaveType_name" => "required|min:2|max:255|unique:leave_types,name,$id",
            "edit_leaveType_max_leave_count" => "required|between:1,10",
            "edit_leaveType_leave_count_interval" => "nullable|min:2|max:100",
            "edit_leaveType_description" => "nullable|max:255",
        ]);
        
        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $leaveType = LeaveType::find($id);
            $leaveType->name = $this->edit_leaveType_name;
            $leaveType->max_leave_count = $this->edit_leaveType_max_leave_count;
            $leaveType->leave_count_interval = $this->edit_leaveType_leave_count_interval;
            $leaveType->description = $this->edit_leaveType_description;
            if($leaveType->update()){
                session()->flash('success','Leave Type Items has been successfully updated!!');
                $this->emit('refreshLeaveType');
                // $this->edit_department_id = null;
            }else{
                session()->flash('error','Something went to wrong!!,Please try agian');
            }
        }
    }


    public function editItems()
    {
        $this->edit_leaveTypes = LeaveType::whereIn('id',$this->bulk_select)->get();
    }


    public function updateItems()
    {
        $this->validate();
        foreach ($this->edit_leaveTypes as $edit_leaveType) {
            $leaveType = LeaveType::find($edit_leaveType->id);
            $leaveType->name = $edit_leaveType->name;
            $leaveType->max_leave_count = $edit_leaveType->max_leave_count;
            $leaveType->leave_count_interval = $edit_leaveType->leave_count_interval;
            $leaveType->description = $edit_leaveType->description;
            $leaveType->update();
        }

        session()->flash('success','Leave Type Items has been successfully updated!!');
        $this->emit('refreshLeaveType');
        $this->bulk_select = [];
        $this->edit_leaveTypes = [];
        $this->bulkSelectAll = false;

    }


    public function exportItems()
    {
        if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
            session()->flash('error','Something went to wrong!!,Please try agian.');

        }else{
            return response()->streamDownload(function(){
                echo LeaveType::whereKey($this->bulk_select)->toCsv();
            },'leaveTypes.csv');
        }
    }


    public function render()
    {
        $leaveTypes = LeaveType::latest()->where('name', 'like', '%'.$this->search.'%')->paginate($this->per_page);
        return view('livewire.leave.leave-type.list-leave-type',['leaveTypes' => $leaveTypes]);
    }
}
