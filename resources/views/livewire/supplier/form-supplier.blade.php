<div>
    <div class="x_panel shadow-sm border-0">
        <div class="x_title">
            <h2>Create Supplier</h2>
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
                            <label class="font-weight-bold text-dark">Full Name</label>
                            <input type="text" class="form-control" />
                            
                            @error('full_name')
                              <span class="text-danger" role="alert">{{$message}}</span>
                            @enderror
                        </div>           
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Supplier Group</label>
                            <div class="input-group mb-3">
                                <select class="form-control" aria-describedby="basic-addon2">
                                    <option value="john">half</option>
                                    <option value="john">time off</option>
                                    <option value="john">john</option>
                                </select>
                                <div class="input-group-append">
                                  <button type="button" data-toggle="modal" data-target="#addSupplierGroupModal" class="input-group-text text-success" id="basic-addon2"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            
                            @error('supplier_group_id')
                              <span class="text-danger" role="alert">{{$message}}</span>
                            @enderror

                        </div>
                        
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Email</label>
                            <input class="form-control" type="Email" />
                            @error('email')
                              <span class="text-danger" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Phone</label>
                            <input class="form-control"  type="number" />
                            @error('phone')
                              <span class="text-danger" role="alert">{{$message}}</span>
                            @enderror
                        </div>        
                    </div>
                </div>
                

                

                <div class="form-group">
                    <label class="font-weight-bold text-dark">Present Address</label>
                    <textarea class="form-control" placeholder="leave reason"  rows="3" ></textarea>
                    @error('present_address')
                      <span class="text-danger" role="alert">{{$message}}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Company Name</label>
                            <input type="text" class="form-control" />
                        
                            @error('company_name')
                              <span class="text-danger" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Previous Due</label>
                            <input class="form-control"  type="number" />
                            @error('previous_due')
                              <span class="text-danger" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Gender</label>
                            <select class="form-control">
                                <option value="gem">male</option>
                                <option value="gem">female</option>
                            </select>
                        
                            @error('gender')
                              <span class="text-danger" role="alert">{{$message}}</span>
                            @enderror
                        </div> 
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-dark">Status</label>
                            <select class="form-control">
                                <option value="pending">Active</option>
                                <option value="approved">Deactive</option>
                            </select>
                        
                            @error('status')
                              <span class="text-danger" role="alert">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                

                <!-- start accordion -->
                <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel">
                      <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h4 class="panel-title mb-0">Added Other Information</h4>
                      </a>
                      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body pl-3">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Country</label>
                                        <select class="form-control">
                                            <option value="">Bangladesh</option>
                                            <option value="">India</option>
                                        </select>
                                        @error('country')
                                          <span class="text-danger" role="alert">{{$message}}</span>
                                        @enderror
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">City</label>
                                        <select class="form-control">
                                            <option value="">Dhaka</option>
                                            <option value="">Mymensingh</option>
                                            <option value="">Panjab</option>
                                        </select>
                                        @error('city')
                                          <span class="text-danger" role="alert">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">State</label>
                                        <select class="form-control">
                                            <option value="">Bangladesh</option>
                                            <option value="">India</option>
                                        </select>
                                        @error('state')
                                          <span class="text-danger" role="alert">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Zip Code</label>
                                        <input type="text" class="form-control">
                                        @error('zip_code')
                                          <span class="text-danger" role="alert">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Citizenship</label>
                                        <select class="form-control">
                                            <option value="">Yes</option>
                                            <option value="">No</option>
                                        </select>
                                        @error('citizenship')
                                          <span class="text-danger" role="alert">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">National Id No</label>
                                        <input type="text" class="form-control" />
                                        @error('national_id_no')
                                          <span class="text-danger" role="alert">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Date Of Birth</label>
                                        <input type="date" class="form-control" />
                                        @error('date_of_birth')
                                          <span class="text-danger" role="alert">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Blood Group</label>
                                        <select class="form-control">
                                            <option value="">A(+)</option>
                                            <option value="">B(+)</option>
                                        </select>
                                        @error('blood_group')
                                          <span class="text-danger" role="alert">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Attach photo</label>
                                        <input class="form-control"  type="file" />
                                        @error('photo')
                                          <span class="text-danger" role="alert">{{$message}}</span>
                                        @enderror
                                    </div>         
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Alternative Email</label>
                                        <input class="form-control"  type="email" />
                                        @error('alternative_email')
                                          <span class="text-danger" role="alert">{{$message}}</span>
                                        @enderror
                                    </div> 
        
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Alternative Phone</label>
                                        <input class="form-control"  type="number" />
                                        @error('alternative_phone')
                                          <span class="text-danger" role="alert">{{$message}}</span>
                                        @enderror
                                    </div> 
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold text-dark">Permanent Address</label>
                                <textarea class="form-control" row="3"></textarea>
                                @error('permanent_address')
                                  <span class="text-danger" role="alert">{{$message}}</span>
                                @enderror
                            </div> 


                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end of accordion -->
                

                
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success">
                        <span wire:loading wire:target="add">
                            <div class="spinner-border text-danger spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            Loading...
                        </span>
                        <span wire:loading.remove>
                            Save Supplier 
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>  
    
    <!-- leave type add item -->
    <div class="modal fade"  id="addSupplierGroupModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
            @livewire('supplier.supplier-group.create-supplier-group')
        
        </div>
        </div>
    </div>
    <!-- /leaveType add item -->

</div>

