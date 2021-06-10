<div>
    @section('title')
        Attendance List
    @endsection


    @section('content')
        <div class="row">
            <div class="col-md-12">
              <div class="x_panel shadow-sm border-0">
                <div class="x_title">
                    <h2>Select Attendance Date</h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="card-body">
        
                    
                   
                        <div class="form-group col-6 mx-auto">
                            <input class="form-control" placeholder="Title"  type="date" />
                        </div>
        
              
                </div>
            </div>

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
                <h2>Attendance List</h2>
                <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-success btn-sm  mb-0 float-right"><i class="fa fa-plus"></i> Create Attendance</button>
                
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
                        <th class="column-title">In time</th>
                        <th class="column-title">Out time</th>
                        <th class="column-title">work duration</th>
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
                           <td>9:00 am</td>
                           <td>5:20 pm</td>
                           <td>8:20 hr</td>    
                           <td><span class="text-primary">Present</span></td>
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
                        <td>8:50 am</td>
                        <td>5:00 pm</td>
                        <td>8:10 hr</td>
                        <td><span class="text-primary">Present</span></td>
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
                        <td>Null</td>
                        <td>null</td>
                        <td>0</td>
 
                        <td><span class="text-danger">Absent</span></td>
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
                        <th class="column-title">In time</th>
                        <th class="column-title">Out Time</th>
                        <th class="column-title">word Duration</th>
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
        <div class="modal-dialog modal-xl">
        <div class="modal-content">
            
            @livewire('attendance.form-attendance')
        
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
          <h4 class="modal-title" id="myModalLabel">Edit Attendance</h4>
          <button type="button"   class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
             
                <div class="card-body">
        
                    <div class="row">
                        <div class="col-md-2"><span class="font-weight-bold text-dark">Employee</span></div>
                        <div class="col-md-2"><span class="font-weight-bold text-dark">Designation</span></div>
                        <div class="col-md-2"><span class="font-weight-bold text-dark">In time</span></div>
                        <div class="col-md-2"><span class="font-weight-bold text-dark">Out Time</span></div>
                        <div class="col-md-2"><span class="font-weight-bold text-dark">Status</span></div>
                        <div class="col-md-2"><span class="font-weight-bold text-dark">Remark</span></div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">Gem</div>
                        <div class="col-md-2">web developer</div>
                        <div class="col-md-2"><input type="time" /></div>
                        <div class="col-md-2"><input type="time" /></div>
                        <div class="col-md-2"><input type="checkbox" />Present/absent</div>
                        <div class="col-md-2"><input type="text" size="12"/></div>
                    </div>
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
