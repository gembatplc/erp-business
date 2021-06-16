<div>
    @section('title')
        Department
    @endsection


    

    @section('content')
        <div class="row">
            <div class="col-md-8">
                @livewire('department.list-department')
            </div>
            <div class="col-md-4">
                @livewire('department.create-department')
            </div>
        </div>
    @endsection


</div>
