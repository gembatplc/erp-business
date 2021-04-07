<div>
    @section('title')
        Category
    @endsection

    @section('content')
        <div class="row">
            <div class="col-md-8">
                @livewire('category.list-category')
            </div>
            <div class="col-md-4">
                @livewire('category.create-category')
            </div>
        </div>
    @endsection
</div>
