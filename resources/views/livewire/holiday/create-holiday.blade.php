<div>
    <div class="x_panel shadow-sm border-0">
        <div class="x_title">
            <h2>Create Holiday</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
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
                    <input type="text" class="form-control" wire:model.lazy="name" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;"></textarea>
                    @error('name')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Branch</label>
                    <select class="form-control" wire:model="branch_id" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset">
                        <option disabled selected>Select Branch</option>
                        @foreach ($branches as $branch)
                         <option value="{{ $branch->id }}">{{ $branch->name }} -- ({{$branch->location}})</option>
                        @endforeach
                    </select>
                
                    @error('branch_id')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror                   
                </div>

                <div class="form-group" wire:ignore>
                  <label class="font-weight-bold">Department</label>
                  <select class="form-control select2" id="mselect2" multiple  style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset">
                      <option disabled selected>Select Department</option>
                      @foreach ($departments as $department)
                       <option value="{{ $department->id }}">{{ $department->name }}</option>
                      @endforeach
                  </select>
              
                  @error('department_id')
                    <span class="text-danger" role="alert">{{$message}}</span>
                  @enderror                   
              </div>

                <div class="form-group">
                    <label class="font-weight-bold">Holiday Type</label>
                    <select class="form-control" wire:model="holiday_type" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset">
                        <option value="0">Goverment</option>
                        <option value="1">Official</option>
                        <option value="2">Other</option>
                    </select>   

                    @error('holiday_type')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Start date</label>
                    <input type="date" class="form-control" wire:model.lazy="start_date" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;"></textarea>
                    @error('start_date')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label class="font-weight-bold">End date</label>
                    <input type="date" class="form-control" wire:model.lazy="end_date" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;"></textarea>
                    @error('end_date')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>



                <div class="form-group">
                    <label class="font-weight-bold">Holiday Reason</label>
                    <textarea wire:model="holiday_reason" class="form-control" rows="3"></textarea>
                
                    @error('holiday_reason')
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
                            Add Holidays
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('script')
      <script>
        
          $(document).ready(function() {
            let ar = [];
              $('#mselect2').select2({
                  tags: true,
              }).on('change', function(e){
                ar = $('#mselect2').val();
                if(!ar.includes(e.target.value)){
                  ar.push(e.target.value)
                }
                @this.set('department_id',ar)
              });

          });
      </script>
    @endpush
</div>
