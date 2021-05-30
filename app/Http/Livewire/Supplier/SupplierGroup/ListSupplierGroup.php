<?php

namespace App\Http\Livewire\Supplier\SupplierGroup;

use App\Models\SupplierGroup;
use Livewire\Component;
use Livewire\WithPagination;

class ListSupplierGroup extends Component
{
    use WithPagination;
    protected $listeners = ['refreshSupplierGroup' => '$refresh'];
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $page = 1;
    public $per_page = 10;

    public $bulkSelectAll = false;
    public $bulk_select = [];

    public $delete_id = null;
    public $delete_single_item = true;

    public $edit_supplier_group_id = null;
    public $edit_supplier_group_name;
    public $edit_supplier_group_description;
   
    public $edit_supplier_groups = [];

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    protected $rules = [
        'edit_supplier_groups.*.name' => 'required|min:2|max:255',
        'edit_supplier_groups.*.description' => 'required',
    ];


    public function updatedBulkSelectAll($value)
    {
        if($value){
            $this->bulk_select = SupplierGroup::pluck('id');
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
                SupplierGroup::find($this->delete_id)->delete();
                session()->flash('success','Supplier Group Item has been successfully Deleted!!');
                $this->emit('refreshSupplierGroup');
                $this->delete_id = null;
            }
        }else{
            if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
                session()->flash('error','Something went to wrong!!,Please try agian.');

            }else{
                SupplierGroup::destroy($this->bulk_select);
                session()->flash('success','Supplier Group Items has been successfully Deleted!!');
                $this->emit('refreshSupplierGroup');
                $this->bulk_select = [];
            }
        }

    }


    public function editItem($id)
    {
        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $supplier_group = SupplierGroup::find($id);
            $this->edit_supplier_group_id = $supplier_group->id;
            $this->edit_supplier_group_name = $supplier_group->name;
            $this->edit_supplier_group_description = $supplier_group->description;
            
        }

    }


    public function updateItem($id)
    {
        $this->validate([
            "edit_supplier_group_id" => "required",
            "edit_supplier_group_name" => "required",
            "edit_supplier_group_description" => "required",
        
        ]);

        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $supplier_group = SupplierGroup::find($id);
            $supplier_group->name = $this->edit_supplier_group_name;
            $supplier_group->description = $this->edit_supplier_group_description;
            if($supplier_group->update()){
                session()->flash('success','Supplier Group Item has been successfully updated!!');
                $this->emit('refreshSupplierGroup');
                // $this->edit_department_id = null;
            }else{
                session()->flash('error','Something went to wrong!!,Please try agian');
            }
        }
    }

    public function editItems()
    {
        $this->edit_supplier_groups = SupplierGroup::whereIn('id',$this->bulk_select)->get();
    }


    public function updateItems()
    {
        $this->validate();


        foreach ($this->edit_supplier_groups as $edit_supplier_group) {
            $supplier_group = SupplierGroup::find($edit_supplier_group->id);
            $supplier_group->name = $edit_supplier_group->name;
            $supplier_group->description = $edit_supplier_group->description;
            $supplier_group->update();

        }

        session()->flash('success', 'Supplier Group Items has been successfully updated!!');
        $this->emit('refreshSupplierGroup');
        $this->bulk_select = [];
        $this->edit_supplier_groups = [];
        $this->bulkSelectAll = false;

    }


    public function exportItems()
    {
        if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
            session()->flash('error','Something went to wrong!!,Please try agian.');

        }else{
            return response()->streamDownload(function(){
                echo SupplierGroup::whereKey($this->bulk_select)->toCsv();
            },'supplier_group.csv');

           $this->bulk_select = [];
        }
    }

    
    public function render()
    {
        $supplier_groups = SupplierGroup::latest()->where('name', 'like', '%'.$this->search.'%')->paginate($this->per_page);
        return view('livewire.supplier.supplier-group.list-supplier-group',['supplier_groups' => $supplier_groups]);
    }
}
