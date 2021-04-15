<div>
    @section('title')
        Add Employee
    @endsection

    @section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Employee</h4>
        </div>
        <div class="card-body">
          <form>
              <div class="form-row pb-3">
                  <div class="form-group col-md-12">
                    <label for="fname">Full Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="fname" placeholder="Enter Full Name">
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
              <div class="form-row pb-3">
                  <div class="form-group col-md-4">
                    <label for="depertment">Depertment<span class="text-danger">*</span></label>
                    <select class="form-control" name="depertment" id="depertment">
                      <option value="">Select one</option>
                      <option value="">IT Depertment</option>
                      <option value="">Projecj</option>
                      <option value="">Account</option>
                  </select>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="shift">Shift<span class="text-danger">*</span></label>
                      <select class="form-control" name="depertment" id="depertment">
                        <option value="">Select one</option>
                        <option value="">Night</option>
                        <option value="">Day</option>
                        <option value="">Day-Night</option>
                    </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="designation">Designation<span class="text-danger">*</span></label>
                      <select class="form-control" name="designation" id="designation">
                        <option value="">Select one</option>
                        <option value="">Web Developer</option>
                        <option value="">Content-Writer</option>
                        <option value="">Digital-Merkater</option>
                    </select>
                    </div>
              </div>
              <div class="form-group pb-3">
                <label for="inputAddress">Present Address<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="inputAddress" placeholder="nikinj-2,khilkhet,dhaka">
              </div>
              <div class="form-row pb-3">
                  <div class="form-group col-md-6">
                    <label for="join">Join Date<span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="join" id="join">
                  </div>
                  <div class="form-group col-md-6">
                      <label for="dutytype">Duty Type<span class="text-danger">*</span></label>
                      <select class="form-control" name="duty_type" id="duty_type">
                        <option value="">Select one</option>
                        <option value="">hourly</option>
                        <option value="">Day</option>
                        <option value="">Contact</option>
                    </select>
                    </div>                              
              </div>
              <div class="form-row pb-3">
                <div class="form-group col-md-6">
                  <label for="salarytype">Salary Type<span class="text-danger">*</span></label>
                  <select class="form-control" name="salary_type" id="salary_type">
                    <option value="">Select one</option>
                    <option value="">Hourly</option>
                    <option value="">Contactly</option>
                    <option value="">Permanently</option>
                </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="salarytype">Salary<span class="text-danger">*</span></label>
                  <input type="number" class="form-control" value="" name="salary" placeholder="Ex:10000">
                </div>
              </div>
              <div class="form-group pb-3">
                <label for="profile">Profile Picture<span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="profile" name="profile">
              </div>
            </form>
        </div>
        <div class="card-footer text-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button"  class="btn btn-primary">Add</button>
        </div>
    </div>
    @endsection
</div>
