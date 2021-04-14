<?php

namespace App\Http\Livewire\Shift;

use Livewire\Component;

class Shift extends Component
{
    public function render()
    {
        return view('livewire.shift.shift')->extends('layouts.app');
    }
}
