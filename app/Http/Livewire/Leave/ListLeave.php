<?php

namespace App\Http\Livewire\Leave;

use Livewire\Component;

class ListLeave extends Component
{
    public function render()
    {
        return view('livewire.leave.list-leave')->extends('layouts.app');
    }
}
