<div>
    <div class="x_panel shadow-sm border-0">
        <div class="x_title">
            <h2>Create Leave Type</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></a>
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
                    <label class="font-weight-bold">Title</label>
                    <input class="form-control" placeholder="Title" wire:model.lazy="name" type="text" />
                    @error('name')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">maximum Leave Count</label>
                    <input class="form-control" placeholder="maximum leave count" wire:model.lazy="max_leave_count" type="number" />
                    @error('location')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label class="font-weight-bold">Leave Count Interval</label>
                    <select class="form-control" placeholder="Location" wire:model="leave_count_interval" >
                        <option value="monthly">Monthly</option>
                        <option value="weekly">Weekly</option>
                        <option value="biweekly">Biweekly</option>
                        <option value="yearly">Yearly</option>
                    </select>
                
                    @error('leave_count_interval')
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
                    <button type="submit" class="btn btn-success btn-sm">
                        <span wire:loading wire:target="add">
                            <div class="spinner-border text-danger spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            Loading...
                        </span>
                        <span wire:loading.remove wire:target="add">
                            Add Leave Type
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>