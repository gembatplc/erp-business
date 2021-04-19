<div>
@section('title')
    Customer List
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <button class="btn btn-outline-info outline-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
                <i class="fa fa-filter"></i> Filter
            </button>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item ">Customer List </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
        <div class="panel panel-outline-info collapse in" id="collapseExample" aria-expanded="true">

            <form action="#"  method="post" accept-charset="utf-8">
                <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="name">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="phone">Phone</label>
                      <input type="tel" class="form-control" id="phone" placeholder="phone">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="group">Group</label>
                        <select class="form-control" name="group" id="group">
                            <option value="">BAT IT</option>
                            <option value="">Islami Bank</option>
                            <option value="">National Bank</option>
                            <option value="">City Bank</option>
                            <option value="">Asia Bank</option>
                            <option value="">Dhaka Bank</option>
                            <option value="">Sonali Bank</option>
                        </select>
                      </div>
                  </div>
            </form>
        </div>
</div>

<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
      <div class="x_title">
        <h2>All Customers</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="add-link" data-toggle="modal" data-target="#customer"><i class="fa fa-plus"></i></a>
            </li>
            <li><a class="delete-link"><i class="fa fa-trash"></i></a>
            </li>
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

            <div class="row margin-bottom-20 text-center">
                <div class="float-left col-md-2">
                    <select class="form-control form-control-sm" style="width: 100%;">
                        <option selected="selected" disabled="">10</option>
                            <option value="5" class="text-uppercase">5</option>
                            <option value="10" class="text-uppercase">10</option>
                            <option value="20" class="text-uppercase">20</option>
                            <option value="50" class="text-uppercase">50</option>
                            <option value="100" class="text-uppercase">100</option>
                            <option value="500" class="text-uppercase">500</option>
                    </select>
                </div>

                <div class="col-sm-7 text-center">
                    <div class="dt-buttons btn-group">
                        <a class="btn btn-outline-info buttons-csv  btn-sm"  aria-controls="contact_table" href="#"><span><i class="fas fa-file-csv" aria-hidden="true"></i> Export CSV</span></a>

                        <a class="btn btn-outline-info buttons-excel  btn-sm"  aria-controls="contact_table" href="#"><span><i class="fas fa-file-excel" aria-hidden="true"></i> Export Excel</span></a>

                        <a class="btn btn-outline-info buttons-print btn-sm"  aria-controls="contact_table" href="#"><span><i class="fa fa-print" aria-hidden="true"></i> Print</span></a>

                        <a class="btn btn-outline-info buttons-collection buttons-colvis btn-sm"  aria-controls="contact_table" href="#"><span><i class="fa fa-columns" aria-hidden="true"></i> Column visibility</span></a>

                        <a class="btn btn-outline-info buttons-pdf  btn-sm"  aria-controls="contact_table" href="#"><span><i class="fa fa-file-pdf" aria-hidden="true"></i> Export PDF</span></a>
                    </div>
                </div>
                <div class="col-md-3 search-form float-right">
                    <div class="input-group">
                        <input type="text"  name="search" class="form-control form-control-sm" placeholder="Search User">
                    </div>
                </div>
            </div>

        <div class="table-responsive">
          <table class="table table-striped jambo_table bulk_action">
            <thead>
              <tr class="headings">
                <th>
                  <input type="checkbox" id="check-all" class="flat">
                </th>
                <th class="column-title">SL </th>
                <th class="column-title">Name </th>
                <th class="column-title">Address </th>
                <th class="column-title">Phone </th>
                <th class="column-title">Email </th>
                <th class="column-title">Status </th>
                <th class="column-title">Balance </th>
                <th class="column-title">Photo </th>
                <th class="column-title no-link last"><span class="nobr">Action</span>
                </th>
                <th class="bulk-actions" colspan="7">
                  <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                </th>
              </tr>
            </thead>

            <tbody>
              <tr class="even pointer">
                <td class="a-center ">
                  <input type="checkbox" class="flat" name="table_records">
                </td>
                <td class=" ">1</td>
                <td class=" ">Al Amin</td>
                <td class=" ">Nikunj-2,Khilkhet,Dhaka</td>
                <td class=" ">09121000210</td>
                <td class=" ">alamin@gmail.com</td>
                <td class=" ">Active</td>
                <td class=" ">90000</td>
                <td class=" "><img src="" alt="Photo"></td>
                <td class=" last">
                    <a href="#"><i class="fa fa-eye"></i></a>
                    <a href="#"><i class="fa fa-edit"></i></a>
                    <a href="#"><i class="fa fa-trash"></i></a>
                </td>
              </tr>

              <tr class="odd pointer">
                <td class="a-center ">
                  <input type="checkbox" class="flat" name="table_records">
                </td>
                <td class=" ">1</td>
                <td class=" ">Al Amin</td>
                <td class=" ">Nikunj-2,Khilkhet,Dhaka</td>
                <td class=" ">09121000210</td>
                <td class=" ">alamin@gmail.com</td>
                <td class=" ">Active</td>
                <td class=" ">90000</td>
                <td class=" "><img src="" alt="Photo"></td>
                <td class=" last">
                    <a href="#"><i class="fa fa-eye"></i></a>
                    <a href="#"><i class="fa fa-edit"></i></a>
                    <a href="#"><i class="fa fa-trash"></i></a>
                </td>
              </tr>

              <tr class="even pointer">
                <td class="a-center ">
                  <input type="checkbox" class="flat" name="table_records">
                </td>
                <td class=" ">1</td>
                <td class=" ">Al Amin</td>
                <td class=" ">Nikunj-2,Khilkhet,Dhaka</td>
                <td class=" ">09121000210</td>
                <td class=" ">alamin@gmail.com</td>
                <td class=" ">Active</td>
                <td class=" ">90000</td>
                <td class=" "><img src="" alt="Photo"></td>
                <td class=" last">
                    <a href="#"><i class="fa fa-eye"></i></a>
                    <a href="#"><i class="fa fa-edit"></i></a>
                    <a href="#"><i class="fa fa-trash"></i></a>
                </td>
              </tr>

            </tbody>
          </table>
        </div>


      </div>
    </div>
