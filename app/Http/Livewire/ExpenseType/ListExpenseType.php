<?php

namespace App\Http\Livewire\ExpenseType;

use App\Models\ExpenseType;
use Livewire\Component;
use Livewire\WithPagination;

class ListExpenseType extends Component
{

    use WithPagination;
    protected $listeners = ['refreshExpenseType' => '$refresh'];
    protected $paginationTheme = 'bootstrap';
    
    public $search;
    public $page = 1;
    public $per_page = 10;

    public $bulkSelectAll = false;
    public $bulk_select = [];

    public $delete_id = null;
    public $delete_single_item = true;

    public $edit_expenseType_id = null;
    public $edit_expenseType_name;
    public $edit_expenseType_description;

    public $edit_expenseTypes = [];



    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    protected $rules = [
        'edit_expenseTypes.*.name' => 'required|min:2|max:255',
        'edit_expenseTypes.*.description' => 'nullable|max:255',
    ];


  
    public function updatedBulkSelectAll($value)
    {
        if($value){
            $this->bulk_select = ExpenseType::pluck('id');
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
                ExpenseType::find($this->delete_id)->delete();
                session()->flash('success','ExpenseType Item has been successfully Deleted!!');
                $this->emit('refreshExpenseType');
                $this->delete_id = null;
            }
        }else{
            if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
                session()->flash('error','Something went to wrong!!,Please try agian.');

            }else{
                ExpenseType::destroy($this->bulk_select);
                session()->flash('success','ExpenseType Items has been successfully Deleted!!');
                $this->emit('refreshExpenseType');
                $this->bulk_select = [];
            }
        }    
        
    }




    public function editItem($id)
    {
        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $expenseType = ExpenseType::find($id);
            $this->edit_expenseType_id = $expenseType->id;
            $this->edit_expenseType_name = $expenseType->name;
            $this->edit_expenseType_description = $expenseType->description;
        }
        
    }


    
    


    public function updateItem($id)
    {
        $this->validate([
            "edit_expenseType_name" => "required|min:2|max:255|unique:expense_types,name,$id",
            "edit_expenseType_description" => "nullable|max:255"
        ]);
        
        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $expenseType = ExpenseType::find($id);
            $expenseType->name = $this->edit_expenseType_name;
            $expenseType->description = $this->edit_expenseType_description;
            if($expenseType->update()){
                session()->flash('success','ExpenseType Item has been successfully updated!!');
                $this->emit('refreshExpenseType');
                // $this->edit_department_id = null;
            }else{
                session()->flash('error','Something went to wrong!!,Please try agian');
            }
        }
    }



    public function editItems()
    {
        $this->edit_expenseTypes = ExpenseType::whereIn('id',$this->bulk_select)->get();
        
    }



    public function updateItems()
    {
        $this->validate();
        foreach ($this->edit_expenseTypes as $edit_expenseType) {
            $expenseType = ExpenseType::find($edit_expenseType->id);
            $expenseType->name = $edit_expenseType->name;
            $expenseType->description = $edit_expenseType->description;
            $expenseType->update();
        }

        session()->flash('success','ExpenseType Items has been successfully updated!!');
        $this->emit('refreshExpenseType');
        $this->bulk_select = [];
        $this->edit_expenseTypes = [];
        $this->bulkSelectAll = false;
    }



    public function exportItems()
    {
        if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
            session()->flash('error','Something went to wrong!!,Please try agian.');

        }else{
            return response()->streamDownload(function(){
                echo ExpenseType::whereKey($this->bulk_select)->toCsv();
            },'expenseTypes.csv');

           $this->bulk_select = [];
        }
    }



    
    public function render()
    {
        $expenseTypes = ExpenseType::latest()->where('name', 'like', '%'.$this->search.'%')->paginate($this->per_page);
        return view('livewire.expense-type.list-expense-type',['expenseTypes' => $expenseTypes]);
    }
}
