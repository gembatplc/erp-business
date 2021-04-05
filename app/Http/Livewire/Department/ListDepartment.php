<?php

namespace App\Http\Livewire\Department;

use Livewire\Component;
use App\Models\Department;
use Livewire\WithPagination;

class ListDepartment extends Component
{
    use WithPagination;
    protected $listeners = ['refreshDepartment' => '$refresh'];
    protected $paginationTheme = 'bootstrap';
    
    public $search;
    public $page = 1;
    public $per_page = 10;

    public $bulkSelectAll = false;
    public $bulk_select = [];
    public $delete_id = null;
    public $delete_single_item = true;
   
    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function updatedBulkSelectAll($value)
    {
        # code...
        // $this->bulkSelectAll = !$this->bulkSelectAll;
        if($value){
            $this->bulk_select = Department::pluck('id');
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
                Department::find($this->delete_id)->delete();
                session()->flash('success','Department Item has been successfully Deleted!!');
                $this->emit('refreshDepartment');
                $this->delete_id = null;
            }
        }else{
            if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
                session()->flash('error','Something went to wrong!!,Please try agian. selected on');

            }else{
                Department::destroy($this->bulk_select);
                session()->flash('success','Department Items has been successfully Deleted!!');
                $this->emit('refreshDepartment');
                $this->bulk_select = [];
            }
        }
        


        
    }

    public function render()
    {
        $departments = Department::latest()->where('name', 'like', '%'.$this->search.'%')->paginate($this->per_page);
        return view('livewire.department.list-department',['departments' => $departments]);
    }
}
