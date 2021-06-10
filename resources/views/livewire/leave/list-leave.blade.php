<div>
    @section('title')
        Leave list
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
                <h2>Leave List</h2>
                <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-success btn-sm  mb-0 float-right"><i class="fa fa-plus"></i> Create Leave</button>
                
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
                        <th class="column-title">Employee <i class="fas fa-sort-alpha-up-alt"></i></th>
                        <th class="column-title">Designation</th>
                        <th class="column-title">Leave Type</th>
                        <th class="column-title">Start Date</th>
                        <th class="column-title">End Date</th>
                        <th class="column-title">Total day</th>
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
                           <td>web developer</td>
                           <td>time off</td>
                           <td>02-02-2021</td>
                           <td>05-02-2021</td>
                           <td>4 days</td>
                           <td><span class="text-success">Approved</span></td>
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
                        <td>web developer</td>
                        <td>time off</td>
                        <td>02-02-2021</td>
                        <td>05-02-2021</td>
                        <td>4 days</td>
                        <td><span class="text-primary">Pending</span></td>
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
                        <td>web developer</td>
                        <td>time off</td>
                        <td>02-02-2021</td>
                        <td>05-02-2021</td>
                        <td>4 days</td>
                        <td><span class="text-danger">cancel</span></td>
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
                        <th class="column-title">Employee <i class="fas fa-sort-alpha-up-alt"></i></th>
                        <th class="column-title">Designation</th>
                        <th class="column-title">Leave Type</th>
                        <th class="column-title">Start Date</th>
                        <th class="column-title">End Date</th>
                        <th class="column-title">Total day</th>
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
    <div class="modal fade"  id="addLeaveTypeModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
            @livewire('leave.leave-type.create-leave-type')
        
        </div>
        </div>
    </div>
    <!-- /leaveType add item -->

    <!-- leave add item -->
    <div class="modal fade"  id="addEmployeeModal" tabindex="-1" role="dialog"  aria-hidden="true">
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

        <!-- leave add item -->
    <div class="modal fade"  id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
            @livewire('leave.form-leave')
        
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
          <h4 class="modal-title" id="myModalLabel">Edit Leave Type</h4>
          <button type="button"   class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
             
                <div class="card-body">
        
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