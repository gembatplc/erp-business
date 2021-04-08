<div>
    @section('title')
        Shift
    @endsection

    @section('content')
        <div class="row">
            <div class="col-md-8">
                @livewire('shift.list-shift')
            </div>
            <div class="col-md-4">
                @livewire('shift.create-shift')
            </div>
        </div>
    @endsection
</div>
