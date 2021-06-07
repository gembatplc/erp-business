<?php

namespace App\Http\Livewire\Account\MoneyTransfer;

use App\Models\Account;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MoneyTransfer;

class ListMoneyTransfer extends Component
{
    use WithPagination;
    protected $listeners = ['refreshMoneyTransfer' => '$refresh'];
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $page = 1;
    public $per_page = 10;

    public $bulkSelectAll = false;
    public $bulk_select = [];

    public $delete_id = null;
    public $delete_single_item = true;

    public $edit_money_transfer_id = null;
    public $edit_money_transfer_from_account_id;
    public $edit_money_transfer_to_account_id;
    public $edit_money_transfer_amount;
    public $edit_money_transfer_date;
    public $edit_money_transfer_reference;
    public $edit_money_transfer_transfer_method;
    public $edit_money_transfer_status;

    public $edit_money_transfers = [];



    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    protected $rules = [
        'edit_money_transfers.*.from_account_id' => 'required',
        'edit_money_transfers.*.to_account_id' => 'required',
        'edit_money_transfers.*.amount' => 'required|numeric',
        'edit_money_transfers.*.date' => 'required|date',
        'edit_money_transfers.*.reference' => 'required',
        'edit_money_transfers.*.transfer_method' => 'nullable',
        'edit_money_transfers.*.status' => 'required',
    ];




    public function updatedBulkSelectAll($value)
    {
        if($value){
            $this->bulk_select = MoneyTransfer::pluck('id');
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
                MoneyTransfer::find($this->delete_id)->delete();
                session()->flash('success','Money Transfer Item has been successfully Deleted!!');
                $this->emit('refreshMoneyTransfer');
                $this->delete_id = null;
            }
        }else{
            if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
                session()->flash('error','Something went to wrong!!,Please try agian.');

            }else{
                MoneyTransfer::destroy($this->bulk_select);
                session()->flash('success','Money Transfer Items has been successfully Deleted!!');
                $this->emit('refreshMoneyTransfer');
                $this->bulk_select = [];
            }
        }

    }


    public function editItem($id)
    {
        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $money_transfer = MoneyTransfer::find($id);
            $this->edit_money_transfer_id = $money_transfer->id;
            $this->edit_money_transfer_from_account_id = $money_transfer->from_account_id;
            $this->edit_money_transfer_to_account_id = $money_transfer->to_account_id;
            $this->edit_money_transfer_date = $money_transfer->date;
            $this->edit_money_transfer_amount = $money_transfer->amount;
            $this->edit_money_transfer_reference = $money_transfer->reference;
            $this->edit_money_transfer_transfer_method = $money_transfer->transfer_method;
            $this->edit_money_transfer_status = $money_transfer->status;
        }

    }



    public function updateItem($id)
    {
        $this->validate([
            "edit_money_transfer_from_account_id" => "required",
            "edit_money_transfer_to_account_id" => "required",
            "edit_money_transfer_date" => "required|date",
            "edit_money_transfer_amount" => "required|numeric",
            "edit_money_transfer_reference" => "required",
            "edit_money_transfer_transfer_method" => "nullable",
            "edit_money_transfer_status" => "required",

        ]);

        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $money_transfer = MoneyTransfer::find($id);
            $money_transfer->date = $this->edit_money_transfer_date;
            $money_transfer->from_account_id = $this->edit_money_transfer_from_account_id;
            $money_transfer->to_account_id = $this->edit_money_transfer_to_account_id;
            $money_transfer->amount = $this->edit_money_transfer_amount;
            $money_transfer->reference = $this->edit_money_transfer_reference;
            $money_transfer->transfer_method = $this->edit_money_transfer_transfer_method;
            $money_transfer->status = $this->edit_money_transfer_status;
            if($money_transfer->update()){
                session()->flash('success','Money Transfer Item has been successfully updated!!');
                $this->emit('refreshMoneyTransfer');
                // $this->edit_department_id = null;
            }else{
                session()->flash('error','Something went to wrong!!,Please try agian');
            }
        }
    }


    public function editItems()
    {
        $this->edit_money_transfers = MoneyTransfer::whereIn('id',$this->bulk_select)->get();
    }



    public function updateItems()
    {
        $this->validate();


        foreach ($this->edit_money_transfers as $edit_money_transfer) {
            $money_transfer = MoneyTransfer::find($edit_money_transfer->id);
            $money_transfer->date = $edit_money_transfer->date;
            $money_transfer->from_account_id = $edit_money_transfer->from_account_id;
            $money_transfer->to_account_id = $edit_money_transfer->to_account_id;
            $money_transfer->amount = $edit_money_transfer->amount;
            $money_transfer->reference = $edit_money_transfer->reference;
            $money_transfer->transfer_method = $edit_money_transfer->transfer_method;
            $money_transfer->status = $edit_money_transfer->status;
            $money_transfer->update();

        }

        session()->flash('success', 'Money Transfer has been successfully updated!!');
        $this->emit('refreshMoneyTransfer');
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
                echo MoneyTransfer::whereKey($this->bulk_select)->toCsv();
            },'money_transfers.csv');

           $this->bulk_select = [];
        }
    }
    
    
    public function render()
    {
        $money_transfers = MoneyTransfer::latest()->where('date', 'like', '%'.$this->search.'%')->paginate($this->per_page);
        $from_accounts = Account::get();
        $to_accounts = Account::get();
        return view('livewire.account.money-transfer.list-money-transfer',['money_transfers' => $money_transfers, 'from_accounts' => $from_accounts, 'to_accounts' => $to_accounts]);
    }
}
