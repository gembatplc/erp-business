<div>
    <div class="x_panel shadow-sm border-0">
        <div class="x_title">
            <h2>Create Payroll</h2>
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

              <div class="form-group col-md-4">
                <label class="font-weight-bold text-dark">Payroll Month</label>
                <input class="form-control"  type="month" />
            </div>

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
                            <label class="font-weight-bold text-dark">Date</label>
                            <input class="form-control"  type="date" />
                        </div>
                    </div>
                </div>
                


            </form>
        </div>
    </div>  

    <div class="x_panel shadow-sm border-0">
        <div class="x_title">
            <h2>Employee Details</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li class="text-dark">
                  <a class="close" data-dismiss="modal"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="card-body">

            <form>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Designation</label>
                            <input class="form-control"  type="text" />
                        </div>      
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Department</label>
                            <input class="form-control"  type="text" />
                        </div>
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Salary Type</label>
                            <input class="form-control"  type="text" />
                        </div>
                                
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Basic Salary</label>
                            <input class="form-control"  type="text" />
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    

    <div class="row">
        <div class="col-md-6">
            <div class="x_panel shadow-sm border-0">
                <div class="x_title">
                    <h2>Allowance</h2>
                    <button type="button" data-toggle="modal" data-target="#addAllowanceModal" class="btn btn-success btn-sm  mb-0 float-right"><i class="fa fa-plus"></i> Create Allowance</button>
    
                    <div class="clearfix"></div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Allowance Name</label>
                                    <input class="form-control"  type="text"/>      
                                </div>          
                            </div>
        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Allowance Amount</label>
                                    <input class="form-control"  type="number" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Allowance Name</label>
                                    <input class="form-control"  type="text"/>      
                                </div>          
                            </div>
        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark">Allowance Amount</label>
                                    <input class="form-control"  type="number" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="font-weight-bold text-dark mt-2">Total Allowance</label>    
                                </div>          
                            </div>
        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control"  type="number" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        
        </div>
        <div class="col-md-6">
            <div class="x_panel shadow-sm border-0">
                <div class="x_title">
                    <h2>Deduction</h2>
                    <button type="button" data-toggle="modal" data-target="#addDeductionModal" class="btn btn-success btn-sm  mb-0 float-right"><i class="fa fa-plus"></i> Create Deduction</button>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body">
        
                    <form>
                        <form>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Deduction Name</label>
                                        <input class="form-control"  type="text"/>      
                                    </div>          
                                </div>
            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Deduction Amount</label>
                                        <input class="form-control"  type="number" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Deduction Name</label>
                                        <input class="form-control"  type="text"/>      
                                    </div>          
                                </div>
            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Deduction Amount</label>
                                        <input class="form-control"  type="number" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark mt-2">Total Deduction</label>     
                                    </div>          
                                </div>
            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control"  type="number" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </form>
                </div>
            </div>
        
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="x_panel shadow-sm border-0">
                <div class="x_title">
                    <h2>Payroll Adjustment</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="text-dark">
                          <a class="close" data-dismiss="modal"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-bold text-dark">Gross Salary</label>
                        <input class="form-control"  type="text" />
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold text-dark">Total Allowance</label>
                        <input class="form-control"  type="text" />
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold text-dark">Total Deduction</label>
                        <input class="form-control"  type="text" />
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold text-dark">Grand Salary</label>
                        <input class="form-control"  type="text" />
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
                                Save Payroll
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- employee add item -->
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
    <!-- /employee item -->

    <!-- Allowance add item -->
    <div class="modal fade"  id="addAllowanceModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Allowance</h4>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                 @livewire('payroll.allowance.form-allowance')
              </div>
        
        </div>
        </div>
    </div>
    <!-- /employee item -->


    <!-- deduction add item -->
    <div class="modal fade"  id="addDeductionModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Deduction</h4>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                 @livewire('payroll.deduction.form-deduction')
              </div>
        
        </div>
        </div>
    </div>
    <!-- /employee item -->
</div>

