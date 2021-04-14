<?php

namespace App\Http\Livewire\Designation;

use Livewire\Component;

class Designation extends Component
{
    public function render()
    {
        return view('livewire.designation.designation')->extends('layouts.app');
    }
}
