<?php

namespace App\Http\Livewire\Department;

use Livewire\Component;
use App\Models\Department;
use Livewire\WithPagination;

class ListDepartment extends Component
{
    use WithPagination;
    protected $listeners = ['refreshDepartment' => 'refreshDepartment'];
    protected $paginationTheme = 'bootstrap';
    
    public $search;
    public $page = 1;
    public $per_page = 5;

    public $bulkSelectAll = false;
    public $bulk_select = [];
   
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

    public function refreshDepartment(){
        $this->reset();
    }
    
    public function render()
    {
        $departments = Department::latest()->where('name', 'like', '%'.$this->search.'%')->paginate($this->per_page);
        return view('livewire.department.list-department',['departments' => $departments]);
    }
}
