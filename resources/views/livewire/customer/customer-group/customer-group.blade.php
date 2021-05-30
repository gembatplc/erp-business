<div>
    @section('title')
        Customer Group
    @endsection

    @section('content')
        <div class="row">
            <div class="col-md-8">
                @livewire('customer.customer-group.list-customer-group')
            </div>
            <div class="col-md-4">
                @livewire('customer.customer-group.create-customer-group')
            </div>
        </div>
    @endsection
</div>