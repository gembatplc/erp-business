<div>
    @section('title')
        Branch
    @endsection

    @section('content')
        <div class="row">
            <div class="col-md-8">
                @livewire('branch.list-branch')
            </div>
            <div class="col-md-4">
                @livewire('branch.create-branch')
            </div>
        </div>
    @endsection
</div>
