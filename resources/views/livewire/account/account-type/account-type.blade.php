<div>
    @section('title')
        Account Type
    @endsection

    @section('content')
        <div class="row">
            <div class="col-md-8">
                @livewire('account.account-type.list-account-type')
            </div>
            <div class="col-md-4">
                @livewire('account.account-type.create-account-type')
            </div>
        </div>
    @endsection
</div>