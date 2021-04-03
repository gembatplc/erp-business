<div>
    @section('title')
        Department
    @endsection

    @section('content')
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Department List
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Create New Depertment
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <input class="form-control" type="text" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset"/>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-success btn-sm">Add Department</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</div>
