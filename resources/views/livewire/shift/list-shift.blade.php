<div>
    <div class="x_panel">
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
    <h2>Shift List</h2>
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
      <table class="table  table-striped jambo_table bulk_action">
        <thead>
          <tr class="headings">
            <th>
              <input type="checkbox" wire:model="bulkSelectAll">
            </th>
            <th class="column-title">Shift Type <i class="fas fa-sort-alpha-up-alt"></i></th>
            <th class="column-title">Branch</th>
            <th class="column-title">Start Time</th>
            <th class="column-title">End Time</th>
            <th class="column-title no-link last"><span class="nobr">Action</span>
            </th>

          </tr>
        </thead>

        <tbody>
            @forelse ($shifts as $shift)
              <tr class="even pointer @if($bulkSelectAll == 1) selected @elseif(in_array($shift->id,$bulk_select)) selected  @endif"  wire:loading.remove wire:target="per_page,search,goto_page,next_page,previous_page,deleteItem">
              <td class="a-center">
                  <input type="checkbox" id="check_item{{ $shift->id }}" @if($bulkSelectAll == 1) checked @endif  wire:model="bulk_select" value="{{ $shift->id }}">

              </td>
              <td class=" ">{{ $shift->shift_type  == 0 ? 'Fixed' : 'Flexiable' }}</td>
              <td class=" ">{{ $shift->branch->name }}</td>
              <td class=" ">{{ $shift->start_time }}</td>
              <td class=" ">{{ $shift->end_time }}</td>
              <td class="d-flex">
                  <a href="javascript:void(0)" wire:click="editItem('{{ $shift->id }}')" class="mr-2" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil text-info"></i> Edit</a>
                  <a href="javascript:void(0)" wire:click="$set('delete_id',{{ $shift->id }})" data-toggle="modal" data-target="#delete-confirmation"><i class="fa fa-minus-circle text-danger"></i> Delete</a>
              </td>
              </tr>
              @empty
              <tr wire:loading.remove wire:target="per_page,search">
                  <td colspan="6" style="text-align: center;color:#ca4444;">Shift has Empty</td>
              </tr>
            @endforelse
              <tr wire:loading wire:target="per_page,search,goto_page,previous_page,next_page,deleteItem">
                  <td colspan="6" class="mx-auto" style="text-align: center; color:#ca4444;">
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
            <th class="column-title">Shift Type <i class="fas fa-sort-alpha-up-alt"></i></th>
            <th class="column-title">Branch</th>
            <th class="column-title">Start Time</th>
            <th class="column-title">End Time</th>
            <th class="column-title no-link last"><span class="nobr">Action</span>
            </th>

          </tr>
        </tfoot>
      </table>
      <div class="clearfix">
          <div class="float-left">
              Showing {{ $shifts->firstItem() }} to {{ $shifts->lastItem() }} of {{ $shifts->total() }} shifts
          </div>
          <div class="float-right">
              {{ $shifts->links() }}
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


<!-- shift editable item -->
<div class="modal fade" wire:ignore.self id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">

    <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Edit Shift</h4>
      <button type="button" wire:click="$set('edit_shift_id',null)"  class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">


      @if($edit_shift_id != null || $edit_shift_id != 0 || $edit_shift_id != '')
        <div class="form-group animate__fadeInDown">
            <label class="font-weight-bold">Shift Type</label>
            <select class="form-control" wire:model="edit_shift_shift_type" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset">
                <option value="0">Fixed</option>
                <option value="1">Flexiable</option>
            </select>   

            @error('edit_shift_shift_type')
              <span class="text-danger" role="alert">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="font-weight-bold">Branch</label>
            <select class="form-control" wire:model="edit_shift_branch_id" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset">
                <option disabled selected>Select Branch</option>
                @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->name }} -- ({{$branch->location}})</option>
                @endforeach
            </select>
        
            @error('edit_shift_branch_id')
                <span class="text-danger" role="alert">{{$message}}</span>
            @enderror 
        </div>

        <div class="form-group animate__fadeInDown">
            <label class="font-weight-bold">Start Time</label>
            <input type="time" class="form-control" wire:model.lazy="edit_shift_start_time" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;"></textarea>
            @error('edit_shift_start_time')
                <span class="text-danger" role="alert">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="font-weight-bold">End Time</label>
            <input type="time" class="form-control" wire:model.lazy="edit_shift_end_time" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;"></textarea>
            @error('edit_shift_end_time')
              <span class="text-danger" role="alert">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="font-weight-bold">Weekly Holiday</label>
            <select class="form-control" multiple wire:model="edit_shift_weekly_holiday" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset">
                <option value="friday">Friday</option>
                <option value="saturday">Saturday</option>
                <option value="sunday">Sunday</option>
                <option value="monday">Monday</option>
                <option value="tuesday">Tuesday</option>
                <option value="wednesday">Wednesday</option>
                <option value="thursday">Thursday</option>
            </select>
        
            @error('edit_shift_weekly_holiday')
              <span class="text-danger" role="alert">{{$message}}</span>
            @enderror
        </div>
      @endif

    </div>
    <div class="modal-footer">
      @if($edit_shift_id != null || $edit_shift_id != 0 || $edit_shift_id != '')
      <button type="button" wire:click="$set('edit_shift_id',null)"  class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary" wire:click="updateItem('{{ $edit_shift_id }}')">
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
<!-- /shift editable item -->