</div>
{{-- add new modal form --}}
<div  class="modal fade" id="customer" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalCenterTitle">Add Customer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
              <div class="card-body">
                <form>
                  <div class="form-group row">
                    <label for="customer_name" class="col-sm-2 text-right">Customer Name <i class="text-danger"> * </i>:</label>
                    <div class="col-sm-4">
                      <div class="">
                      <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder="Customer Name" value="">
                      </div>
                    </div>
                    <label for="customer_mobile" class="col-sm-2 text-right col-form-label">Mobile No <i class="text-danger"> </i>:</label>
                    <div class="col-sm-4">
                      <div class="">
                      <input type="number" name="customer_mobile" class="form-control input-mask-trigger text-left" id="customer_mobile" placeholder="Mobile No" value="" >
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="customer_email" class="col-sm-2 text-right col-form-label">Email Address1:</label>
                    <div class="col-sm-4">
                      <div class="">
                      <input type="text" class="form-control" name="customer_email" id="email"  placeholder="Email" value="">
                      </div>
                    </div>
                    <label for="email_address" class="col-sm-2 text-right col-form-label">Email Address2:</label>
                    <div class="col-sm-4">
                      <div class="">
                      <input type="text" class="form-control" name="email_address" id="email_address" placeholder="Email Address" value="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="phone" class="col-sm-2 text-right col-form-label">Phone:</label>
                    <div class="col-sm-4">
                      <div class="">
                      <input class="form-control input-mask-trigger text-left" id="phone" type="number" name="phone" placeholder="Phone" data-inputmask="'alias': 'decimal', 'groupSeparator': '', 'autoGroup': true" im-insert="true" value="">
                      </div>
                    </div>
                    <label for="contact" class="col-sm-2 text-right col-form-label">Contact:</label>
                    <div class="col-sm-4">
                      <div class="">
                      <input class="form-control" id="contact" type="text" name="contact" placeholder="Contact" value="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="address1" class="col-sm-2 text-right col-form-label">Present Address:</label>
                    <div class="col-sm-4">
                      <div class="">
                      <textarea name="customer_address" id="customer_address" class="form-control" placeholder="Address1"></textarea>
                      </div>
                    </div>
                    <label for="address2" class="col-sm-2 text-right col-form-label">Permanent Address:</label>
                    <div class="col-sm-4">
                      <div class="">
                      <textarea name="address2" id="address2" class="form-control" placeholder="Address2"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="company" class="col-sm-2 text-right col-form-label">Company:</label>
                    <div class="col-sm-4">
                      <div class="">
                      <input type="text" name="company" class="form-control" id="company" placeholder="company" value="">
                      </div>
                    </div>
                    <label for="city" class="col-sm-2 text-right col-form-label">City:</label>
                    <div class="col-sm-4">
                      <div class="">
                      <input type="text" name="city" class="form-control" id="city" placeholder="City" value="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="state" class="col-sm-2 text-right col-form-label">State:</label>
                    <div class="col-sm-4">
                      <div class="">
                      <input type="text" name="state" class="form-control" id="state" placeholder="State" value="">
                      </div>
                    </div>
                    <label for="zip" class="col-sm-2 text-right col-form-label">Zip code:</label>
                    <div class="col-sm-4">
                      <div class="">
                      <input name="zip" type="text" class="form-control" id="zip" placeholder="Zip code" value="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="country" class="col-sm-2 text-right col-form-label">Country:</label>
                    <div class="col-sm-4">
                      <div class="">
                      <input name="country" type="text" class="form-control " placeholder="Country" value="" id="country">
                      </div>
                    </div>
                    <label for="previous_balance" class="col-sm-2 text-right col-form-label">Previous Balance:</label>
                    <div class="col-sm-4">
                      <div class="">
                      <input name="previous_balance" type="number" class="form-control text-right" placeholder="Previous Balance">
                      </div>
                    </div>
                  </div>
                  </form>
                {{-- <form>
                    <div class="form-row pb-3">
                        <div class="form-group col-md-6">
                          <label for="fname">Customer Name<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="fname" placeholder="Enter full Name">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="lname">Last Name<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="lname" placeholder="Enter lname">
                        </div>
                      </div>
                    <div class="form-row pb-3">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Email<span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="phone">Phone<span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" id="phone" placeholder="Enter phone">
                      </div>
                    </div>
                    <div class="form-group pb-3">
                      <label for="inputAddress">Address<span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    <div class="form-group pb-3">
                      <label for="inputAddress2">Address 2<span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                    </div>
                    <div class="form-row pb-3">
                      <div class="form-group col-md-6">
                        <label for="inputCity">City<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="inputCity">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputState">State<span class="text-danger">*</span></label>
                        <select id="inputState" class="form-control">
                          <option selected>Choose...</option>
                          <option>...</option>
                        </select>
                      </div>
                      <div class="form-group col-md-2">
                        <label for="inputZip">Zip<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="inputZip">
                      </div>
                    </div>
                  </form> --}}
              </div>
          </div>
          <div class="card-footer text-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button"  class="btn btn-primary">Add</button>
          </div>
        </div>
        
      </div>
    </div>
  </div>
@endsection
</div>
