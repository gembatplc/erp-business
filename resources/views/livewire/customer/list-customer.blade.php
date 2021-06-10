<div>
    @section('title')
        Customer list
    @endsection


    @section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel shadow-sm border-0">
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
              <div class="x_title">
                <h2>Customer List</h2>
                <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-success btn-sm  mb-0 float-right"><i class="fa fa-plus"></i> Create Customer</button>
                
                <div class="clearfix"></div>
              </div>
            
              <div class="x_content">
            
                <div class="clearfix mb-2">
                    <div class="float-left">
                      <!-- selected option per page -->
                        <select wire:model="per_page" class="form-control form-control-sm" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <!-- /selected option per page -->
                    </div>
                    <div class="float-right">
                      <!-- search option query search -->
                        <input wire:model="search" class="form-control form-control-sm" placeholder="Search any keywords" type="text"  style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset"/>
                      <!-- /serach option query search -->
                    </div>
                </div>
            
                <div class="table-responsive">
                  <table class="table  table-striped jambo_table bulk_action">
                    <thead>
                      <tr class="headings">
                        <th>
                          <input type="checkbox" wire:model="bulkSelectAll">
                        </th>
                        <th class="column-title">Full Name <i class="fas fa-sort-alpha-up-alt"></i></th>
                        <th class="column-title">Email</th>
                        <th class="column-title">Phone</th>
                        <th class="column-title">Company Name</th>
                        <th class="column-title">Customer Group</th>
                        <th class="column-title">Previous Due</th>
                        <th class="column-title">Status</th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>
            
                      </tr>
                    </thead>
            
                    <tbody>
                       <tr>
                           <td>
                            <input type="checkbox">
                           </td>
                           <td>gem</td>
                           <td>Gem@gmail.com</td>
                           <td>02321923</td>
                           <td>lteds</td>
                           <td>uniuer</td>
                           <td>1000 tk</td>
                           <td><span class="text-success">Active</span></td>
                           <td class="d-flex">
                            <a href="javascript:void(0)"  class="mr-2" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil text-info"></i> Edit</a>
                            <a href="javascript:void(0)"  data-toggle="modal" data-target="#delete-confirmation"><i class="fa fa-minus-circle text-danger"></i> Delete</a>
                        </td>
                       </tr>
                       <tr>
                        <td>
                         <input type="checkbox">
                        </td>
                        <td>gem</td>
                        <td>Gem@gmail.com</td>
                        <td>02321923</td>
                        <td>lteds</td>
                        <td>uniuer</td>
                        <td>1000 tk</td>
                        <td><span class="text-success">Active</span></td>
                        <td class="d-flex">
                         <a href="javascript:void(0)"  class="mr-2" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil text-info"></i> Edit</a>
                         <a href="javascript:void(0)"  data-toggle="modal" data-target="#delete-confirmation"><i class="fa fa-minus-circle text-danger"></i> Delete</a>
                     </td>
                    </tr>
                    <tr>
                        <td>
                         <input type="checkbox">
                        </td>
                        <td>gem</td>
                        <td>Gem@gmail.com</td>
                        <td>02321923</td>
                        <td>lteds</td>
                        <td>uniuer</td>
                        <td>1000 tk</td>
                        <td><span class="text-success">Active</span></td>
                        <td class="d-flex">
                         <a href="javascript:void(0)"  class="mr-2" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil text-info"></i> Edit</a>
                         <a href="javascript:void(0)"  data-toggle="modal" data-target="#delete-confirmation"><i class="fa fa-minus-circle text-danger"></i> Delete</a>
                     </td>
                    </tr>
                      
                    
                    </tbody>
                    <tfoot>
                      <tr class="headings" style="background: rgba(52,73,94,0.94); color:white;">
                        <th>
                          {{-- <input type="checkbox" wire:model="bulkSelectAll"> --}}
                        </th>
                        <th class="column-title">Full Name <i class="fas fa-sort-alpha-up-alt"></i></th>
                        <th class="column-title">Email</th>
                        <th class="column-title">Phone</th>
                        <th class="column-title">Company Name</th>
                        <th class="column-title">Customer Group</th>
                        <th class="column-title">Previous Due</th>
                        <th class="column-title">Status</th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>
            
                      </tr>
                    </tfoot>
                  </table>
                  <div class="clearfix">
                      <div class="float-left">
                          {{-- Showing {{ $leaveTypes->firstItem() }} to {{ $leaveTypes->lastItem() }} of {{ $leaveTypes->total() }} leaveTypes --}}
                      </div>
                      <div class="float-right">
                          {{-- {{ $leaveTypes->links() }} --}}
                      </div>
                  </div>
                  {{-- <div class="d-flex mt-2">
                    <span class="mr-3"><i class="fa fa-arrow-right"></i> With Selected </span>
                    <span class="mr-3">Selected Item ({{ count($bulk_select) }})</span>
                    <a href="javascript:void(0)" wire:click="editItems" class="mr-3 @if($bulk_select == []) disabled-link @endif" data-toggle="modal" data-target="#multipleEdit"><i class="fa fa-pencil text-info"></i> Edit</a>
                    <a href="javascript:void(0)" wire:click="$set('delete_single_item',false)" class="mr-3 @if($bulk_select == []) disabled-link @endif" data-toggle="modal" data-target="#delete-confirmation"><i class="fa fa-minus-circle text-danger"></i> Delete</a>
                    <a href="javascript:void(0)" wire:click="exportItems" class="@if($bulk_select == []) disabled-link @endif"><i class="fa fa-file-excel-o text-primary"></i> Export</a>
                  </div> --}}
                </div>
            
            
              </div>
            </div>
            </div>
        </div>

            <!-- leave type add item -->
    <div class="modal fade"  id="addCustomerGroupModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
            @livewire('customer.customer-group.create-customer-group')
        
        </div>
        </div>
    </div>
    <!-- /leaveType add item -->



        <!-- leave add item -->
    <div class="modal fade"  id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
            @livewire('customer.form-customer')
        
        </div>
        </div>
    </div>
    <!-- /leaveType editable item -->


        <!-- modals for delete confimation --->
