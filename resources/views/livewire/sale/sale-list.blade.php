<div>
@section('title')
    Sale List
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
            <li class="breadcrumb-item ">Sales List </li>
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
        <h2>All Sales</h2>
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
                <th class="column-title">Customer </th>
                <th class="column-title">Employee </th>
                <th class="column-title">Invoice No</th>
                <th class="column-title">Invoice Date </th>
                <th class="column-title">Sales Status </th>
                <th class="column-title">Payment Status </th>
                <th class="column-title">Paid Amount </th>
                <th class="column-title">Due Amount </th>
                <th class="column-title">Total Amount </th>
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
                <td class=" ">Al Amin</td>
                <td class=" ">Monir</td>
                <td class=" ">121000040</td>
                <td class=" ">17 apr 2021 </td>
                <td class=" ">Orderd</td>
                <td class=" ">Paid</td>
                <td class="a-right a-right ">$7.45</td>
                <td class="a-right a-right ">$7.45</td>
                <td class="a-right a-right ">$7.45</td>
                <td class=" last">
                    <a href="#" data-toggle="modal" data-target="#sale-details"><i class="fa fa-eye"></i></a>
                    <a href="#"><i class="fa fa-edit"></i></a>
                    <a href="#"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <tr class="odd pointer">
                <td class="a-center ">
                  <input type="checkbox" class="flat" name="table_records">
                </td>
                <td class=" ">Al Amin</td>
                <td class=" ">Monir</td>
                <td class=" ">121000040</td>
                <td class=" ">17 apr 2021 </td>
                <td class=" ">Orderd</td>
                <td class=" ">Paid</td>
                <td class="a-right a-right ">$7.45</td>
                <td class="a-right a-right ">$7.45</td>
                <td class="a-right a-right ">$7.45</td>
                <td class=" last">
                    <a href="#" data-toggle="modal" data-target="#sale-details"><i class="fa fa-eye"></i></a>
                    <a href="#"><i class="fa fa-edit"></i></a>
                    <a href="#"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <tr class="even pointer">
                <td class="a-center ">
                  <input type="checkbox" class="flat" name="table_records">
                </td>
                <td class=" ">Al Amin</td>
                <td class=" ">Monir</td>
                <td class=" ">121000040</td>
                <td class=" ">17 apr 2021 </td>
                <td class=" ">Orderd</td>
                <td class=" ">Paid</td>
                <td class="a-right a-right ">$7.45</td>
                <td class="a-right a-right ">$7.45</td>
                <td class="a-right a-right ">$7.45</td>
                <td class=" last">
                    <a href="#" data-toggle="modal" data-target="#sale-details"><i class="fa fa-eye"></i></a>
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
          <h5 class="modal-title" id="ModalCenterTitle">Add Sales</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
              <div class="card-body">
                <form>
                    <div class="form-row pb-3">
                        <div class="form-group col-md-6">
                          <label for="fname">First Name<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="fname" placeholder="Enter First Name">
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
                  </form>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button"  class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </div>
  {{-- view sale modal --}}
  <div  class="modal fade" id="sale-details" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalCenterTitle">Sales Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row mb-2">
              <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Invoice</a></li>
                  <li class="breadcrumb-item ">Sales List </li>
                </ol>
              </div><!-- /.col -->
            </div>
          <div class="card">
              <div class="card-body">
                  <div class="row">
                      <div class="col-sm-12">
                          <div class="col-sm-8">
                              <span class="btn btn-success m-r-15 p-10">Billing From</span>
                              <address class="margin-top10">
                                <strong class="company_name_p">Bangladesh Automation Technologies</strong><br>
                                Nikunj-2,Khilkhet,Dhaka-1229<br>
                                <abbr><b>Mobile:</b></abbr> 234234<br>
                                <abbr><b>Email:</b></abbr>
                                example@gmail.com<br>
                                <abbr><b>Website:</b></abbr>
                                httpss://www.bdtask.com/<br>
                                <abbr>VAT Reg No - V4753, IGT Reg No - G3245, </abbr>
                              </address>
                          </div>
                          <div class="col-sm-4 text-left invoice-address">
                              <h2 class="m-t-0">Sale</h2>
                              <div>Invoice No: 1001</div>
                              <div class="m-b-15">Billing Date: 24-Oct-2020</div>
                              <span class="btn btn-success m-r-15">Billing To</span>
                              <address class="customer_name_p">
                              <strong class="c_name">Walking Customer </strong><br>
                              <br>
                              <abbr><b>Mobile:</b></abbr>
                              </address>
                          </div>
                      </div>
                      <div class="table-responsive">
                          <table class="table table-striped">
                            <thead>
                                <tr>
                                  <th class="text-center">SL.</th>
                                  <th class="text-center">Product Name</th>
                                  <th class="text-center">Unit</th>
                                  <th class="text-center"></th>
                                  <th class="text-center"></th>
                                  <th class="text-right">Qnty</th>
                                  <th class="text-right"></th>
                                  <th class="text-right">Rate</th>
                                  <th class="text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="text-center">1</td>
                                <td class="text-center"><div>Oven - (Sm)</div></td>
                                <td class="text-center"><div>piece </div></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-right">5.00</td>
                                <td class="text-right"></td>
                                <td class="text-right">$ 10000.00</td>
                                <td class="text-right">$ 50000.00</td>
                              </tr>
                              <tr>
                                <td class="text-left" colspan="5"><b>Grand Total:</b></td>
                                <td class="text-right"><b>5.00</b></td>
                                <td></td>
                                <td></td>
                                <td class="text-right"><b>$ 50,000.00</b></td>
                              </tr>
                            </tbody>
                          </table>
                      </div>
                  </div>
                      <div class="row">
                          <div class="col-xs-8">
                            <p><strong>Thank you for shopping with us</strong></p>
                          </div>
                          <div class="col-xs-4">
                            <table class="table ">
                              <tbody>
                                <tr>
                                  <th class="text-left grand_total">Previous :</th>
                                  <td class="text-right grand_total">$ 0.00</td>
                                </tr>
                                <tr>
                                  <th class="text-left grand_total">Grand Total :</th>
                                  <td class="text-right grand_total">$ 50,000.00</td>
                                </tr>
                                <tr>
                                  <th class="text-left grand_total border-bottom-top">Paid Amount : </th>
                                  <td class="text-right grand_total border-bottom-top">$ 50,000.00</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                      </div>
                      <div class="row margin-top50">
                          <div class="col-xs-4">
                            <div class="text-left">
                            Received By </div>
                          </div>
                          <div class="col-xs-4"></div>
                          <div class="col-xs-4"> <div class="text-right">
                          Authorised By </div></div>
                      </div>
            </div>
            <div class="card-footer">
              <button class="btn btn-info"><span class="fa fa-print"></span></button>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

</div>
