<div>
    @section('title')
        Shift
    @endsection

    @push('css')
    <link href="{{ asset('assets') }}/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    @endpush

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

    @push('js')
    <script src="{{ asset('assets') }}/vendors/select2/dist/js/select2.full.min.js"></script>
    @endpush
   
</div>

