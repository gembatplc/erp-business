<div>
    <div class="x_panel shadow-sm border-0">
        <div class="x_title">
            <h2>Create Leave Application</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li class="text-dark">
                {{-- <button type="button"   class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button> --}}
                  <a class="close" data-dismiss="modal"><i class="fa fa-close"></i></a>
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

            <form>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Employee</label>
                            <div class="input-group mb-3">
                                <select class="form-control" aria-describedby="basic-addon2">
                                    <option value="john">gem</option>
                                    <option value="john">man</option>
                                    <option value="john">john</option>
                                </select>
                                <div class="input-group-append">
                                  <button type="button" data-toggle="modal" data-target="#addEmployeeModal" class="input-group-text text-success" id="basic-addon2"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            
                            @error('employee_id')
                              <span class="text-danger" role="alert">{{$message}}</span>
                            @enderror

                        </div>
                                
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Leave Type</label>
                            <div class="input-group mb-3">
                                <select class="form-control" aria-describedby="basic-addon2">
                                    <option value="john">half</option>
                                    <option value="john">time off</option>
                                    <option value="john">john</option>
                                </select>
                                <div class="input-group-append">
                                  <button type="button" data-toggle="modal" data-target="#addLeaveTypeModal" class="input-group-text text-success" id="basic-addon2"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            
                            @error('leave_type_id')
                              <span class="text-danger" role="alert">{{$message}}</span>
                            @enderror

                        </div>
                        
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Start date</label>
                            <input class="form-control" placeholder="start date"  type="date" />
                            @error('start_date')
                              <span class="text-danger" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">End Date</label>
                            <input class="form-control"  type="date" />
                            @error('end_date')
                              <span class="text-danger" role="alert">{{$message}}</span>
                            @enderror
                        </div>        
                    </div>
                </div>
                

                

                <div class="form-group">
                    <label class="font-weight-bold text-dark">Leave Reason</label>
                    <textarea class="form-control" placeholder="leave reason"  rows="3" ></textarea>
                    @error('leave_reason')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Reference By</label>
                            <select class="form-control">
                                <option value="gem">gem</option>
                            </select>
                        
                            @error('reference_by')
                              <span class="text-danger" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Application date</label>
                            <input class="form-control"  type="date" />
                            @error('application_date')
                              <span class="text-danger" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Approved By</label>
                            <select class="form-control">
                                <option value="gem">gem</option>
                            </select>
                        
                            @error('approved_by')
                              <span class="text-danger" role="alert">{{$message}}</span>
                            @enderror
                        </div> 
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Status</label>
                            <select class="form-control">
                                <option value="pending">pending</option>
                                <option value="approved">approved</option>
                                <option value="cancel">cancel</option>
                            </select>
                        
                            @error('status')
                              <span class="text-danger" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                

                


                <div class="form-group">
                    <label class="font-weight-bold text-dark">Attach file</label>
                    <input class="form-control"  type="file" />
                    @error('attach_file')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>


                
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success">
                        <span wire:loading wire:target="add">
                            <div class="spinner-border text-danger spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            Loading...
                        </span>
                        <span wire:loading.remove>
                            Add Leave 
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>  
    
    <!-- leave type add item -->
    <div class="modal fade"  id="addLeaveTypeModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
            @livewire('leave.leave-type.create-leave-type')
        
        </div>
        </div>
    </div>
    <!-- /leaveType add item -->

    <!-- leave add item -->
    <div class="modal fade"  id="addEmployeeModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Employee</h4>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                 @livewire('employeer.new-employee')
              </div>
        
        </div>
        </div>
    </div>
    <!-- /leaveType editable item -->
</div>
