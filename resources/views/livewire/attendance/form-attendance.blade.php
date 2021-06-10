<div>
    <div class="x_panel shadow-sm border-0">
        <div class="x_title">
            <h2>Add Attendance</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li class="text-dark">
                {{-- <button type="button"   class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button> --}}
                  <a class="close" data-dismiss="modal"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="card-body">

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

              <input type="date"  class="form-control"/>
            

              <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Check In</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Check Out</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Both</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3>Departments</h3>
                  <!-- start accordion -->
                  <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel">
                      <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h4 class="panel-title mb-0">Accounts</h4>
                      </a>
                      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body pl-3">
                           <div class="row">
                               <div class="col-md-3"><span class="font-weight-bold text-dark">Employee</span></div>
                               <div class="col-md-3"><span class="font-weight-bold text-dark">Designation</span></div>
                               <div class="col-md-3"><span class="font-weight-bold text-dark">In time</span></div>
                               <div class="col-md-3"><span class="font-weight-bold text-dark">Remark</span></div>
                           </div>
                           <hr>
                           <div class="row">
                               <div class="col-md-3">Gem</div>
                               <div class="col-md-3">web developer</div>
                               <div class="col-md-3"><input type="time" /></div>
                               <div class="col-md-3"><input type="text" /></div>
                           </div>
                           <hr>
                           <div class="row">
                            <div class="col-md-3">Gem</div>
                            <div class="col-md-3">web developer</div>
                            <div class="col-md-3"><input type="time" /></div>
                            <div class="col-md-3"><input type="text" /></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">Gem</div>
                            <div class="col-md-3">web developer</div>
                            <div class="col-md-3"><input type="time" /></div>
                            <div class="col-md-3"><input type="text" /></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">Gem</div>
                            <div class="col-md-3">web developer</div>
                            <div class="col-md-3"><input type="time" /></div>
                            <div class="col-md-3"><input type="text" /></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">Gem</div>
                            <div class="col-md-3">web developer</div>
                            <div class="col-md-3"><input type="time" /></div>
                            <div class="col-md-3"><input type="text" /></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">Gem</div>
                            <div class="col-md-3">web developer</div>
                            <div class="col-md-3"><input type="time" /></div>
                            <div class="col-md-3"><input type="text" /></div>
                        </div>
                        <hr>
                        </div>
                      </div>
                    </div>
                    <div class="panel bg-white">
                      <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <h4 class="panel-title mb-0">It</h4>
                      </a>
                      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body pl-3">
                            <div class="row">
                                <div class="col-md-3"><span class="font-weight-bold text-dark">Employee</span></div>
                                <div class="col-md-3"><span class="font-weight-bold text-dark">Designation</span></div>
                                <div class="col-md-3"><span class="font-weight-bold text-dark">In time</span></div>
                                <div class="col-md-3"><span class="font-weight-bold text-dark">Remark</span></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">Gem</div>
                                <div class="col-md-3">web developer</div>
                                <div class="col-md-3"><input type="time" /></div>
                                <div class="col-md-3"><input type="text" /></div>
                            </div>
                            <hr>
                            <div class="row">
                             <div class="col-md-3">Gem</div>
                             <div class="col-md-3">web developer</div>
                             <div class="col-md-3"><input type="time" /></div>
                             <div class="col-md-3"><input type="text" /></div>
                         </div>
                         <hr>
                         <div class="row">
                             <div class="col-md-3">Gem</div>
                             <div class="col-md-3">web developer</div>
                             <div class="col-md-3"><input type="time" /></div>
                             <div class="col-md-3"><input type="text" /></div>
                         </div>
                         <hr>
                         <div class="row">
                             <div class="col-md-3">Gem</div>
                             <div class="col-md-3">web developer</div>
                             <div class="col-md-3"><input type="time" /></div>
                             <div class="col-md-3"><input type="text" /></div>
                         </div>
                         <hr>
                         <div class="row">
                             <div class="col-md-3">Gem</div>
                             <div class="col-md-3">web developer</div>
                             <div class="col-md-3"><input type="time" /></div>
                             <div class="col-md-3"><input type="text" /></div>
                         </div>
                         <hr>
                         <div class="row">
                             <div class="col-md-3">Gem</div>
                             <div class="col-md-3">web developer</div>
                             <div class="col-md-3"><input type="time" /></div>
                             <div class="col-md-3"><input type="text" /></div>
                         </div>
                         <hr>
                        </div>
                      </div>
                    </div>
                    <div class="panel">
                      <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <h4 class="panel-title mb-0">Projects</h4>
                      </a>
                      <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body pl-3">
                            <div class="row">
                                <div class="col-md-3"><span class="font-weight-bold text-dark">Employee</span></div>
                                <div class="col-md-3"><span class="font-weight-bold text-dark">Designation</span></div>
                                <div class="col-md-3"><span class="font-weight-bold text-dark">In time</span></div>
                                <div class="col-md-3"><span class="font-weight-bold text-dark">Remark</span></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">Gem</div>
                                <div class="col-md-3">web developer</div>
                                <div class="col-md-3"><input type="time" /></div>
                                <div class="col-md-3"><input type="text" /></div>
                            </div>
                            <hr>
                            <div class="row">
                             <div class="col-md-3">Gem</div>
                             <div class="col-md-3">web developer</div>
                             <div class="col-md-3"><input type="time" /></div>
                             <div class="col-md-3"><input type="text" /></div>
                         </div>
                         <hr>
                         <div class="row">
                             <div class="col-md-3">Gem</div>
                             <div class="col-md-3">web developer</div>
                             <div class="col-md-3"><input type="time" /></div>
                             <div class="col-md-3"><input type="text" /></div>
                         </div>
                         <hr>
                         <div class="row">
                             <div class="col-md-3">Gem</div>
                             <div class="col-md-3">web developer</div>
                             <div class="col-md-3"><input type="time" /></div>
                             <div class="col-md-3"><input type="text" /></div>
                         </div>
                         <hr>
                         <div class="row">
                             <div class="col-md-3">Gem</div>
                             <div class="col-md-3">web developer</div>
                             <div class="col-md-3"><input type="time" /></div>
                             <div class="col-md-3"><input type="text" /></div>
                         </div>
                         <hr>
                         <div class="row">
                             <div class="col-md-3">Gem</div>
                             <div class="col-md-3">web developer</div>
                             <div class="col-md-3"><input type="time" /></div>
                             <div class="col-md-3"><input type="text" /></div>
                         </div>
                         <hr>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end of accordion -->
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h3>Departments</h3>
                    <!-- start accordion -->
                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel">
                        <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <h4 class="panel-title mb-0">Accounts</h4>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body pl-3">
                             <div class="row">
                                 <div class="col-md-3"><span class="font-weight-bold text-dark">Employee</span></div>
                                 <div class="col-md-3"><span class="font-weight-bold text-dark">Designation</span></div>
                                 <div class="col-md-3"><span class="font-weight-bold text-dark">Out time</span></div>
                                 <div class="col-md-3"><span class="font-weight-bold text-dark">Remark</span></div>
                             </div>
                             <hr>
                             <div class="row">
                                 <div class="col-md-3">Gem</div>
                                 <div class="col-md-3">web developer</div>
                                 <div class="col-md-3"><input type="time" /></div>
                                 <div class="col-md-3"><input type="text" /></div>
                             </div>
                             <hr>
                             <div class="row">
                              <div class="col-md-3">Gem</div>
                              <div class="col-md-3">web developer</div>
                              <div class="col-md-3"><input type="time" /></div>
                              <div class="col-md-3"><input type="text" /></div>
                          </div>
                          <hr>
                          <div class="row">
                              <div class="col-md-3">Gem</div>
                              <div class="col-md-3">web developer</div>
                              <div class="col-md-3"><input type="time" /></div>
                              <div class="col-md-3"><input type="text" /></div>
                          </div>
                          <hr>
                          <div class="row">
                              <div class="col-md-3">Gem</div>
                              <div class="col-md-3">web developer</div>
                              <div class="col-md-3"><input type="time" /></div>
                              <div class="col-md-3"><input type="text" /></div>
                          </div>
                          <hr>
                          <div class="row">
                              <div class="col-md-3">Gem</div>
                              <div class="col-md-3">web developer</div>
                              <div class="col-md-3"><input type="time" /></div>
                              <div class="col-md-3"><input type="text" /></div>
                          </div>
                          <hr>
                          <div class="row">
                              <div class="col-md-3">Gem</div>
                              <div class="col-md-3">web developer</div>
                              <div class="col-md-3"><input type="time" /></div>
                              <div class="col-md-3"><input type="text" /></div>
                          </div>
                          <hr>
                          </div>
                        </div>
                      </div>
                      <div class="panel bg-white">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <h4 class="panel-title mb-0">It</h4>
                        </a>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body pl-3">
                              <div class="row">
                                  <div class="col-md-3"><span class="font-weight-bold text-dark">Employee</span></div>
                                  <div class="col-md-3"><span class="font-weight-bold text-dark">Designation</span></div>
                                  <div class="col-md-3"><span class="font-weight-bold text-dark">Out time</span></div>
                                  <div class="col-md-3"><span class="font-weight-bold text-dark">Remark</span></div>
                              </div>
                              <hr>
                              <div class="row">
                                  <div class="col-md-3">Gem</div>
                                  <div class="col-md-3">web developer</div>
                                  <div class="col-md-3"><input type="time" /></div>
                                  <div class="col-md-3"><input type="text" /></div>
                              </div>
                              <hr>
                              <div class="row">
                               <div class="col-md-3">Gem</div>
                               <div class="col-md-3">web developer</div>
                               <div class="col-md-3"><input type="time" /></div>
                               <div class="col-md-3"><input type="text" /></div>
                           </div>
                           <hr>
                           <div class="row">
                               <div class="col-md-3">Gem</div>
                               <div class="col-md-3">web developer</div>
                               <div class="col-md-3"><input type="time" /></div>
                               <div class="col-md-3"><input type="text" /></div>
                           </div>
                           <hr>
                           <div class="row">
                               <div class="col-md-3">Gem</div>
                               <div class="col-md-3">web developer</div>
                               <div class="col-md-3"><input type="time" /></div>
                               <div class="col-md-3"><input type="text" /></div>
                           </div>
                           <hr>
                           <div class="row">
                               <div class="col-md-3">Gem</div>
                               <div class="col-md-3">web developer</div>
                               <div class="col-md-3"><input type="time" /></div>
                               <div class="col-md-3"><input type="text" /></div>
                           </div>
                           <hr>
                           <div class="row">
                               <div class="col-md-3">Gem</div>
                               <div class="col-md-3">web developer</div>
                               <div class="col-md-3"><input type="time" /></div>
                               <div class="col-md-3"><input type="text" /></div>
                           </div>
                           <hr>
                          </div>
                        </div>
                      </div>
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          <h4 class="panel-title mb-0">Projects</h4>
                        </a>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body pl-3">
                              <div class="row">
                                  <div class="col-md-3"><span class="font-weight-bold text-dark">Employee</span></div>
                                  <div class="col-md-3"><span class="font-weight-bold text-dark">Designation</span></div>
                                  <div class="col-md-3"><span class="font-weight-bold text-dark">Out time</span></div>
                                  <div class="col-md-3"><span class="font-weight-bold text-dark">Remark</span></div>
                              </div>
                              <hr>
                              <div class="row">
                                  <div class="col-md-3">Gem</div>
                                  <div class="col-md-3">web developer</div>
                                  <div class="col-md-3"><input type="time" /></div>
                                  <div class="col-md-3"><input type="text" /></div>
                              </div>
                              <hr>
                              <div class="row">
                               <div class="col-md-3">Gem</div>
                               <div class="col-md-3">web developer</div>
                               <div class="col-md-3"><input type="time" /></div>
                               <div class="col-md-3"><input type="text" /></div>
                           </div>
                           <hr>
                           <div class="row">
                               <div class="col-md-3">Gem</div>
                               <div class="col-md-3">web developer</div>
                               <div class="col-md-3"><input type="time" /></div>
                               <div class="col-md-3"><input type="text" /></div>
                           </div>
                           <hr>
                           <div class="row">
                               <div class="col-md-3">Gem</div>
                               <div class="col-md-3">web developer</div>
                               <div class="col-md-3"><input type="time" /></div>
                               <div class="col-md-3"><input type="text" /></div>
                           </div>
                           <hr>
                           <div class="row">
                               <div class="col-md-3">Gem</div>
                               <div class="col-md-3">web developer</div>
                               <div class="col-md-3"><input type="time" /></div>
                               <div class="col-md-3"><input type="text" /></div>
                           </div>
                           <hr>
                           <div class="row">
                               <div class="col-md-3">Gem</div>
                               <div class="col-md-3">web developer</div>
                               <div class="col-md-3"><input type="time" /></div>
                               <div class="col-md-3"><input type="text" /></div>
                           </div>
                           <hr>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end of accordion -->
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  <h3>Departments</h3>
                  <!-- start accordion -->
                  <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel">
                      <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h4 class="panel-title mb-0">Accounts</h4>
                      </a>
                      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body pl-3">
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
                          <hr>
                          <div class="row">
                           <div class="col-md-2">Gem</div>
                           <div class="col-md-2">web developer</div>
                           <div class="col-md-2"><input type="time" /></div>
                           <div class="col-md-2"><input type="time" /></div>
                           <div class="col-md-2"><input type="checkbox" />Present/Absent</div>
                           <div class="col-md-2"><input type="text" size="12"/></div>
                       </div>
                       <hr>
                       <div class="row">
                           <div class="col-md-2">Gem</div>
                           <div class="col-md-2">web developer</div>
                           <div class="col-md-2"><input type="time" /></div>
                           <div class="col-md-2"><input type="time" /></div>
                           <div class="col-md-2"><input type="checkbox" />Present/Absent</div>
                           <div class="col-md-2"><input type="text" size="12"/></div>
                       </div>
                       <hr>
                       <div class="row">
                           <div class="col-md-2">Gem</div>
                           <div class="col-md-2">web developer</div>
                           <div class="col-md-2"><input type="time" /></div>
                           <div class="col-md-2"><input type="time" /></div>
                           <div class="col-md-2"><input type="checkbox" />Present/Absent</div>
                           <div class="col-md-2"><input type="text" size="12"/></div>
                       </div>
                       <hr>
                       <div class="row">
                           <div class="col-md-2">Gem</div>
                           <div class="col-md-2">web developer</div>
                           <div class="col-md-2"><input type="time" /></div>
                           <div class="col-md-2"><input type="time" /></div>
                           <div class="col-md-2"><input type="checkbox" />Present/Absent</div>
                           <div class="col-md-2"><input type="text" size="12"/></div>
                       </div>
                       <hr>
                       <div class="row">
                           <div class="col-md-2">Gem</div>
                           <div class="col-md-2">web developer</div>
                           <div class="col-md-2"><input type="time" /></div>
                           <div class="col-md-2"><input type="time" /></div>
                           <div class="col-md-2"><input type="checkbox" />Present/Absent</div>
                           <div class="col-md-2"><input type="text" size="12"/></div>
                       </div>
                       <hr>
                      </div>
                      </div>
                    </div>
                    <div class="panel bg-white">
                      <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <h4 class="panel-title mb-0">It</h4>
                      </a>
                      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body pl-3">
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
                            <hr>
                            <div class="row">
                             <div class="col-md-2">Gem</div>
                             <div class="col-md-2">web developer</div>
                             <div class="col-md-2"><input type="time" /></div>
                             <div class="col-md-2"><input type="time" /></div>
                             <div class="col-md-2"><input type="checkbox" />Present/Absent</div>
                             <div class="col-md-2"><input type="text" size="12"/></div>
                         </div>
                         <hr>
                         <div class="row">
                             <div class="col-md-2">Gem</div>
                             <div class="col-md-2">web developer</div>
                             <div class="col-md-2"><input type="time" /></div>
                             <div class="col-md-2"><input type="time" /></div>
                             <div class="col-md-2"><input type="checkbox" />Present/Absent</div>
                             <div class="col-md-2"><input type="text" size="12"/></div>
                         </div>
                         <hr>
                         <div class="row">
                             <div class="col-md-2">Gem</div>
                             <div class="col-md-2">web developer</div>
                             <div class="col-md-2"><input type="time" /></div>
                             <div class="col-md-2"><input type="time" /></div>
                             <div class="col-md-2"><input type="checkbox" />Present/Absent</div>
                             <div class="col-md-2"><input type="text" size="12"/></div>
                         </div>
                         <hr>
                         <div class="row">
                             <div class="col-md-2">Gem</div>
                             <div class="col-md-2">web developer</div>
                             <div class="col-md-2"><input type="time" /></div>
                             <div class="col-md-2"><input type="time" /></div>
                             <div class="col-md-2"><input type="checkbox" />Present/Absent</div>
                             <div class="col-md-2"><input type="text" size="12"/></div>
                         </div>
                         <hr>
                         <div class="row">
                             <div class="col-md-2">Gem</div>
                             <div class="col-md-2">web developer</div>
                             <div class="col-md-2"><input type="time" /></div>
                             <div class="col-md-2"><input type="time" /></div>
                             <div class="col-md-2"><input type="checkbox" />Present/Absent</div>
                             <div class="col-md-2"><input type="text" size="12"/></div>
                         </div>
                         <hr>
                        </div>
                      </div>
                    </div>
                    <div class="panel">
                      <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <h4 class="panel-title mb-0">Projects</h4>
                      </a>
                      <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body pl-3">
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
                            <hr>
                            <div class="row">
                             <div class="col-md-2">Gem</div>
                             <div class="col-md-2">web developer</div>
                             <div class="col-md-2"><input type="time" /></div>
                             <div class="col-md-2"><input type="time" /></div>
                             <div class="col-md-2"><input type="checkbox" />Present/Absent</div>
                             <div class="col-md-2"><input type="text" size="12"/></div>
                         </div>
                         <hr>
                         <div class="row">
                             <div class="col-md-2">Gem</div>
                             <div class="col-md-2">web developer</div>
                             <div class="col-md-2"><input type="time" /></div>
                             <div class="col-md-2"><input type="time" /></div>
                             <div class="col-md-2"><input type="checkbox" />Present/Absent</div>
                             <div class="col-md-2"><input type="text" size="12"/></div>
                         </div>
                         <hr>
                         <div class="row">
                             <div class="col-md-2">Gem</div>
                             <div class="col-md-2">web developer</div>
                             <div class="col-md-2"><input type="time" /></div>
                             <div class="col-md-2"><input type="time" /></div>
                             <div class="col-md-2"><input type="checkbox" />Present/Absent</div>
                             <div class="col-md-2"><input type="text" size="12"/></div>
                         </div>
                         <hr>
                         <div class="row">
                             <div class="col-md-2">Gem</div>
                             <div class="col-md-2">web developer</div>
                             <div class="col-md-2"><input type="time" /></div>
                             <div class="col-md-2"><input type="time" /></div>
                             <div class="col-md-2"><input type="checkbox" />Present/Absent</div>
                             <div class="col-md-2"><input type="text" size="12"/></div>
                         </div>
                         <hr>
                         <div class="row">
                             <div class="col-md-2">Gem</div>
                             <div class="col-md-2">web developer</div>
                             <div class="col-md-2"><input type="time" /></div>
                             <div class="col-md-2"><input type="time" /></div>
                             <div class="col-md-2"><input type="checkbox" />Present/Absent</div>
                             <div class="col-md-2"><input type="text" size="12"/></div>
                         </div>
                         <hr>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end of accordion -->
                </div>
              </div>
        </div>
    </div>  
    
    <!-- leave type add item -->
    <div class="modal fade"  id="addLeaveTypeModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
            @livewire('leave.leave-type.create-leave-type')
        
        </div>
        </div>
    </div>
    <!-- /leaveType add item -->

    <!-- leave add item -->
    <div class="modal fade"  id="addEmployeeModal" tabindex="-1" role="dialog" aria-hidden="true">
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
</div>
