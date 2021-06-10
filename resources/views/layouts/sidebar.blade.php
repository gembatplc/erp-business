<div class="col-md-3 left_col menu_fixed shadow-sm" style="background: #2A3F54;">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0; background: #172d44;">
        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>{{ config('app.name') }}</span></a>
      </div>

      <div class="clearfix"></div>

      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="{{ asset('assets/build') }}/images/img.jpg" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span>Welcome,</span>
          <h2>Admin</h2>
        </div>
      </div>
      <!-- /menu profile quick info -->

      <br />

      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3>General</h3>
          <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ route('home') }}">Dashboard</a></li>
              </ul>
            </li>

            <li><a><i class="fa fa-balance-scale"></i> Sale <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{ route('sale.list') }}">Sale List</a></li>
                  <li><a href="{{ route('add.sale') }}">Add Sale</a></li>
                </ul>
            </li>

            <li><a><i class="fa fa-users"></i> Customer <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li class="{{ Request::is('customer-create') ? 'current-page' : '' }}"><a href="{{ route('customer_create') }}">Add Customer</a></li>
                  <li class="{{ Request::is('customer-list') ? 'current-page' : '' }}"><a href="{{ route('customer_list') }}">Customer list</a></li>
                  <li class="{{ Request::is('customer-group') ? 'current-page' : '' }}"><a href="{{ route('customer.group') }}">Customer Group</a></li>
                  <li><a href="#">Credit Customer</a></li>
                  <li><a href="#">Paid Customer</a></li>
                  <li><a href="#">Customer Ledger</a></li>
                </ul>
              </li>

              <li><a><i class="fa fa-user"></i> Supplier <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li class="{{ Request::is('supplier-create') ? 'current-page' : '' }}"><a href="{{ route('supplier_create') }}">Add Supplier</a></li>
                  <li class="{{ Request::is('supplier-list') ? 'current-page' : '' }}"><a href="{{ route('supplier_list') }}">Supplier List</a></li>
                  <li class="{{ Request::is('supplier-group') ? 'current-page' : '' }}"><a href="{{ route('supplier.group') }}">Supplier Groups</a></li>
                  <li><a href="form_advanced.html">Supplier Ledger</a></li>
                </ul>
              </li>

              <li><a><i class="fa fa-cubes"></i> Products <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="#">Products list</a></li>
                  <li><a href="#">Products Barcode</a></li>
                  <li><a href="#">Product Quatation</a></li>
                  <li><a href="#">Product Vairations</a></li>
                  <li class="{{ Request::is('category') ? 'current-page' : '' }}"><a href="{{ route('category') }}">Category</a></li>
                  <li class="{{ Request::is('brand') ? 'current-page' : '' }}"><a href="{{ route('brand') }}">Brand</a></li>
                  <li class="{{ Request::is('warehouse') ? 'current-page' : '' }}"><a href="{{ route('warehouse') }}">Warehouse</a></li>
                  <li><a href="#">Product Warrenty</a></li>
                </ul>
              </li>

              <li><a><i class="fa fa-shopping-cart"></i> Purcheses <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="#">Purcheses list</a></li>
                  <li><a href="#">Purcheses Add</a></li>
                </ul>
              </li>


            <li><a><i class="fa fa-desktop"></i>Account<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li class="{{ Request::is('account') ? 'current-page' : '' }}"><a href="{{ route('account') }}">Account List</a></li>
                <li class="{{ Request::is('account-type') ? 'current-page' : '' }}"><a href="{{ route('account_type') }}">Account Types</a></li>
                <li class="{{ Request::is('expense') ? 'current-page' : '' }}"><a href="{{ route('expense') }}">Expense</a></li>
                <li class="{{ Request::is('expense-type') ? 'current-page' : '' }}"><a href="{{ route('expense_type') }}">Expense Type</a></li>
                <li class="{{ Request::is('money-transfer') ? 'current-page' : '' }}"><a href="{{ route('money_transfer') }}">Money Transfer</a></li>
              </ul>
            </li>

            <li><a><i class="fa fa-users"></i>Human Resource<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a><i class="fa fa-desktop"></i>HRM<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="{{ Request::is('department') ? 'current-page' : '' }}"><a href="{{ route('department') }}">Department</a></li>
                        <li class="{{ Request::is('designation') ? 'current-page' : '' }}"><a href="{{ route('designation') }}">Designation</a></li>
                        <li class="{{ Request::is('employee-create') ? 'current-page' : '' }}"><a href="{{ route('employee_create') }}">Add Employee</a></li>
                        <li class="{{ Request::is('employee-list') ? 'current-page' : '' }}"><a href="{{ route('employee_list') }}">All Employee</a></li>
                        <li class="{{ Request::is('holiday') ? 'current-page' : '' }}"><a href="{{ route('holiday') }}">Holyday</a></li>
                        <li class="{{ Request::is('leave-create') ? 'current-page' : '' }}"><a href="{{ route('leave_create') }}">Create Leave</a></li>
                        <li class="{{ Request::is('leave-list') ? 'current-page' : '' }}"><a href="{{ route('leave_list') }}">List Leaves</a></li>
                        <li class="{{ Request::is('leave-type') ? 'current-page' : '' }}"><a href="{{ route('leave_type') }}">Leaves Types</a></li>
                    </ul>
                  </li>

                  

                  <li><a><i class="fa fa-desktop"></i>Attendence<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="{{ Request::is('attendance-create') ? 'current-page' : '' }}"><a href="{{ route('attendance_create') }}">Add Attendence</a></li>
                        <li class="{{ Request::is('attendance-list') ? 'current-page' : '' }}"><a href="{{ route('attendance_list') }}">List Attendence</a></li>
                        <li><a href="general_elements.html">Attendence Report</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-desktop"></i>Payroll<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="{{ Request::is('payroll-create') ? 'current-page' : '' }}"><a href="{{  route('payroll_create') }}">Add Payroll</a></li>
                        <li class="{{ Request::is('payroll-list') ? 'current-page' : '' }}"><a href="{{  route('payroll_list') }}">List Payroll</a></li>
                        <li><a href="{{  route('payroll_create') }}">Payroll Generate</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-desktop"></i>Allowance<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="{{ Request::is('allowance-create') ? 'current-page' : '' }}"><a href="{{  route('allowance_create') }}">Add Allowance</a></li>
                        <li class="{{ Request::is('allowance-list') ? 'current-page' : '' }}"><a href="{{  route('allowance_list') }}">List Allowance</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-desktop"></i>Deduction<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="{{ Request::is('deduction-create') ? 'current-page' : '' }}"><a href="{{  route('deduction_create') }}">Add Deduction</a></li>
                        <li class="{{ Request::is('deduction-list') ? 'current-page' : '' }}"><a href="{{  route('deduction_list') }}">List Deduction</a></li>
                    </ul>
                  </li>


                  <li><a><i class="fa fa-desktop"></i>Office Loan<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="general_elements.html">Add Loan</a></li>
                        <li><a href="general_elements.html">All Loan</a></li>
                    </ul>
                  </li>
                </ul>
            </li>

            <li><a><i class="fa fa-table"></i> Bank <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="tables_dynamic.html">Bank Transection</a></li>
                <li><a href="tables_dynamic.html">Bank Ledger</a></li>
                <li><a href="tables_dynamic.html">Add Bank</a></li>
              </ul>
            </li>

            <li><a><i class="fa fa-clone"></i>Quatation <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="fixed_sidebar.html">Add Quatation</a></li>
                <li><a href="fixed_footer.html">Quatation Lists</a></li>
              </ul>
            </li>

            <li><a><i class="fa fa-clone"></i>Returns <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Product Sales Return</a></li>
                  <li><a href="fixed_sidebar.html">Sells Returns</a></li>
                  <li><a href="fixed_footer.html">Purches Returns</a></li>
                </ul>
              </li>
          </ul>
        </div>
        <div class="menu_section">
          <h3>Live On</h3>
          <ul class="nav side-menu">
            <li><a><i class="fa fa-bug"></i> Settings <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li class="{{ Request::is('branch') ? 'current-page' : '' }}"><a href="{{ route('branch') }}">Branch</a></li>
                <li class="{{ Request::is('shift') ? 'current-page' : '' }}"><a href="{{ route('shift') }}">Shift</a></li>
                <li class="{{ Request::is('currency') ? 'current-page' : '' }}"><a href="{{ route('currency') }}">Currency</a></li>
                <li class="{{ Request::is('tax') ? 'current-page' : '' }}"><a href="{{ route('tax') }}">Tax</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="page_403.html">403 Error</a></li>
                <li><a href="page_404.html">404 Error</a></li>
                <li><a href="page_500.html">500 Error</a></li>
                <li><a href="plain_page.html">Plain Page</a></li>
                <li><a href="login.html">Login Page</a></li>
                <li><a href="pricing_tables.html">Pricing Tables</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                  <li><a href="#level1_1">Level One</a>
                  <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="sub_menu"><a href="level2.html">Level Two</a>
                      </li>
                      <li><a href="#level2_1">Level Two</a>
                      </li>
                      <li><a href="#level2_2">Level Two</a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="#level1_2">Level One</a>
                  </li>
              </ul>
            </li>
            <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
          </ul>
        </div>

      </div>
      <!-- /sidebar menu -->

      <!-- /menu footer buttons -->
      <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </div>
      <!-- /menu footer buttons -->
    </div>
  </div>
