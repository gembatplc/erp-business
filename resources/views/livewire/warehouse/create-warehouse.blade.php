<div>
    <div class="x_panel shadow-sm border-0">
        <div class="x_title">
            <h2>Create Warehouse</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close" data-dismiss="modal"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
        <div class="card-body">

            @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Done!</strong> {{ session('success') }}
              </div>
              @endif

              @if (session()->has('error'))
              <div class="alert alert-danger alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Holy guacamole!</strong> {{ session('error') }}
              </div>
              @endif

            <form  wire:submit.prevent="add">
                <div class="form-group">
                    <label class="font-weight-bold">Name</label>
                    <input class="form-control" placeholder="Title" wire:model.lazy="name" type="text" />
                    @error('name')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Location</label>
                    <input class="form-control" placeholder="location" wire:model.lazy="location" type="text" />
                    @error('location')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Description</label>
                    <textarea class="form-control" placeholder="description" wire:model.lazy="description" rows="3" ></textarea>
                    @error('description')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success btn-sm">
                        <span wire:loading wire:target="add">
                            <div class="spinner-border text-danger spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            Loading...
                        </span>
                        <span wire:loading.remove wire:target="add">
                            Add Warehouse
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

