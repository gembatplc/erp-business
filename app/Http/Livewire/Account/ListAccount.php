<?php

namespace App\Http\Livewire\Account;

use App\Models\Account;
use App\Models\AccountType;
use Livewire\Component;
use Livewire\WithPagination;

class ListAccount extends Component
{
    use WithPagination;
    protected $listeners = ['refreshAccount' => '$refresh'];
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $page = 1;
    public $per_page = 10;

    public $bulkSelectAll = false;
    public $bulk_select = [];

    public $delete_id = null;
    public $delete_single_item = true;

    public $edit_account_id = null;
    public $edit_account_account_type_id;
    public $edit_account_initial_balance;
    public $edit_account_account_number;
    public $edit_account_name;
    public $edit_account_status;
    public $edit_account_balance;

    public $edit_accounts = [];



    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    protected $rules = [
        'edit_accounts.*.account_type_id' => 'required',
        'edit_accounts.*.name' => 'required',
        'edit_accounts.*.initial_balance' => 'required',
        'edit_accounts.*.account_number' => 'required',
        'edit_accounts.*.balance' => 'required',
        'edit_accounts.*.status' => 'required',
    ];




    public function updatedBulkSelectAll($value)
    {
        if($value){
            $this->bulk_select = Account::pluck('id');
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
                Account::find($this->delete_id)->delete();
                session()->flash('success','Account Item has been successfully Deleted!!');
                $this->emit('refreshAccount');
                $this->delete_id = null;
            }
        }else{
            if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
                session()->flash('error','Something went to wrong!!,Please try agian.');

            }else{
                Account::destroy($this->bulk_select);
                session()->flash('success','Account Items has been successfully Deleted!!');
                $this->emit('refreshAccount');
                $this->bulk_select = [];
            }
        }

    }


    public function editItem($id)
    {
        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $account = Account::find($id);
            $this->edit_account_id = $account->id;
            $this->edit_account_account_type_id = $account->account_type_id;
            $this->edit_account_name = $account->name;
            $this->edit_account_initial_balance = $account->initial_balance;
            $this->edit_account_account_number = $account->account_number;
            $this->edit_account_status = $account->status;
            $this->edit_account_balance = $account->balance;
        }

    }



    public function updateItem($id)
    {
        $this->validate([
            "edit_account_account_type_id" => "required",
            "edit_account_name" => "required",
            "edit_account_initial_balance" => "required",
            "edit_account_account_number" => "required|after:edit_shift_start_time",
            "edit_account_balance" => "required",
            "edit_account_status" => "required",

        ]);

        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $account = Account::find($id);
            $account->name = $this->edit_account_name;
            $account->account_type_id = $this->edit_account_account_type_id;
            $account->initial_balance = $this->edit_account_initial_balance;
            $account->account_number = $this->edit_account_account_number;
            $account->status = $this->edit_account_status;
            $account->balance = $this->edit_account_balance;
            if($account->update()){
                session()->flash('success','Accou8nt Item has been successfully updated!!');
                $this->emit('refreshAccount');
                // $this->edit_department_id = null;
            }else{
                session()->flash('error','Something went to wrong!!,Please try agian');
            }
        }
    }


    public function editItems()
    {
        $this->edit_accounts = Account::whereIn('id',$this->bulk_select)->get();
    }



    public function updateItems()
    {
        $this->validate();


        foreach ($this->edit_accounts as $edit_account) {
            $account = Account::find($edit_account->id);
            $account->name = $edit_account->name;
            $account->account_type_id = $edit_account->account_type_id;
            $account->initial_balance = $edit_account->initial_balance;
            $account->account_number = $edit_account->account_number;
            $account->status = $edit_account->status;
            $account->balance = $edit_account->balance;
            $account->update();

        }

        session()->flash('success', 'Account has been successfully updated!!');
        $this->emit('refreshAccount');
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
                echo Account::whereKey($this->bulk_select)->toCsv();
            },'accounts.csv');

           $this->bulk_select = [];
        }
    }
    
    public function render()
    {
        $accounts = Account::latest()->where('name', 'like', '%'.$this->search.'%')->paginate($this->per_page);
        $account_types = AccountType::get();
        return view('livewire.account.list-account',['accounts' => $accounts, 'account_types' => $account_types]);
    }
}
