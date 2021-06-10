<div>
    @section('title')
        Currency
    @endsection

    @section('content')
        <div class="row">
            <div class="col-md-8">
                @livewire('currency.list-currency')
            </div>
            <div class="col-md-4">
                @livewire('currency.create-currency')
            </div>
        </div>
    @endsection
</div>