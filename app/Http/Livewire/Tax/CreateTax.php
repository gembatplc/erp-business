<?php

namespace App\Http\Livewire\Tax;

use App\Models\Tax;
use Livewire\Component;

class CreateTax extends Component
{
    public $name;
    public $tax_type = 'fixed';
    public $rate;
    public $status;

    protected $rules = [
        'name' => 'required|min:2|max:255|unique:taxes,name',
        'rate' => 'required|numeric',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $this->validate();
        $tax = new Tax();
        $tax->name = $this->name;
        $tax->tax_type = $this->tax_type;
        $tax->rate = $this->rate;
        if ($tax->save()) {
            session()->flash('success', 'Tax successfully created.');
            $this->emit('refreshTax');
            $this->reset();
        } else {
            session()->flash('error', 'Something went to wrong!! Please Try again.');
        }
    }

    public function render()
    {
        return view('livewire.tax.create-tax');
    }
}
