<div>
    @section('title')
        Warehouse
    @endsection

    @section('content')
        <div class="row">
            <div class="col-md-8">
                @livewire('warehouse.list-warehouse')
            </div>
            <div class="col-md-4">
                @livewire('warehouse.create-warehouse')
            </div>
        </div>
    @endsection
</div>