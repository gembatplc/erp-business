<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CreateCategory extends Component
{

    // public $categories;
    public $name;
    public $description;
    public $parent_id;
    public $status;

    protected $rules = [
        'name' => 'required|unique:categories,name|min:2|max:255',
        'description' => 'nullable|max:255',
        'parent_id' => 'nullable'
    ];

    public function mount()
    {
        // $this->categories = Category::get();
    }
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function add(){
        $this->validate();
        $category = new Category();
        $category->name = $this->name;
        $category->description = $this->description;
        $category->parent_id = $this->parent_id ?? null;
        if($category->save()){
            session()->flash('success', 'Category successfully created.');
            $this->emit('refreshCategory');
            $this->reset();
        }else{
            session()->flash('error', 'Something went to wrong!! Please Try again.');
        }
    }


    public function render()
    {
        $categories = Category::get();
        return view('livewire.category.create-category',['categories' => $categories]);
    }
}
