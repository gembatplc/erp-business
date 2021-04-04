<div>
    <div class="x_panel">
        <div class="x_title">
          <h2>Table design <small>Custom design</small></h2>
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
  
          <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>
  
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
                  <th class="bulk-actions" colspan="7">
                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
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
            <div class="d-flex justify-content->between">
                <div class="float-right">
                    Showing 1 to 10 of 20 departments
                </div>
                <div class="">
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
