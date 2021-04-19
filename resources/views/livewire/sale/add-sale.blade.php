<div>
    @section('title')
    Add Sales
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card ">
            <div class="card-header">
                <div class="card-title">
                    <span class="float-right">
                        <a href="#" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> Manage Sale </a>
                        <a href="#" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i> POS Sale </a>
                    </span>
                    <h5>New Sale</h5>
                </div>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-6" id="">
                            <div class="form-group row">
                                <label for="customer_name" class="col-sm-3 col-form-label">Customer Name/Phone <i class="text-danger">*</i></label>
                                <div class="col-sm-6">
                                <input type="text" size="100" name="customer_name" class=" form-control" placeholder="Customer Name/Phone" id="customer_name" >
                                </div>
                                <div class=" col-sm-3">
                                <a href="#" class="client-add-btn btn btn-success" aria-hidden="true" data-toggle="modal" data-target="#cust_info"><i class="fa fa-plus m-r-2"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6" id="">
                            <div class="form-group row">
                                <label for="payment_type" class="col-sm-3 col-form-label">Payment Type <i class="text-danger">*</i></label>
                                <div class="col-sm-6">
                                    <select name="paytype" class="form-control">
                                    <option value="1">Cash Payment</option>
                                    <option value="2">Bank Payment</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <label for="date" class="col-sm-3 col-form-label">Date <i class="text-danger">*</i></label>
                                <div class="col-sm-6">
                                <input class="form-control" type="text" name="invoice_date" id="date" >
                                </div>
                            </div>
                        </div>
                       <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="invoice_no" class="col-sm-3 col-form-label">Invoice No <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                            <input class="form-control" type="text" name="invoice_no" id="invoice_no" value="1135" readonly="">
                            </div>
                        </div>
                       </div>
                    </div><br>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="normalinvoice">
                            <thead>
                                <tr>
                                    <th class="text-center">Product Name<i class="text-danger">*</i></th>
                                    <th class="text-center">Qunty<i class="text-danger">*</i></th>
                                    <th class="text-center">Price<i class="text-danger">*</i></th>
                                    <th class="text-center">Discount %</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="row_add">
                                    <div class="row">
                                        <tr>
                                            <td class="product_fields">
                                                <input type="text" required="" name="product_name"  id="product_name_1" class="form-control" placeholder="Product Name">
                                            </td>
                                            <td>
                                                <input type="text" name="product_quantity[]" required=""  class="form-control text-right" id="total_qntt" placeholder="Ex:1" min="0"  style="width: 90px">
                                            </td>
                                            <td class="invoice_fields">
                                                <input type="text" name="product_rate[]" id="price_item_1" class="form-control text-right"  placeholder="0.00" min="0">
                                            </td>
                                            <td>
                                                <input type="text" name="discount[]"  id="discount_1" class="form-control text-right" min="0" placeholder="0%" style="width: 90px">
                                            </td>
                                            <td class="invoice_fields">
                                                <input class="form-control text-right" type="text" name="total_price[]" id="total_price_1" value="0.00" readonly="readonly">
                                            </td>   
                                            <td>
                                                <a href="javascript:void(0);" id="remove_button" class="remove_button btn btn-danger"><i class="fa fa-close"></i></a>
                                            </td>
                                        </tr>
                                    </div>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" rowspan="2">
                                    <center><label for="details" class="text-center">Sale Details</label></center>
                                    <textarea name="inva_details" id="details" class="form-control" placeholder="Sale Details" tabindex="12"></textarea>
                                    </td>
                                    <td class="text-right" colspan="1"><b>Sale Discount:</b></td>
                                    <td class="text-right">
                                    <input type="text" id="invoice_discount" class="form-control text-right total_discount" name="invoice_discount" placeholder="0.00" >
                                    </td>
                                    <td><a href="javascript:void(0);" id="add_button" class="add_button btn btn-info"><i class="fa fa-plus"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="1"><b>Total Discount:</b></td>
                                    <td class="text-right">
                                    <input type="text" id="total_discount_ammount" class="form-control text-right" name="total_discount" value="0.00" readonly="readonly">
                                    </td>
                                </tr>
                                <tr class="hideableRow">
                                    <td class="text-right" colspan="4"><b>VAT</b></td>
                                    <td class="text-right">
                                    <input id="total_tax_ammount0" tabindex="-1" class="form-control text-right valid totalTax" name="total_tax0" value="0.00" readonly="readonly" aria-invalid="false" type="text">
                                    </td>
                                </tr>
                                <tr class="hideableRow">
                                    <td class="text-right" colspan="4"><b>IGT</b></td>
                                    <td class="text-right">
                                    <input id="total_tax_ammount1" tabindex="-1" class="form-control text-right valid totalTax" name="total_tax1" value="0.00" readonly="readonly" aria-invalid="false" type="text">
                                    </td>
                                </tr>
                                <tr>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="4"><b>Total Tax:</b></td>
                                    <td class="text-right">
                                    <input id="total_tax_amount" tabindex="-1" class="form-control text-right valid" name="total_tax" value="0.00" readonly="readonly" aria-invalid="false" type="text">
                                    </td>
                                    <td><button type="button" class="toggle btn-warning">
                                    <i class="fa fa-angle-double-down"></i>
                                    </button></td>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="4"><b>Shipping Cost:</b></td>
                                    <td class="text-right">
                                    <input type="text" id="shipping_cost" class="form-control text-right" name="shipping_cost" placeholder="0.00" tabindex="14">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"><b>Grand Total:</b></td>
                                    <td class="text-right">
                                    <input type="text" id="grandTotal" class="form-control text-right" name="grand_total_price" value="0.00" readonly="readonly">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"><b>Previous:</b></td>
                                    <td class="text-right">
                                    <input type="text" id="previous" class="form-control text-right" name="previous" value="0.00" readonly="readonly">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"><b>Net Total:</b></td>
                                    <td class="text-right">
                                    <input type="text" id="n_total" class="form-control text-right" name="n_total" value="0" readonly="readonly" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="4"><b>Paid Amount:</b></td>
                                    <td class="text-right">
                                    <input type="text" id="paidAmount" class="form-control text-right" name="paid_amount" placeholder="0.00" tabindex="15" value="">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="4"><b>Due:</b></td>
                                    <td class="text-right">
                                    <input type="text" id="dueAmmount" class="form-control text-right" name="due_amount" value="0.00" readonly="readonly">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                    <input type="button" id="full_paid_tab" class="btn btn-warning" value="Full Paid" >
                                    <input type="submit" id="add_invoice" class="btn btn-success" name="add-invoice" value="Submit" >
                                    </td>
                                    <td colspan="3" class="text-right"><b>Change:</b></td>
                                    <td class="text-right">
                                    <input type="text" id="change" class="form-control text-right" name="change" value="0" readonly="readonly" placeholder="">
                                    <input type="hidden" name="is_normal" value="1">
                                    </td>
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('footer.js')
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.row_add'); //Input field wrapper
        var fieldHTML = '<tr><td class="product_fields"><input type="text" required="" name="product_name"  id="product_name_1" class="form-control" placeholder="Product Name"></td><td><input type="text" name="product_quantity[]" required=""  class="form-control text-right" id="total_qntt" placeholder="Ex:1" min="0"  style="width: 90px"></td><td class="invoice_fields"><input type="text" name="product_rate[]" id="price_item_1" class="form-control text-right"  placeholder="0.00" min="0"></td><td><input type="text" name="discount[]"  id="discount_1" class="form-control text-right" min="0" placeholder="0%" style="width: 90px"></td><td class="invoice_fields"><input class="form-control text-right" type="text" name="total_price[]" id="total_price_1" value="0.00" readonly="readonly"></td><td><a href="javascript:void(0);" class="remove_button btn btn-danger"><i class="fa fa-close"></i></a></td></tr>';
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>
@endsection
</div>
