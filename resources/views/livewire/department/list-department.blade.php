<div>
    <div class="x_panel">
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
                  <select wire:model="per_page" class="form-control form-control-sm" style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset">
                      <option value="10">10</option>
                      <option value="10">20</option>
                      <option value="10">50</option>
                      <option value="10">100</option>
                  </select>
              </div>
              <div class="float-right">
                  <input wire:model="search" class="form-control form-control-sm" placeholder="Search any keywords" type="text"  style="box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset"/>
              </div>
          </div>
             
          <div class="table-responsive">
            <table class="table  table-striped jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th>
                    <input type="checkbox" wire:model="bulkSelectAll">
                  </th>
                  <th class="column-title">Name </th>
                  <th class="column-title">Description</th>
                  <th class="column-title">Created Date</th>
                  <th class="column-title no-link last"><span class="nobr">Action</span>
                  </th>
                  
                </tr>
              </thead>
  
              <tbody>
                  @foreach ($departments as $department)
                    <tr class="even pointer @if($bulkSelectAll == 1) selected @endif ">
                    <td class="a-center ">
                        <input type="checkbox" @if($bulkSelectAll == 1) checked @endif  wire:model="bulk_select" value="{{ $department->id }}">
                        
                    </td>
                    <td class=" ">{{ $department->name }}</td>
                    <td class=" ">{{ $department->description == null ? '--' : $department->description}}</td>
                    <td class=" ">{{ $department->created_at->diffForHumans() }}</td>
                    <td class=" last">
                        <a href="#">Edit</a>
                        <a href="#">delete</a>
                    </td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
            <div class="clearfix">
                <div class="float-left">
                    Showing {{ $departments->firstItem() }} to {{ $departments->lastItem() }} of {{ $departments->total() }} departments
                </div>
                <div class="float-right">
                    {{ $departments->links() }}
                </div>
                
            </div>
            @json($bulk_select)
            {{ count($bulk_select) }}
            {{  $bulkSelectAll }}
          </div>
  
  
        </div>
    </div>
</div>
