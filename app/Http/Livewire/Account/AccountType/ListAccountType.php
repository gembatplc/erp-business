<?php

namespace App\Http\Livewire\Account\AccountType;

use Livewire\Component;
use App\Models\AccountType;
use Livewire\WithPagination;

class ListAccountType extends Component
{
    use WithPagination;
    protected $listeners = ['refreshAccountType' => '$refresh'];
    protected $paginationTheme = 'bootstrap';
    
    public $search;
    public $page = 1;
    public $per_page = 10;

    public $bulkSelectAll = false;
    public $bulk_select = [];

    public $delete_id = null;
    public $delete_single_item = true;

    public $edit_accountType_id = null;
    public $edit_accountType_name;
    public $edit_accountType_description;

    public $edit_accountTypes = [];



    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    protected $rules = [
        'edit_accountTypes.*.name' => 'required|min:2|max:255',
        'edit_accountTypes.*.description' => 'nullable|max:255',
    ];


  
    public function updatedBulkSelectAll($value)
    {
        if($value){
            $this->bulk_select = ExpenseType::pluck('id');
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
                AccountType::find($this->delete_id)->delete();
                session()->flash('success','Account Type Item has been successfully Deleted!!');
                $this->emit('refreshAccountType');
                $this->delete_id = null;
            }
        }else{
            if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
                session()->flash('error','Something went to wrong!!,Please try agian.');

            }else{
                AccountType::destroy($this->bulk_select);
                session()->flash('success','Account Type Items has been successfully Deleted!!');
                $this->emit('refreshAccountType');
                $this->bulk_select = [];
            }
        }    
        
    }




    public function editItem($id)
    {
        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $accountType = AccountType::find($id);
            $this->edit_accountType_id = $accountType->id;
            $this->edit_accountType_name = $accountType->name;
            $this->edit_accountType_description = $accountType->description;
        }
        
    }


    
    


    public function updateItem($id)
    {
        $this->validate([
            "edit_accountType_name" => "required|min:2|max:255|unique:account_types,name,$id",
            "edit_accountType_description" => "nullable|max:255"
        ]);
        
        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $accountType = AccountType::find($id);
            $accountType->name = $this->edit_accountType_name;
            $accountType->description = $this->edit_accountType_description;
            if($accountType->update()){
                session()->flash('success','Account Type Item has been successfully updated!!');
                $this->emit('refreshAccountType');
                // $this->edit_department_id = null;
            }else{
                session()->flash('error','Something went to wrong!!,Please try agian');
            }
        }
    }



    public function editItems()
    {
        $this->edit_accountTypes = AccountType::whereIn('id',$this->bulk_select)->get();
        
    }



    public function updateItems()
    {
        $this->validate();
        foreach ($this->edit_accountTypes as $edit_accountType) {
            $accountType = AccountType::find($edit_accountType->id);
            $accountType->name = $edit_accountType->name;
            $accountType->description = $edit_accountType->description;
            $accountType->update();
        }

        session()->flash('success','Account Type Items has been successfully updated!!');
        $this->emit('refreshAccountType');
        $this->bulk_select = [];
        $this->edit_accountTypes = [];
        $this->bulkSelectAll = false;
    }



    public function exportItems()
    {
        if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
            session()->flash('error','Something went to wrong!!,Please try agian.');

        }else{
            return response()->streamDownload(function(){
                echo AccountType::whereKey($this->bulk_select)->toCsv();
            },'accountTypes.csv');

           $this->bulk_select = [];
        }
    }



    public function render()
    {
        $accountTypes = AccountType::latest()->where('name', 'like', '%'.$this->search.'%')->paginate($this->per_page);
        return view('livewire.account.account-type.list-account-type',['accountTypes' => $accountTypes]);
    }
}
