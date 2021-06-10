<div>
    @section('title')
    Tax
    @endsection

    @section('content')
    <div class="row">
        <div class="col-md-8">
            @livewire('tax.list-tax')
        </div>
        <div class="col-md-4">
            @livewire('tax.create-tax')
        </div>
    </div>
    @endsection
</div>
