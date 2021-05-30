<div>
    @section('title')
        Supplier Group
    @endsection

    @section('content')
        <div class="row">
            <div class="col-md-8">
                @livewire('supplier.supplier-group.list-supplier-group')
            </div>
            <div class="col-md-4">
                @livewire('supplier.supplier-group.create-supplier-group')
            </div>
        </div>
    @endsection
</div>