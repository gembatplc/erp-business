<div>
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
    <h2>Leave Type List</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Settings 1</a>
            <a class="dropdown-item" href="#">Settings 2</a>
          </div>
      </li>
      <li><a class="close-link"><i class="fa fa-close"></i></a>
      </li>
    </ul>
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
      <table class="table table-bordered  table-striped jambo_table bulk_action">
        <thead>
          <tr class="headings">
            <th>
              <input type="checkbox" wire:model="bulkSelectAll">
            </th>
            <th class="column-title">Name <i class="fas fa-sort-alpha-up-alt"></i></th>
            <th class="column-title">Maximum Leave</th>
            <th class="column-title">Created Date</th>
            <th class="column-title no-link last"><span class="nobr">Action</span>
            </th>

          </tr>
        </thead>

        <tbody>
            @forelse ($leaveTypes as $leaveType)
              <tr class="even pointer @if($bulkSelectAll == 1) selected @elseif(in_array($leaveType->id,$bulk_select)) selected  @endif"  wire:loading.remove wire:target="per_page,search,goto_page,next_page,previous_page,deleteItem">
              <td class="a-center">
                  <input type="checkbox" id="check_item{{ $leaveType->id }}" @if($bulkSelectAll == 1) checked @endif  wire:model="bulk_select" value="{{ $leaveType->id }}">

              </td>
              <td class=" ">{{ $leaveType->name }}</td>
              <td class=" ">{{ $leaveType->max_leave_count}} on {{ $leaveType->leave_count_interval }}</td>
              <td class=" ">{{ $leaveType->created_at->diffForHumans() }}</td>
              <td class="d-flex">
                  <a href="javascript:void(0)" wire:click="editItem('{{ $leaveType->id }}')" class="mr-2" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil text-info"></i> Edit</a>
                  <a href="javascript:void(0)" wire:click="$set('delete_id',{{ $leaveType->id }})" data-toggle="modal" data-target="#delete-confirmation"><i class="fa fa-minus-circle text-danger"></i> Delete</a>
              </td>
              </tr>
              @empty
              <tr wire:loading.remove wire:target="per_page,search">
                  <td colspan="5" style="text-align: center;color:#ca4444;">Leave Type has Empty</td>
              </tr>
            @endforelse
              <tr wire:loading wire:target="per_page,search,goto_page,previous_page,next_page,deleteItem">
                  <td colspan="5" class="mx-auto" style="text-align: center; color:#ca4444;">
                      <div class="spinner-border text-danger spinner-border-sm" role="status">
                          <span class="sr-only">Loading...</span>
                      </div> Loading...
                  </td>
              </tr>
        </tbody>
        <tfoot>
          <tr class="headings" style="background: rgba(52,73,94,0.94); color:white;">
            <th>
              {{-- <input type="checkbox" wire:model="bulkSelectAll"> --}}
            </th>
            <th class="column-title">Name <i class="fas fa-sort-alpha-up-alt"></i></th>
            <th class="column-title">Maximum Leave</th>
            <th class="column-title">Created Date</th>
            <th class="column-title no-link last"><span class="nobr">Action</span>
            </th>

          </tr>
        </tfoot>
      </table>
      <div class="clearfix">
          <div class="float-left">
              Showing {{ $leaveTypes->firstItem() }} to {{ $leaveTypes->lastItem() }} of {{ $leaveTypes->total() }} leaveTypes
          </div>
          <div class="float-right">
              {{ $leaveTypes->links() }}
          </div>
      </div>
      <div class="d-flex mt-2">
        <span class="mr-3"><i class="fa fa-arrow-right"></i> With Selected </span>
        <span class="mr-3">Selected Item ({{ count($bulk_select) }})</span>
        <a href="javascript:void(0)" wire:click="editItems" class="mr-3 @if($bulk_select == []) disabled-link @endif" data-toggle="modal" data-target="#multipleEdit"><i class="fa fa-pencil text-info"></i> Edit</a>
        <a href="javascript:void(0)" wire:click="$set('delete_single_item',false)" class="mr-3 @if($bulk_select == []) disabled-link @endif" data-toggle="modal" data-target="#delete-confirmation"><i class="fa fa-minus-circle text-danger"></i> Delete</a>
        <a href="javascript:void(0)" wire:click="exportItems" class="@if($bulk_select == []) disabled-link @endif"><i class="fa fa-file-excel-o text-primary"></i> Export</a>
      </div>
    </div>


  </div>
</div>





<!-- modals for delete confimation --->
<!-- confimation modal -->
<div class="modal fade" wire:ignore.self id="delete-confirmation" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">

    <div class="modal-header">
      <button type="button" wire:click="$set('delete_id',null)" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">
      <h5>Are You Sure Delete This Item?</h5>
      <button class="btn btn-danger" wire:click="deleteItem" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Yes</button>
      <button class="btn btn-secondary" wire:click="$set('delete_id',null)" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">No</button>
    </div>
  </div>
</div>
</div>
<!-- /modals -->
<!-- /modals for delete confimation -->


