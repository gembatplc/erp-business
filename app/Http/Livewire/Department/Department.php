<?php

namespace App\Http\Livewire\Department;

use App\Models\Department as ModelsDepartment;
use Livewire\Component;
use Livewire\WithPagination;

class Department extends Component
{

    public function render()
    {
        return view('livewire.department.department')->extends('layouts.app');
    }
}
