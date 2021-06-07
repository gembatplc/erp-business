<?php

namespace App\Http\Livewire\Account\MoneyTransfer;

use App\Models\Account;
use App\Models\MoneyTransfer;
use Livewire\Component;

class CreateMoneyTransfer extends Component
{
    public $from_account_id;
    public $to_account_id;
    public $status = 1;
    public $amount; 
    public $reference;
    public $date;
    public $transfer_method = 'cash';


    

    protected $rules = [
        'from_account_id' => 'required',
        'to_account_id' => 'required|max:255',
        'amount' => 'required|numeric',
        'date' => 'required|date',
        'reference' => 'required',
        'transfer_method' => 'nullable',
        'status' => 'nullable',

    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }



    public function add(){
        $this->validate();
        $money_transfer = new MoneyTransfer();
        $money_transfer->from_account_id = $this->from_account_id;
        $money_transfer->to_account_id = $this->to_account_id;
        $money_transfer->amount = $this->amount;
        $money_transfer->date = $this->date;
        $money_transfer->reference = $this->reference;
        $money_transfer->status = $this->status;
        $money_transfer->transfer_method = $this->transfer_method;

        if($money_transfer->from_account_id == $money_transfer->to_account_id){
            session()->flash('error', 'From Account and To account has same, please select defrent.');
        }else{
            if($money_transfer->save()){
                session()->flash('success', 'Money Transfer successfully created.');
                $this->emit('refreshMoneyTransfer');
                $this->reset();
            }else{
                session()->flash('error', 'Something went to wrong!! Please Try again.');
            }
        }
        
    }


    public function render()
    {
        $from_accounts = Account::get();
        $to_accounts = Account::get();
        return view('livewire.account.money-transfer.create-money-transfer',['from_accounts' => $from_accounts, 'to_accounts' => $to_accounts]);
    }
}
