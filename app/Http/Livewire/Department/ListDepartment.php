<?php

namespace App\Http\Livewire\Department;

use Livewire\Component;
use App\Models\Department;
use Illuminate\Http\Request;
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

    public $edit_department_id = null;
    public $edit_department_name;
    public $edit_department_description;

    public $edit_departments = [];

    public $edit_department_multi_name = [];

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    protected $rules = [
        'edit_department_name' => 'required|min:2|max:255',
        'edit_department_description' => 'nullable|max:255',
    ];

    // public function arrayPush($id)
    // {
    //     if(in_array($id,$this->bulk_select)){
    //         unset($this->bulk_select[array_search($id,$this->bulk_select)]);  
    //     }else{
    //         array_push($this->bulk_select,$id);
    //     }
       
    // }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }


    public function updatedBulkSelectAll($value)
    {
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
                session()->flash('error','Something went to wrong!!,Please try agian.');

            }else{
                Department::destroy($this->bulk_select);
                session()->flash('success','Department Items has been successfully Deleted!!');
                $this->emit('refreshDepartment');
                $this->bulk_select = [];
            }
        }    
        
    }




    public function editItem($id)
    {
        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $department = Department::find($id);
            $this->edit_department_id = $department->id;
            $this->edit_department_name = $department->name;
            $this->edit_department_description = $department->description;
        }
        
    }


    public function editItems()
    {
        $this->edit_departments = Department::whereIn('id',$this->bulk_select)->get();
        foreach($this->edit_departments as $department){
            $this->edit_department = $department;
        }
    }



    public function updateItem($id)
    {
        $this->validate();
        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $department = Department::find($id);
            $department->name = $this->edit_department_name;
            $department->description = $this->edit_department_description;
            if($department->update()){
                session()->flash('success','Department Items has been successfully updated!!');
                $this->emit('refreshDepartment');
                // $this->edit_department_id = null;
            }else{
                session()->flash('error','Something went to wrong!!,Please try agian');
            }
        }
    }


    public function multipleItemUpdate(Request $request)
    {
        dd($request->get('name'));
    }


    


    public function render()
    {
        $departments = Department::latest()->where('name', 'like', '%'.$this->search.'%')->paginate($this->per_page);
        return view('livewire.department.list-department',['departments' => $departments]);
    }
}
