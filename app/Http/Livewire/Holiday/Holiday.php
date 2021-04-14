<?php

namespace App\Http\Livewire\Holiday;

use Livewire\Component;

class Holiday extends Component
{
    public function render()
    {
        return view('livewire.holiday.holiday')->extends('layouts.app');
    }
}