<!-- Large modal -->

<div class="modal fade" wire:ignore.self id="multipleEdit" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog modal-dialog-scrollable">
   <div class="modal-content">

     <div class="modal-header">
       <h4 class="modal-title" id="myModalLabel">Edit {{ count($bulk_select) }} shifts</h4>
       <button type="button" wire:click="$set('edit_shifts',[])" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
       </button>
     </div>
     <div class="modal-body">
       @if($edit_shifts != [] || $edit_shifts != null)
   
       @foreach ($edit_shifts as $index => $edit_shift)
       <div class="form-group animate__fadeInDown">
            <label class="font-weight-bold">Shift Type</label>
            <select class="form-control" wire:model="edit_shifts.{{$index}}.shift_type" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset">
                <option value="0">Fixed</option>
                <option value="1">Flexiable</option>
            </select>   

            @error('edit_shifts.{{$index}}.shift_type')
            <span class="text-danger" role="alert">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="font-weight-bold">Branch</label>
            <select class="form-control" wire:model="edit_shifts.{{$index}}.branch_id" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset">
                <option disabled selected>Select Branch</option>
                @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->name }} -- ({{$branch->location}})</option>
                @endforeach
            </select>
        
            @error('edit_shifts.{{$index}}.branch_id')
                <span class="text-danger" role="alert">{{$message}}</span>
            @enderror 
        </div>

        <div class="form-group animate__fadeInDown">
            <label class="font-weight-bold">Start Time</label>
            <input type="time" class="form-control" wire:model.lazy="edit_shifts.{{$index}}.start_time" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;"></textarea>
            @error('edit_shifts.{{$index}}.start_time')
                <span class="text-danger" role="alert">{{$message}}</span>
            @enderror
        </div>


        <div class="form-group">
            <label class="font-weight-bold">End Time</label>
            <input type="time" class="form-control" wire:model.lazy="edit_shifts.{{$index}}.end_time" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;"></textarea>
            @error('edit_shifts.{{$index}}.end_time')
              <span class="text-danger" role="alert">{{$message}}</span>
            @enderror
        </div>


        <div class="form-group">
            <label class="font-weight-bold">Weekly Holiday</label>
            <select class="form-control" multiple wire:model="edit_shifts.{{$index}}.weekly_holiday" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset">
                <option value="friday">Friday</option>
                <option value="saturday">Saturday</option>
                <option value="sunday">Sunday</option>
                <option value="monday">Monday</option>
                <option value="tuesday">Tuesday</option>
                <option value="wednesday">Wednesday</option>
                <option value="thursday">Thursday</option>
            </select>
        
            @error('edit_shifts.{{$index}}.weekly_holiday')
              <span class="text-danger" role="alert">{{$message}}</span>
            @enderror
        </div>
        <hr style="height: 4px; background:#b77d7d;">
       @endforeach
      
       @endif
     </div>
     <div class="modal-footer">
        <button type="button" wire:click="$set('edit_shifts',[])" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

