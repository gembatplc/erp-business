<div>
    @section('title')
        Account
    @endsection

    @section('content')
        <div class="row">
            <div class="col-md-8">
                @livewire('account.list-account')
            </div>
            <div class="col-md-4">
                @livewire('account.create-account')
            </div>
        </div>
    @endsection
</div>
