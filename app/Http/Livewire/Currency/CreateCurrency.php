<?php

namespace App\Http\Livewire\Currency;

use Livewire\Component;
use App\Models\Currency;

class CreateCurrency extends Component
{
    public $name;
    public $code;
    public $exchange_rate;
    public $status;

    protected $rules = [
        'name' => 'required|min:2|max:255|unique:currencies,name',
        'code' => 'required|unique:currencies,code',
        'exchange_rate' => 'required',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function add(){
        $this->validate();
        $currency = new Currency();
        $currency->name = $this->name;
        $currency->code = $this->code;
        $currency->exchange_rate = $this->exchange_rate;
        if($currency->save()){
            session()->flash('success', 'Currency successfully created.');
            $this->emit('refreshCurrency');
            $this->reset();
        }else{
            session()->flash('error', 'Something went to wrong!! Please Try again.');
        }
    }

    public function render()
    {
        return view('livewire.currency.create-currency');
    }
}
