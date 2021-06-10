<?php

namespace App\Http\Livewire\Currency;

use Livewire\Component;

class Currency extends Component
{
    public function render()
    {
        return view('livewire.currency.currency')->extends('layouts.app');
    }
}
