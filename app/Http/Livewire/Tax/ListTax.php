<?php

namespace App\Http\Livewire\Tax;

use App\Models\Tax;
use Livewire\Component;
use Livewire\WithPagination;

class ListTax extends Component
{
    use WithPagination;
    protected $listeners = ['refreshTax' => '$refresh'];
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $page = 1;
    public $per_page = 10;

    public $bulkSelectAll = false;
    public $bulk_select = [];

    public $delete_id = null;
    public $delete_single_item = true;

    public $edit_tax_id = null;
    public $edit_tax_name;
    public $edit_tax_tax_type;
    public $edit_tax_rate;

    public $edit_taxs = [];

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    protected $rules = [
        'edit_taxs.*.name' => 'required|min:2|max:255',
        'edit_taxs.*.rate' => 'required|numeric',
    ];




    public function updatedBulkSelectAll($value)
    {
        if ($value) {
            $this->bulk_select = Tax::pluck('id');
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
                Tax::find($this->delete_id)->delete();
                session()->flash('success', 'Tax Item has been successfully Deleted!!');
                $this->emit('refreshTax');
                $this->delete_id = null;
            }
        } else {
            if ($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null) {
                session()->flash('error', 'Something went to wrong!!,Please try agian.');
            } else {
                Tax::destroy($this->bulk_select);
                session()->flash('success', 'Tax Items has been successfully Deleted!!');
                $this->emit('refreshTax');
                $this->bulk_select = [];
            }
        }
    }




    public function editItem($id)
    {
        if ($id == null || $id == '' || $id <= 0) {
            session()->flash('error', 'Something went to wrong!!,Please try agian');
        } else {
            $tax = Tax::find($id);
            $this->edit_tax_id = $tax->id;
            $this->edit_tax_name = $tax->name;
            $this->edit_tax_tax_type = $tax->tax_type;
            $this->edit_tax_rate = $tax->rate;
        }
    }




    public function updateItem($id)
    {
        $this->validate([
            "edit_tax_name" => "required|min:2|max:255|unique:taxes,name,$id",
            "edit_tax_rate" => "required|numeric",
        ]);

        if ($id == null || $id == '' || $id <= 0) {
            session()->flash('error', 'Something went to wrong!!,Please try agian');
        } else {
            $tax = Tax::find($id);
            $tax->name = $this->edit_tax_name;
            $tax->tax_type = $this->edit_tax_tax_type;
            $tax->rate = $this->edit_tax_rate;
            if ($tax->update()) {
                session()->flash('success', 'Tax Items has been successfully updated!!');
                $this->emit('refreshTax');
                // $this->edit_department_id = null;
            } else {
                session()->flash('error', 'Something went to wrong!!,Please try agian');
            }
        }
    }


    public function editItems()
    {
        $this->edit_taxs = Tax::whereIn('id', $this->bulk_select)->get();
    }

    

    public function updateItems()
    {
        $this->validate();
        foreach ($this->edit_taxs as $edit_tax) {
            $tax = Tax::find($edit_tax->id);
            $tax->name = $edit_tax->name;
            $tax->tax_type = $edit_tax->tax_type;
            $tax->rate = $edit_tax->rate;
            $tax->update();
        }

        session()->flash('success', 'Tax Items has been successfully updated!!');
        $this->emit('refreshTax');
        $this->bulk_select = [];
        $this->edit_taxs = [];
        $this->bulkSelectAll = false;
    }


    public function exportItems()
    {
        if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
            session()->flash('error','Something went to wrong!!,Please try agian.');

        }else{
            return response()->streamDownload(function(){
                echo Tax::whereKey($this->bulk_select)->toCsv();
            },'taxs.csv');

           $this->bulk_select = [];
        }
    }

    public function render()
    {
        $taxs = Tax::latest()->where('name', 'like', '%' . $this->search . '%')->paginate($this->per_page);
        return view('livewire.tax.list-tax',['taxs' => $taxs]);
    }
}
