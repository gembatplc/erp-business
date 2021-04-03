<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleReturn extends Model
{
    use HasFactory;

    protected $table = 'sale_returns';
    protected $fillable = ['branch_id','customer_id','employee_id','date','reference_no','invoice_no','sales_return_status','payment_status','sub_total_amount','total_amount','paid_amount','due_amount','previous_paid_amount','previous_due_amount','discount_type','discount','tax_type','tax','shipping_cost','note'];

    /**
     * Get the branch that owns the SaleReturn
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }


    /**
     * Get the customer that owns the SaleReturn
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }


    /**
     * Get the employee that owns the SaleReturn
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }


    /**
     * The products that belong to the SaleReturn
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_sale_returns', 'sale_return_id', 'product_id');
    }
}
