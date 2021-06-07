<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expense;
use Livewire\Component;
use App\Models\ExpenseType;
use Livewire\WithPagination;

class ListExpense extends Component
{
    use WithPagination;
    protected $listeners = ['refreshExpense' => '$refresh'];
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $page = 1;
    public $per_page = 10;

    public $bulkSelectAll = false;
    public $bulk_select = [];

    public $delete_id = null;
    public $delete_single_item = true;

    public $edit_expense_id = null;
    public $edit_expense_expense_type_id;
    public $edit_expense_amount;
    public $edit_expense_expense_reason;
    public $edit_expense_date;
    public $edit_expense_reference;

    public $edit_expenses = [];



    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    protected $rules = [
        'edit_expenses.*.expense_type_id' => 'required',
        'edit_expenses.*.date' => 'required',
        'edit_expenses.*.amount' => 'required',
        'edit_expenses.*.expense_reason' => 'required',
        'edit_expenses.*.reference' => 'nullable',

    ];




    public function updatedBulkSelectAll($value)
    {
        if($value){
            $this->bulk_select = Expense::pluck('id');
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
                Expense::find($this->delete_id)->delete();
                session()->flash('success','Expense Item has been successfully Deleted!!');
                $this->emit('refreshExpense');
                $this->delete_id = null;
            }
        }else{
            if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
                session()->flash('error','Something went to wrong!!,Please try agian.');

            }else{
                Expense::destroy($this->bulk_select);
                session()->flash('success','Expense Items has been successfully Deleted!!');
                $this->emit('refreshExpense');
                $this->bulk_select = [];
            }
        }

    }


    public function editItem($id)
    {
        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $expense = Expense::find($id);
            $this->edit_expense_id = $expense->id;
            $this->edit_expense_expense_type_id = $expense->expense_type_id;
            $this->edit_expense_date = $expense->date;
            $this->edit_expense_amount = $expense->amount;
            $this->edit_expense_expense_reason = $expense->expense_reason;
            $this->edit_expense_reference = $expense->reference;
        }

    }



    public function updateItem($id)
    {
        $this->validate([
            "edit_expense_expense_type_id" => "required",
            "edit_expense_date" => "required|date",
            "edit_expense_amount" => "required|numeric",
            "edit_expense_expense_reason" => "nullable",
            "edit_expense_reference" => "nullable",

        ]);

        if($id == null || $id == '' || $id <= 0){
            session()->flash('error','Something went to wrong!!,Please try agian');
        }else{
            $expense = Expense::find($id);
            $expense->date = $this->edit_expense_date;
            $expense->expense_type_id = $this->edit_expense_expense_type_id;
            $expense->amount = $this->edit_expense_amount;
            $expense->expense_reason = $this->edit_expense_expense_reason;
            $expense->reference = $this->edit_expense_reference;
            if($expense->update()){
                session()->flash('success','Expense Item has been successfully updated!!');
                $this->emit('refreshExpense');
                // $this->edit_department_id = null;
            }else{
                session()->flash('error','Something went to wrong!!,Please try agian');
            }
        }
    }


    public function editItems()
    {
        $this->edit_expenses = Expense::whereIn('id',$this->bulk_select)->get();
    }



    public function updateItems()
    {
        $this->validate();


        foreach ($this->edit_expenses as $edit_expense) {
            $expense = Expense::find($edit_expense->id);
            $expense->date = $edit_expense->date;
            $expense->expense_type_id = $edit_expense->expense_type_id;
            $expense->amount = $edit_expense->amount;
            $expense->expense_reason = $edit_expense->expense_reason;
            $expense->reference = $edit_expense->reference;
            
            $expense->update();

        }

        session()->flash('success', 'Expense has been successfully updated!!');
        $this->emit('refreshExpense');
        $this->bulk_select = [];
        $this->edit_shifts = [];
        $this->bulkSelectAll = false;

    }


    public function exportItems()
    {
        if($this->bulk_select == [] || $this->bulk_select == '' || $this->bulk_select == null){
            session()->flash('error','Something went to wrong!!,Please try agian.');

        }else{
            return response()->streamDownload(function(){
                echo Expense::whereKey($this->bulk_select)->toCsv();
            },'expenses.csv');

           $this->bulk_select = [];
        }
    }
    
    
    public function render()
    {
        $expenses = Expense::latest()->where('date', 'like', '%'.$this->search.'%')->paginate($this->per_page);
        $expense_types = ExpenseType::get();
        return view('livewire.expense.list-expense',['expenses' => $expenses, 'expense_types' => $expense_types]);
    }
}
