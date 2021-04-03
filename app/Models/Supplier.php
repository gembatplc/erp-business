<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';
    protected $fillable = ['supplier_group_id','full_name','email','supplier_unique_id','present_address','permanent_address','previous_due','country','city','state','national_id','company_id','status','gender','date_of_birth','blood_group','citizenship','alternative_email','alternative_phone','zip_code','photo'];

    /**
     * Get the supplierGroup that owns the Supplier
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplierGroup()
    {
        return $this->belongsTo(SupplierGroup::class, 'supplier_group_id');
    }


    /**
     * Get all of the purchases for the Supplier
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    /**
     * Get all of the purchaseReturns for the Supplier
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseReturns()
    {
        return $this->hasMany(PurchaseReturn::class);
    }
}
