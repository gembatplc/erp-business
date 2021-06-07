<?php

namespace App\Http\Livewire\Account;

use Livewire\Component;

class Account extends Component
{
    public function render()
    {
        return view('livewire.account.account')->extends('layouts.app');
    }
}
