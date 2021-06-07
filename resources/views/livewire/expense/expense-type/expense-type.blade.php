<div>
    @section('title')
        Expense Type
    @endsection

    @section('content')
        <div class="row">
            <div class="col-md-8">
                @livewire('expense.expense-type.list-expense-type')
            </div>
            <div class="col-md-4">
                @livewire('expense.expense-type.create-expense-type')
            </div>
        </div>
    @endsection
</div>

