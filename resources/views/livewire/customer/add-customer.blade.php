<div>
    @section('title')
        Add Customer
    @endsection
    @section('content')
    <div class="card">
        <div class="card-header">
            Add Customer
        </div>
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
              <label for="customer_group" class="col-sm-2 text-right col-form-label">Custmer Group Name:</label>
              <div class="col-sm-4">
                <div class="">
                <input type="text" class="form-control" name="customer_group" id="customer_group"  placeholder="Group Name" value="">
                </div>
              </div>
              <label for="email_address" class="col-sm-2 text-right col-form-label">Email:</label>
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
              <label for="previous_balance" class="col-sm-2 text-right col-form-label">Previous Due:</label>
              <div class="col-sm-4">
                <div class="">
                <input name="previous_balance" type="number" class="form-control text-right" placeholder="Previous Balance">
                </div>
              </div>
            </div>
            </form>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button"  class="btn btn-primary">Add</button>
      </div>
    @endsection
</div>
