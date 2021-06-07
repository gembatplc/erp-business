<div>
    @section('title')
        Money Transfer
    @endsection

    @section('content')
        <div class="row">
            <div class="col-md-8">
                @livewire('account.money-transfer.list-money-transfer')
            </div>
            <div class="col-md-4">
                @livewire('account.money-transfer.create-money-transfer')
            </div>
        </div>
    @endsection
</div>
