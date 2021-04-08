<div class="col-md-3 left_col menu_fixed" style="background: #2A3F54;">
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
                <li><a href="">Dashboard</a></li>
              </ul>
            </li>

            <li><a><i class="fa fa-balance-scale"></i> Sale <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="#">Sale List</a></li>
                  <li><a href="#">Add Sale</a></li>
                </ul>
              </li>

            <li><a><i class="fa fa-users"></i> Customer <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="#">Customer list</a></li>
                  <li><a href="#">Customer Group</a></li>
                  <li><a href="#">Credit Customer</a></li>
                  <li><a href="#">Paid Customer</a></li>
                  <li><a href="#">Customer Ledger</a></li>
                </ul>
              </li>

              <li><a><i class="fa fa-user"></i> Supplier <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="form.html">Supplier List</a></li>
                  <li><a href="form_advanced.html">Supplier Groups</a></li>
                  <li><a href="form_advanced.html">Supplier Ledger</a></li>
                </ul>
              </li>

              <li><a><i class="fa fa-cubes"></i> Products <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="#">Products list</a></li>
                  <li><a href="#">Products Barcode</a></li>
                  <li><a href="#">Product Quatation</a></li>
                  <li><a href="#">Product Vairations</a></li>
                  <li><a href="#">Category Lists</a></li>
                  <li><a href="#">Add Category</a></li>
                  <li><a href="#">Add Brands</a></li>
                  <li><a href="#">Brands Lists</a></li>
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
                <li><a href="general_elements.html">Account List</a></li>
                <li><a href="media_gallery.html">Account Types</a></li>
              </ul>
            </li>

            <li><a><i class="fa fa-users"></i>Human Resource<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a><i class="fa fa-desktop"></i>HRM<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="general_elements.html">Add Designation</a>
                        <li><a href="general_elements.html">All Designation</a>
                        <li><a href="general_elements.html">Add Employee</a>
                        <li><a href="general_elements.html">All Employee</a>
                            <li><a href="general_elements.html">All Holyday</a>
                            <li><a href="general_elements.html">All Leaves</a>
                                <li><a href="general_elements.html">Leaves Types</a>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-desktop"></i>Department<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="general_elements.html">Add Department</a>
                        <li><a href="general_elements.html">All Department</a>
                            <li><a href="general_elements.html">All Divisions</a>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-desktop"></i>Attendence<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="general_elements.html">Add Attendence</a>
                        <li><a href="general_elements.html">All Attendence</a>
                        <li><a href="general_elements.html">Attendence Report</a>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-desktop"></i>Payroll<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="general_elements.html">Add Salary</a>
                        <li><a href="general_elements.html">All Salarty</a>
                        <li><a href="general_elements.html">Salary Generate</a>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-desktop"></i>Expense<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="general_elements.html">Add Expense</a>
                        <li><a href="general_elements.html">All Expense</a>
                            <li><a href="general_elements.html">Expense Types</a>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-desktop"></i>Office Loan<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="general_elements.html">Add Loan</a>
                        <li><a href="general_elements.html">All Loan</a>
                    </ul>
                  </li>
                </ul>
              </li>

            <li><a><i class="fa fa-table"></i> Bank <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="tables.html">Branch List</a></li>
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
            <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="e_commerce.html">E-commerce</a></li>
                <li><a href="projects.html">Projects</a></li>
                <li><a href="project_detail.html">Project Detail</a></li>
                <li><a href="contacts.html">Contacts</a></li>
                <li><a href="profile.html">Profile</a></li>
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
