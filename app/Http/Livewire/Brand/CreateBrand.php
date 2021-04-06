<?php

namespace App\Http\Livewire\Brand;

use App\Models\Brand;
use Livewire\Component;

class CreateBrand extends Component
{
    public $name;
    public $description;
    public $status;

    protected $rules = [
        'name' => 'required|min:2|max:255|unique:brands,name',
        'description' => 'nullable|max:255',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $this->validate();
        $brand = new Brand();
        $brand->name = $this->name;
        $brand->description = $this->description;
        if ($brand->save()) {
            session()->flash('success', 'Brand successfully created.');
            $this->emit('refreshBrand');
            $this->reset();
        } else {
            session()->flash('error', 'Something went to wrong!! Please Try again.');
        }
    }
    public function render()
    {
        return view('livewire.brand.create-brand');
    }
}
