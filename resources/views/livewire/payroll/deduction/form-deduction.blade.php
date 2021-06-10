<div>
    <div class="x_panel shadow-sm border-0">
        <div class="x_title">
            <h2>Create Deduction</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li class="text-dark">
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

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Deduction Name</label>
                            <input class="form-control"   type="text" />
                            @error('Deduction_name')
                              <span class="text-danger" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Deduction Month</label>
                            <input class="form-control"  type="month"/>
                            @error('Deduction_month')
                              <span class="text-danger" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Deduction Amount</label>
                            <input class="form-control"  type="number" />
                            @error('Deduction_amount')
                              <span class="text-danger" role="alert">{{$message}}</span>
                            @enderror
                        </div>        
                    </div>
                </div>
                

                

                <div class="form-group">
                    <label class="font-weight-bold text-dark">Description</label>
                    <textarea class="form-control" rows="3" ></textarea>
                    @error('Description')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
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
                    <button type="submit" class="btn btn-outline-success">
                        <span wire:loading wire:target="add">
                            <div class="spinner-border text-danger spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            Loading...
                        </span>
                        <span wire:loading.remove>
                            Save Deduction
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>  
    


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
