<div>
    @section('title')
    Brand
    @endsection

    @section('content')
    <div class="row">
        <div class="col-md-8">
            @livewire('brand.list-brand')
        </div>
        <div class="col-md-4">
            @livewire('brand.create-brand')
        </div>
    </div>
    @endsection
</div>
