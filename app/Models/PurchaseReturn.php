<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseReturn extends Model
{
    use HasFactory;

    protected $table = 'purchase_returns';
    protected $fillable = ['branch_id','supplier_id','employee_id','date','reference_no','invoice_no','purchase_return_status','payment_status','sub_total_amount','total_amount','paid_amount','due_amount','note'];
    /**
     * Get the branch that owns the PurchaseReturn
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    /**
     * Get the supplier that owns the PurchaseReturn
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }


    /**
     * Get the employee that owns the PurchaseReturn
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }


    /**
     * The products that belong to the PurchaseReturn
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_purchase_returns', 'purcahse_return_id', 'product_id');
    }
}
