<div>
    @section('title')
        Designation
    @endsection

    @section('content')
        <div class="row">
            <div class="col-md-8">
                @livewire('designation.list-designation')
            </div>
            <div class="col-md-4">
                @livewire('designation.create-designation')
            </div>
        </div>
    @endsection
</div>
