<?php

namespace App\Http\Livewire\Department;


use Livewire\Component;


class Department extends Component
{

    public function render()
    {
        return view('livewire.department.department')->extends('layouts.app');
    }
}
