<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ListCategory extends Component
{
    use WithPagination;
    protected $listeners = ['refreshCategory' => '$refresh'];
    protected $paginationTheme = 'bootstrap';
    
    public $search;
    public $page = 1;
    public $per_page = 10;

    public $bulkSelectAll = false;
    public $bulk_select = [];

    public $delete_id = null;
    public $delete_single_item = true;

    public $edit_category_id = null;
    public $edit_category_name;
    public $edit_category_parent_id;
    public $edit_category_description;

    public $edit_categories = [];

    public $edit_category_multi_name = [];

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    protected $rules = [
        'edit_categories.*.name' => 'required|min:2|max:255',
        'edit_categories.*.parent_id' => 'nullable',
        'edit_categories.*.description' => 'nullable|max:255',
    ];


   

    public function updatedBulkSelectAll($value)
    {
        if($value){
            $this->bulk_select = Category::pluck('id');
        }else{
            $this->bulk_select = [];
        }
    }

    public function deleteItem()
    {
        if($this->delete_single_item == true) {
            if($this->delete_id == null || $this->delete_id == ''){
                session()->flash('error','Something went to wrong!!,Please try agian');

            }else{
                Category::find($this->delete_id)->delete();
                session()->flash('success','Category Item has been successfully Deleted!!');
                $this->emit('refreshCategory');
                $this->delete_id = null;
            }
        }else{
            if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
                session()->flash('error','Something went to wrong!!,Please try agian.');

            }else{
                Category::destroy($this->bulk_select);
                session()->flash('success','Category Items has been successfully Deleted!!');
                $this->emit('refreshCategory');
                $this->bulk_select = [];
            }
        }    
        
    }


    public function editItem($id)
    {
        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $category = Category::find($id);
            $this->edit_category_id = $category->id;
            $this->edit_category_name = $category->name;
            $this->edit_category_parent_id = $category->parent_id;
            $this->edit_category_description = $category->description;
        }
        
    }



    public function updateItem($id)
    {
        $this->validate([
            "edit_category_name" => "required|min:2|max:255|unique:categories,name,$id",
        ]);
        
        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $category = Category::find($id);
            $category->name = $this->edit_category_name;
            $category->parent_id = $this->edit_category_parent_id == 0 ? null : $this->edit_category_parent_id;
            $category->description = $this->edit_category_description;
            if($category->update()){
                session()->flash('success','Category Item has been successfully updated!!');
                $this->emit('refreshCategory');
                // $this->edit_department_id = null;
            }else{
                session()->flash('error','Something went to wrong!!,Please try agian');
            }
        }
    }


    public function editItems()
    {
        $this->edit_categories = Category::whereIn('id',$this->bulk_select)->get();
    }



    public function updateItems()
    {
        $this->validate();

        foreach ($this->edit_categories as $edit_category) {
            $category = Category::find($edit_category->id);
            $category->name = $edit_category->name;
            $category->parent_id = $edit_category->parent_id == 0 ? null : $edit_category->parent_id;
            $category->description = $edit_category->description;
            $category->update();
        }

        session()->flash('success','Category Items has been successfully updated!!');
        $this->emit('refreshCategory');
        $this->bulk_select = [];
        $this->edit_categories = [];
        $this->bulkSelectAll = false;

    }


    public function exportItems()
    {
        if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
            session()->flash('error','Something went to wrong!!,Please try agian.');

        }else{
            return response()->streamDownload(function(){
                echo Category::whereKey($this->bulk_select)->toCsv();
            },'categories.csv');

           $this->bulk_select = [];
        }
    }

    public function render()
    {
        $categories = Category::latest()->where('name', 'like', '%'.$this->search.'%')->paginate($this->per_page);
        return view('livewire.category.list-category',['categories' => $categories]);
    }
}
