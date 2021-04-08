<div>
    @section('title')
        Leave Type
    @endsection

    @section('content')
        <div class="row">
            <div class="col-md-8">
                @livewire('leave-type.list-leave-type')
            </div>
            <div class="col-md-4">
                @livewire('leave-type.create-leave-type')
            </div>
        </div>
    @endsection
</div>
