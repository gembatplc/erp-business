<?php

namespace App\Http\Livewire\LeaveType;

use Livewire\Component;

class LeaveType extends Component
{
    public function render()
    {
        return view('livewire.leave-type.leave-type')->extends('layouts.app');
    }
}
