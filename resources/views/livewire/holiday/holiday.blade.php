<div>
    @section('title')
        Holiday
    @endsection

    @section('content')
        <div class="row">
            <div class="col-md-8">
                @livewire('holiday.list-holiday')
            </div>
            <div class="col-md-4">
                @livewire('holiday.create-holiday')
            </div>
        </div>
    @endsection
</div>
