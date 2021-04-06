<?php

namespace App\Http\Livewire\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class ListBrand extends Component
{
    use WithPagination;
    protected $listeners = ['refreshBrand' => '$refresh'];
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $page = 1;
    public $per_page = 10;

    public $bulkSelectAll = false;
    public $bulk_select = [];

    public $delete_id = null;
    public $delete_single_item = true;

    public $edit_brand_id = null;
    public $edit_brand_name;
    public $edit_brand_description;

    public $edit_brands = [];

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    protected $rules = [
        'edit_brand_name' => 'required|min:2|max:255',
        'edit_brand_description' => 'nullable|max:255',
    ];



    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function updatedBulkSelectAll($value)
    {
        if ($value) {
            $this->bulk_select = Brand::pluck('id');
        } else {
            $this->bulk_select = [];
        }
    }

    public function deleteItem()
    {
        if ($this->delete_single_item == true) {
            if ($this->delete_id == null || $this->delete_id == '') {
                session()->flash('error', 'Something went to wrong!!,Please try agian');
            } else {
                Brand::find($this->delete_id)->delete();
                session()->flash('success', 'Brand Item has been successfully Deleted!!');
                $this->emit('refreshBrand');
                $this->delete_id = null;
            }
        } else {
            if ($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null) {
                session()->flash('error', 'Something went to wrong!!,Please try agian.');
            } else {
                Brand::destroy($this->bulk_select);
                session()->flash('success', 'Brand Items has been successfully Deleted!!');
                $this->emit('refreshBrand');
                $this->bulk_select = [];
            }
        }
    }




    public function editItem($id)
    {
        if ($id == null || $id == '' || $id <= 0) {
            session()->flash('error', 'Something went to wrong!!,Please try agian');
        } else {
            $brand = Brand::find($id);
            $this->edit_brand_id = $brand->id;
            $this->edit_brand_name = $brand->name;
            $this->edit_brand_description = $brand->description;
        }
    }


    public function editItems()
    {
        $this->edit_brands = Brand::whereIn('id', $this->bulk_select)->get();
    }



    public function updateItem($id)
    {
        $this->validate([
            "name" => "required|min:2|max:255|unique:brands,name,$id"
        ]);

        if ($id == null || $id == '' || $id <= 0) {
            session()->flash('error', 'Something went to wrong!!,Please try agian');
        } else {
            $brand = Brand::find($id);
            $brand->name = $this->edit_brand_name;
            $brand->description = $this->edit_brand_description;
            if ($brand->update()) {
                session()->flash('success', 'Brand Items has been successfully updated!!');
                $this->emit('refreshBrand');
                // $this->edit_department_id = null;
            } else {
                session()->flash('error', 'Something went to wrong!!,Please try agian');
            }
        }
    }


    public function render()
    {
        $brands = Brand::latest()->where('name', 'like', '%' . $this->search . '%')->paginate($this->per_page);
        return view('livewire.brand.list-brand',['brands' => $brands]);
    }
}
