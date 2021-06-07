<div>
    @section('title')
        Expense Type
    @endsection

    @section('content')
        <div class="row">
            <div class="col-md-8">
                @livewire('expense.list-expense')
            </div>
            <div class="col-md-4">
                @livewire('expense.create-expense')
            </div>
        </div>
    @endsection
</div>