<!-- confimation modal -->
    <div class="modal fade"  id="delete-confirmation" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
    
        <div class="modal-header">
          <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <h5>Are You Sure Delete This Item?</h5>
          <button class="btn btn-danger"  data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Yes</button>
          <button class="btn btn-secondary"  data-dismiss="modal" aria-label="Close"><span aria-hidden="true">No</button>
        </div>
      </div>
    </div>
    </div>
    <!-- /modals -->
    <!-- /modals for delete confimation -->

    <!-- leaveType editable item -->
    <div class="modal fade"  id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
    
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Edit Customer</h4>
          <button type="button"   class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
             
            <div class="card-body">
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
                                <label class="font-weight-bold text-dark">Customer Group</label>
                                <div class="input-group mb-3">
                                    <select class="form-control" aria-describedby="basic-addon2">
                                        <option value="john">half</option>
                                        <option value="john">time off</option>
                                        <option value="john">john</option>
                                    </select>
                                    <div class="input-group-append">
                                      <button type="button" data-toggle="modal" data-target="#addCustomerGroupModal" class="input-group-text text-success" id="basic-addon2"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                
                                @error('customer_group_id')
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
                    
                </form>
                
            </div>
        </div>
        <div class="modal-footer">
          {{-- @if($edit_leaveType_id != null || $edit_leaveType_id != 0 || $edit_leaveType_id != '') --}}
          <button type="button"   class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" >
              <span wire:loading >
                  <div class="spinner-border text-danger spinner-border-sm" role="status">
                      <span class="sr-only">Loading...</span>
                  </div>
                  Loading...
              </span>
              <span wire:loading.remove>Save Changes</span>
    
          </button>
          {{-- @endif --}}
        </div>
    
      </div>
    </div>
    </div>
    <!-- /leaveType editable item -->

    @endsection
</div>