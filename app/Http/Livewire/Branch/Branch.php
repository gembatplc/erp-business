<?php

namespace App\Http\Livewire\Branch;

use Livewire\Component;

class Branch extends Component
{
    public function render()
    {
        return view('livewire.branch.branch')->extends('layouts.app');
    }
}