<!-- leaveType editable item -->
<div class="modal fade" wire:ignore.self id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">

    <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Edit Leave Type</h4>
      <button type="button" wire:click="$set('edit_leaveType_id',null)"  class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">


      @if($edit_leaveType_id != null || $edit_leaveType_id != 0 || $edit_leaveType_id != '')
        <div class="form-group animate__fadeInDown">
            <label class="font-weight-bold">Title</label>
            <input class="form-control" placeholder="Title" wire:model.lazy="edit_leaveType_name" type="text" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset"/>
            @error('edit_leaveType_name')
              <span class="text-danger" role="alert">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group animate__fadeInDown">
            <label class="font-weight-bold">Maximum Leave Count</label>
            <input class="form-control" placeholder="Title" wire:model.lazy="edit_leaveType_max_leave_count" type="text" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset"/>
            @error('edit_leaveType_max_leave_count')
              <span class="text-danger" role="alert">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="font-weight-bold">Leave Count Interval</label>
            <select class="form-control" placeholder="Location" wire:model="edit_leaveType_leave_count_interval" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset">
                <option value="monthly">Monthly</option>
                <option value="weekly">Weekly</option>
                <option value="biweekly">Biweekly</option>
                <option value="yearly">Yearly</option>
            </select>
        
            @error('edit_leaveType_leave_count_interval')
              <span class="text-danger" role="alert">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group animate__fadeInDown">
            <label class="font-weight-bold">Description</label>
            <textarea class="form-control" placeholder="" wire:model.lazy="edit_leaveType_description" rows="3" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;"></textarea>
            @error('edit_leaveType_description')
              <span class="text-danger" role="alert">{{$message}}</span>
            @enderror
        </div>
      @endif

    </div>
    <div class="modal-footer">
      @if($edit_leaveType_id != null || $edit_leaveType_id != 0 || $edit_leaveType_id != '')
      <button type="button" wire:click="$set('edit_leaveType_id',null)"  class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary" wire:click="updateItem('{{ $edit_leaveType_id }}')">
          <span wire:loading wire:target="updateItem">
              <div class="spinner-border text-danger spinner-border-sm" role="status">
                  <span class="sr-only">Loading...</span>
              </div>
              Loading...
          </span>
          <span wire:loading.remove wire:target="updateItem">Save Changes</span>

      </button>
      @endif
    </div>

  </div>
</div>
</div>
<!-- /leaveType editable item -->

<!-- Large modal -->

<div class="modal fade" wire:ignore.self id="multipleEdit" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog modal-dialog-scrollable">
   <div class="modal-content">

     <div class="modal-header">
       <h4 class="modal-title" id="myModalLabel">Edit {{ count($bulk_select) }} Leave Types</h4>
       <button type="button" wire:click="$set('edit_leaveTypes',[])" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
       </button>
     </div>
     <div class="modal-body">
        
       @if($edit_leaveTypes != [] || $edit_leaveTypes != null)
      
      
       @foreach ($edit_leaveTypes as $index => $edit_leaveType)
       <div class="form-group animate__fadeInDown">
            <label class="font-weight-bold">Title</label>
            <input class="form-control" wire:model.lazy="edit_leaveTypes.{{$index}}.name" placeholder="Title" value="{{ $edit_leaveType->name }}" type="text" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset"/>
            @error('edit_leaveTypes.{{$index}}.name')
              <span class="text-danger" role="alert">{{$message}}</span>
            @enderror
        </div>
      
        <div class="form-group animate__fadeInDown">
            <label class="font-weight-bold">Maximum Leave Count</label>
            <input class="form-control"  wire:model.lazy="edit_leaveTypes.{{$index}}.max_leave_count" type="text" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset"/>
            @error('edit_leaveTypes.{{$index}}.max_leave_count')
              <span class="text-danger" role="alert">{{$message}}</span>
            @enderror
        </div>


        <div class="form-group">
            <label class="font-weight-bold">Leave Count Interval</label>
            <select class="form-control" wire:model="edit_leaveTypes.{{$index}}.leave_count_interval" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset">
                <option value="monthly">Monthly</option>
                <option value="weekly">Weekly</option>
                <option value="biweekly">Biweekly</option>
                <option value="yearly">Yearly</option>
            </select>
        
            @error('edit_leaveTypes.{{$index}}.leave_count_interval')
              <span class="text-danger" role="alert">{{$message}}</span>
            @enderror
        </div>
        

        <div class="form-group animate__fadeInDown">
            <label class="font-weight-bold">Description</label>
            <textarea class="form-control" wire:model.lazy="edit_leaveTypes.{{$index}}.description" rows="3" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;">{!! $edit_leaveType->description !!}</textarea>
            @error('edit_leaveTypes.{{$index}}.description')
              <span class="text-danger" role="alert">{{$message}}</span>
            @enderror
        </div>
        <hr style="height: 4px; background:#b77d7d;">
       @endforeach
        
     
       @endif
     </div>
     <div class="modal-footer">
       <button type="button" wire:click="$set('edit_leaveTypes',[])" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <button type="button" class="btn btn-primary" wire:click="updateItems">
          <span wire:loading wire:target="updateItems">
              <div class="spinner-border text-danger spinner-border-sm" role="status">
                  <span class="sr-only">Loading...</span>
              </div>
              Loading...
          </span>
          <span wire:loading.remove wire:target="updateItems">Save Changes</span>
        </button>
     </div>

   </div>
 </div>
</div>
</div>
