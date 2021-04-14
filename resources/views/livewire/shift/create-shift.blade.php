<div>
    <div class="x_panel">
        <div class="x_title">
            <h2>Create Shift</h2>
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

                <div class="form-group">
                    <label class="font-weight-bold">Shift Type</label>
                    <select class="form-control" wire:model="shift_type" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset">
                        <option value="0">Fixed</option>
                        <option value="1">Flexiable</option>
                    </select>   

                    @error('shift_type')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Start Time</label>
                    <input type="time" class="form-control" wire:model.lazy="start_time" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;"></textarea>
                    @error('start_time')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label class="font-weight-bold">End Time</label>
                    <input type="time" class="form-control" wire:model.lazy="end_time" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;"></textarea>
                    @error('end_time')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>



                <div class="form-group" wire:ignore>
                    <label class="font-weight-bold">Weekly Holiday</label>
                    <select class="form-control select2" multiple="mulitple"  id="mselect2" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset">
                        <option value="friday">Friday</option>
                        <option value="saturday">Saturday</option>
                        <option value="sunday">Sunday</option>
                        <option value="monday">Monday</option>
                        <option value="tuesday">Tuesday</option>
                        <option value="wednesday">Wednesday</option>
                        <option value="thursday">Thursday</option>
                    </select>
                
                    @error('weekly_holiday')
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
                            Add Shift
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
                @this.set('weekly_holiday',ar)
              });

          });
      </script>
    @endpush
</div>
