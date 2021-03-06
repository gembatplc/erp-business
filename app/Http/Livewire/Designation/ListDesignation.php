<?php

namespace App\Http\Livewire\Designation;

use Livewire\Component;
use App\Models\Designation;
use Livewire\WithPagination;

class ListDesignation extends Component
{
    use WithPagination;
    protected $listeners = ['refreshDesignation' => '$refresh'];
    protected $paginationTheme = 'bootstrap';
    
    public $search;
    public $page = 1;
    public $per_page = 10;

    public $bulkSelectAll = false;
    public $bulk_select = [];

    public $delete_id = null;
    public $delete_single_item = true;

    public $edit_designation_id = null;
    public $edit_designation_name;
    public $edit_designation_description;

    public $edit_designations = [];

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    protected $rules = [
        'edit_designations.*.name' => 'required|min:2|max:255',
        'edit_designations.*.description' => 'nullable|max:255',
    ];

    

    public function updatedBulkSelectAll($value)
    {
        if($value){
            $this->bulk_select = Designation::pluck('id');
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
                Designation::find($this->delete_id)->delete();
                session()->flash('success','Designation Item has been successfully Deleted!!');
                $this->emit('refreshDesignation');
                $this->delete_id = null;
            }
        }else{
            if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
                session()->flash('error','Something went to wrong!!,Please try agian.');

            }else{
                Designation::destroy($this->bulk_select);
                session()->flash('success','Designation Items has been successfully Deleted!!');
                $this->emit('refreshDesignation');
                $this->bulk_select = [];
            }
        }    
        
    }


    public function editItem($id)
    {
        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $designation = Designation::find($id);
            $this->edit_designation_id = $designation->id;
            $this->edit_designation_name = $designation->name;
            $this->edit_designation_description = $designation->description;
        }
        
    }


    


    public function updateItem($id)
    {
        $this->validate([
            "edit_designation_name" => "required|min:2:max:255|unique:designations,name,$id",
            "edit_designation_description" => "nullable|max:255"
        ]);

        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $designation = Designation::find($id);
            $designation->name = $this->edit_designation_name;
            $designation->description = $this->edit_designation_description;
            if($designation->update()){
                session()->flash('success','Designation Items has been successfully updated!!');
                $this->emit('refreshDesignation');
                // $this->edit_department_id = null;
            }else{
                session()->flash('error','Something went to wrong!!,Please try agian');
            }
        }
    }


    public function editItems()
    {
        $this->edit_designations = Designation::whereIn('id',$this->bulk_select)->get();
    }



    public function updateItems()
    {
        $this->validate([
            "edit_designations.*.name" => "required|min:2|max:255",
            "edit_designations.*.description" => "nullable|max:255",
        ]);  

        foreach($this->edit_designations as $edit_designation){
            $designation = Designation::find($edit_designation->id);
            $designation->name = $edit_designation->name;
            $designation->description = $edit_designation->description;
            $designation->update();     
        }

        session()->flash('success','Designation Items has been successfully updated!!');
        $this->emit('refreshDesignation');
        $this->bulk_select = [];
        $this->edit_designations = [];
        $this->bulkSelectAll = false;
    }


    public function exportItems()
    {
        if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
            session()->flash('error','Something went to wrong!!,Please try agian.');

        }else{
            return response()->streamDownload(function(){
                echo Designation::whereKey($this->bulk_select)->toCsv();
            },'designations.csv');

           $this->bulk_select = [];
        }
    }


    public function render()
    {
        $designations = Designation::latest()->where('name', 'like', '%'.$this->search.'%')->paginate($this->per_page);
        return view('livewire.designation.list-designation',['designations' => $designations]);
    }
}
