<?php

namespace App\Http\Livewire\Customer\CustomerGroup;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CustomerGroup;

class ListCustomerGroup extends Component
{
    use WithPagination;
    protected $listeners = ['refreshCustomerGroup' => '$refresh'];
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $page = 1;
    public $per_page = 10;

    public $bulkSelectAll = false;
    public $bulk_select = [];

    public $delete_id = null;
    public $delete_single_item = true;

    public $edit_customer_group_id = null;
    public $edit_customer_group_name;
    public $edit_customer_group_description;
   
    public $edit_customer_groups = [];

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    protected $rules = [
        'edit_customer_groups.*.name' => 'required|min:2|max:255',
        'edit_customer_groups.*.description' => 'required',
    ];


    public function updatedBulkSelectAll($value)
    {
        if($value){
            $this->bulk_select = CustomerGroup::pluck('id');
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
                CustomerGroup::find($this->delete_id)->delete();
                session()->flash('success','Customer Group Item has been successfully Deleted!!');
                $this->emit('refreshCustomerGroup');
                $this->delete_id = null;
            }
        }else{
            if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
                session()->flash('error','Something went to wrong!!,Please try agian.');

            }else{
                CustomerGroup::destroy($this->bulk_select);
                session()->flash('success','Customer Group Items has been successfully Deleted!!');
                $this->emit('refreshCustomerGroup');
                $this->bulk_select = [];
            }
        }

    }


    public function editItem($id)
    {
        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $customer_group = CustomerGroup::find($id);
            $this->edit_customer_group_id = $customer_group->id;
            $this->edit_customer_group_name = $customer_group->name;
            $this->edit_customer_group_description = $customer_group->description;
            
        }

    }


    public function updateItem($id)
    {
        $this->validate([
            "edit_customer_group_id" => "required",
            "edit_customer_group_name" => "required",
            "edit_customer_group_description" => "required",
        
        ]);

        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $customer_group = CustomerGroup::find($id);
            $customer_group->name = $this->edit_customer_group_name;
            $customer_group->description = $this->edit_customer_group_description;
            if($customer_group->update()){
                session()->flash('success','Customer Group Item has been successfully updated!!');
                $this->emit('refreshCustomerGroup');
                // $this->edit_department_id = null;
            }else{
                session()->flash('error','Something went to wrong!!,Please try agian');
            }
        }
    }

    public function editItems()
    {
        $this->edit_customer_groups = CustomerGroup::whereIn('id',$this->bulk_select)->get();
    }


    public function updateItems()
    {
        $this->validate();


        foreach ($this->edit_customer_groups as $edit_customer_group) {
            $customer_group = CustomerGroup::find($edit_customer_group->id);
            $customer_group->name = $edit_customer_group->name;
            $customer_group->description = $edit_customer_group->description;
            $customer_group->update();

        }

        session()->flash('success', 'Customer Group Items has been successfully updated!!');
        $this->emit('refreshCustomerGroup');
        $this->bulk_select = [];
        $this->edit_customer_groups = [];
        $this->bulkSelectAll = false;

    }


    public function exportItems()
    {
        if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
            session()->flash('error','Something went to wrong!!,Please try agian.');

        }else{
            return response()->streamDownload(function(){
                echo CustomerGroup::whereKey($this->bulk_select)->toCsv();
            },'customer_group.csv');

           $this->bulk_select = [];
        }
    }
    
    public function render()
    {
        $customer_groups = CustomerGroup::latest()->where('name', 'like', '%'.$this->search.'%')->paginate($this->per_page);
        return view('livewire.customer.customer-group.list-customer-group',['customer_groups' => $customer_groups]);
    }
}
