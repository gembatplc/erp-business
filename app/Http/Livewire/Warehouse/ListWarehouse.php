<?php

namespace App\Http\Livewire\Warehouse;

use Livewire\Component;
use App\Models\Warehouse;
use Livewire\WithPagination;

class ListWarehouse extends Component
{
    use WithPagination;
    protected $listeners = ['refreshWarehouse' => '$refresh'];
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $page = 1;
    public $per_page = 10;

    public $bulkSelectAll = false;
    public $bulk_select = [];

    public $delete_id = null;
    public $delete_single_item = true;

    public $edit_warehouse_id = null;
    public $edit_warehouse_name;
    public $edit_warehouse_location;
    public $edit_warehouse_description;
   
    public $edit_warehouses = [];

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    protected $rules = [
        'edit_warehouses.*.name' => 'required|min:2|max:255',
        'edit_warehouses.*.location' => 'required',
        'edit_warehouses.*.description' => 'required',
    ];


    public function updatedBulkSelectAll($value)
    {
        if($value){
            $this->bulk_select = Warehouse::pluck('id');
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
                Warehouse::find($this->delete_id)->delete();
                session()->flash('success','Warehouse Item has been successfully Deleted!!');
                $this->emit('refreshWarehouse');
                $this->delete_id = null;
            }
        }else{
            if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
                session()->flash('error','Something went to wrong!!,Please try agian.');

            }else{
                Warehouse::destroy($this->bulk_select);
                session()->flash('success','Warehouse Items has been successfully Deleted!!');
                $this->emit('refreshWarehouse');
                $this->bulk_select = [];
            }
        }

    }


    public function editItem($id)
    {
        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $warehouse = Warehouse::find($id);
            $this->edit_warehouse_id = $warehouse->id;
            $this->edit_warehouse_name = $warehouse->name;
            $this->edit_warehouse_location = $warehouse->location;
            $this->edit_warehouse_description = $warehouse->description;
            
        }

    }


    public function updateItem($id)
    {
        $this->validate([
            "edit_warehouse_id" => "required",
            "edit_warehouse_name" => "required",
            "edit_warehouse_location" => "required",
            "edit_warehouse_description" => "required",
        
        ]);

        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $warehouse = Warehouse::find($id);
            $warehouse->name = $this->edit_warehouse_name;
            $warehouse->location = $this->edit_warehouse_location;
            $warehouse->description = $this->edit_warehouse_description;
            if($warehouse->update()){
                session()->flash('success','Warehouse Item has been successfully updated!!');
                $this->emit('refreshWarehouse');
                // $this->edit_department_id = null;
            }else{
                session()->flash('error','Something went to wrong!!,Please try agian');
            }
        }
    }

    public function editItems()
    {
        $this->edit_warehouses = Warehouse::whereIn('id',$this->bulk_select)->get();
    }


    public function updateItems()
    {
        $this->validate();


        foreach ($this->edit_warehouses as $edit_warehouse) {
            $warehouse = Warehouse::find($edit_warehouse->id);
            $warehouse->name = $edit_warehouse->name;
            $warehouse->location = $edit_warehouse->location;
            $warehouse->description = $edit_warehouse->description;
            $warehouse->update();

        }

        session()->flash('success', 'Warehouse Items has been successfully updated!!');
        $this->emit('refreshWarehouse');
        $this->bulk_select = [];
        $this->edit_warehouses = [];
        $this->bulkSelectAll = false;

    }


    public function exportItems()
    {
        if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
            session()->flash('error','Something went to wrong!!,Please try agian.');

        }else{
            return response()->streamDownload(function(){
                echo Warehouse::whereKey($this->bulk_select)->toCsv();
            },'warehouses.csv');

           $this->bulk_select = [];
        }
    }

    
    public function render()
    {
        $warehouses = Warehouse::latest()->where('name', 'like', '%'.$this->search.'%')->paginate($this->per_page);
        return view('livewire.warehouse.list-warehouse',['warehouses' => $warehouses]);
    }
}
