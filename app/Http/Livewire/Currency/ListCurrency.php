<?php

namespace App\Http\Livewire\Currency;

use App\Models\Currency;
use Livewire\Component;
use Livewire\WithPagination;

class ListCurrency extends Component
{
    use WithPagination;
    protected $listeners = ['refreshCurrency' => '$refresh'];
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $page = 1;
    public $per_page = 10;

    public $bulkSelectAll = false;
    public $bulk_select = [];

    public $delete_id = null;
    public $delete_single_item = true;

    public $edit_currency_id = null;
    public $edit_currency_name;
    public $edit_currency_code;
    public $edit_currency_exchange_rate;
   
    public $edit_currencies = [];

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    protected $rules = [
        'edit_currencies.*.name' => 'required|min:2|max:255',
        'edit_currencies.*.code' => 'required',
        'edit_currencies.*.exchange_rate' => 'required',
    ];


    public function updatedBulkSelectAll($value)
    {
        if($value){
            $this->bulk_select = Currency::pluck('id');
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
                Currency::find($this->delete_id)->delete();
                session()->flash('success','Currency Item has been successfully Deleted!!');
                $this->emit('refreshCurrency');
                $this->delete_id = null;
            }
        }else{
            if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
                session()->flash('error','Something went to wrong!!,Please try agian.');

            }else{
            Currency::destroy($this->bulk_select);
                session()->flash('success','Currency Items has been successfully Deleted!!');
                $this->emit('refreshCurrency');
                $this->bulk_select = [];
            }
        }

    }


    public function editItem($id)
    {
        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $currency = Currency::find($id);
            $this->edit_currency_id = $currency->id;
            $this->edit_currency_name = $currency->name;
            $this->edit_currency_code = $currency->code;
            $this->edit_currency_exchange_rate = $currency->exchange_rate;
            
        }

    }


    public function updateItem($id)
    {
        $this->validate([
            "edit_currency_id" => "required",
            "edit_currency_name" => "required",
            "edit_currency_code" => "required",
            "edit_currency_exchange_rate" => "required",
        
        ]);

        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $currency = Currency::find($id);
            $currency->name = $this->edit_currency_name;
            $currency->code = $this->edit_currency_code;
            $currency->exchange_rate = $this->edit_currency_exchange_rate;
            if($currency->update()){
                session()->flash('success','Currency Item has been successfully updated!!');
                $this->emit('refreshCurrency');
                // $this->edit_department_id = null;
            }else{
                session()->flash('error','Something went to wrong!!,Please try agian');
            }
        }
    }

    public function editItems()
    {
        $this->edit_currencies = Currency::whereIn('id',$this->bulk_select)->get();
    }


    public function updateItems()
    {
        $this->validate();


        foreach ($this->edit_currencies as $edit_currency) {
            $currency = Currency::find($edit_currency->id);
            $currency->name = $edit_currency->name;
            $currency->code = $edit_currency->code;
            $currency->exchange_rate = $edit_currency->exchange_rate;
            $currency->update();

        }

        session()->flash('success', 'Currency Items has been successfully updated!!');
        $this->emit('refreshCurrency');
        $this->bulk_select = [];
        $this->edit_currencies = [];
        $this->bulkSelectAll = false;

    }


    public function exportItems()
    {
        if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
            session()->flash('error','Something went to wrong!!,Please try agian.');

        }else{
            return response()->streamDownload(function(){
                echo Currency::whereKey($this->bulk_select)->toCsv();
            },'currencies.csv');

           $this->bulk_select = [];
        }
    }

    
    public function render()
    {
        $currencies = Currency::latest()->where('name', 'like', '%'.$this->search.'%')->paginate($this->per_page);
        return view('livewire.currency.list-currency',['currencies' => $currencies]);
    }
}
