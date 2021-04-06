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
          <h2>Department List</h2>
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
                  <th class="column-title">Name <i class="fas fa-sort-alpha-up-alt"></i></th>
                  <th class="column-title">Description</th>
                  <th class="column-title">Created Date</th>
                  <th class="column-title no-link last"><span class="nobr">Action</span>
                  </th>

                </tr>
              </thead>

              <tbody>
                  @forelse ($departments as $department)
                    <tr class="even pointer @if($bulkSelectAll == 1) selected @elseif(in_array($department->id,$bulk_select)) selected  @endif"  wire:loading.remove wire:target="per_page,search,goto_page,next_page,previous_page,deleteItem">
                    <td class="a-center">
                        <input type="checkbox" id="check_item{{ $department->id }}" @if($bulkSelectAll == 1) checked @endif  wire:model="bulk_select" value="{{ $department->id }}">

                    </td>
                    <td class=" ">{{ $department->name }}</td>
                    <td class=" ">{{ $department->description == null ? '--' : $department->description}}</td>
                    <td class=" ">{{ $department->created_at->diffForHumans() }}</td>
                    <td class="d-flex">
                        <a href="javascript:void(0)" wire:click="editItem('{{ $department->id }}')" class="mr-2" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil text-info"></i> Edit</a>
                        <a href="javascript:void(0)" wire:click="$set('delete_id',{{ $department->id }})" data-toggle="modal" data-target="#delete-confirmation"><i class="fa fa-minus-circle text-danger"></i> Delete</a>
                    </td>
                    </tr>
                    @empty
                    <tr wire:loading.remove wire:target="per_page,search">
                        <td colspan="5" style="text-align: center;color:#ca4444;">Department has Empty</td>
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
                  <th class="column-title">Description</th>
                  <th class="column-title">Created Date</th>
                  <th class="column-title no-link last"><span class="nobr">Action</span>
                  </th>

                </tr>
              </tfoot>
            </table>
            <div class="clearfix">
                <div class="float-left">
                    Showing {{ $departments->firstItem() }} to {{ $departments->lastItem() }} of {{ $departments->total() }} departments
                </div>
                <div class="float-right">
                    {{ $departments->links() }}
                </div>
            </div>
            <div class="d-flex mt-2">
              <span class="mr-3"><i class="fa fa-arrow-right"></i> With Selected </span>
              <span class="mr-3">Selected Item ({{ count($bulk_select) }})</span>
              <a href="javascript:void(0)" wire:click="editItems" class="mr-3 @if($bulk_select == []) disabled-link @endif" data-toggle="modal" data-target="#multipleEdit"><i class="fa fa-pencil text-info"></i> Edit</a>
              <a href="javascript:void(0)" wire:click="$set('delete_single_item',false)" class="mr-3 @if($bulk_select == []) disabled-link @endif" data-toggle="modal" data-target="#delete-confirmation"><i class="fa fa-minus-circle text-danger"></i> Delete</a>
              <a href="javascript:void(0)" class="@if($bulk_select == []) disabled-link @endif"><i class="fa fa-file-excel-o text-primary"></i> Export</a>
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


    <!-- department editable item -->
    <div class="modal fade" wire:ignore.self id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Department</h4>
            <button type="button" wire:click="$set('edit_department_id',null)"  class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">


            @if($edit_department_id != null || $edit_department_id != 0 || $edit_department_id != '')
              <div class="form-group animate__fadeInDown">
                  <label class="font-weight-bold">Title</label>
                  <input class="form-control" placeholder="Title" wire:model.lazy="edit_department_name" type="text" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset"/>
                  @error('name')
                    <span class="text-danger" role="alert">{{$message}}</span>
                  @enderror
              </div>
              <div class="form-group animate__fadeInDown">
                  <label class="font-weight-bold">Description</label>
                  <textarea class="form-control" placeholder="" wire:model.lazy="edit_department_description" rows="3" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;"></textarea>
                  @error('description')
                    <span class="text-danger" role="alert">{{$message}}</span>
                  @enderror
              </div>
            @endif

          </div>
          <div class="modal-footer">
            @if($edit_department_id != null || $edit_department_id != 0 || $edit_department_id != '')
            <button type="button" class="btn btn-primary" wire:click="updateItem('{{ $edit_department_id }}')">
                <span wire:loading wire:target="updateItem">
                    <div class="spinner-border text-danger spinner-border-sm" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    Loading...
                </span>
                <span wire:loading.remove wire:target="updateItem">Save Changes</span>

            </button>
            @endif
            <button type="button" wire:click="$set('edit_department_id',null)"  class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
    <!-- /department editable item -->

     <!-- Large modal -->

     <div class="modal fade" wire:ignore.self id="multipleEdit" tabindex="-1" role="dialog" aria-hidden="true">
       <div class="modal-dialog modal-dialog-scrollable">
         <div class="modal-content">

           <div class="modal-header">
             <h4 class="modal-title" id="myModalLabel">Edit {{ count($bulk_select) }} Departments</h4>
             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
             </button>
           </div>
           <div class="modal-body">
             @if($edit_departments != [] || $edit_departments != null)
         
             @foreach ($edit_departments as $edit_department)
             <div class="form-group animate__fadeInDown">
                  <label class="font-weight-bold">Title</label>
                  <input class="form-control" wire:model="edit_department_multi_name" placeholder="Title" value="{{ $edit_department->name }}" type="text" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset"/>
                  @error('name')
                    <span class="text-danger" role="alert">{{$message}}</span>
                  @enderror
              </div>
               @json($edit_department_multi_name)
              <div class="form-group animate__fadeInDown">
                  <label class="font-weight-bold">Description</label>
                  <textarea class="form-control" name="description[]" placeholder="" rows="3" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;">{!! $edit_department->description !!}</textarea>
                  @error('description')
                    <span class="text-danger" role="alert">{{$message}}</span>
                  @enderror
              </div>
              <hr style="height: 4px; background:#b77d7d;">
             @endforeach
            
             @endif
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="button" class="btn btn-primary" wire:click="multipleItemUpdate">Save changes</button>
           </div>

         </div>
       </div>
     </div>
</div>
