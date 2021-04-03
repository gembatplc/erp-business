<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $fillable = ['customer_group_id','full_name','email','phone','customer_unique_id','present_address','permanent_address','previous_due','country','city','state','national_id','company_name','status','gender','date_of_birth','marital_status','blood_group','citizenship','alternative_email','alternative_phone','zip_code','photo'];
    /**
     * Get the customerGroup that owns the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customerGroup()
    {
        return $this->belongsTo(CustomerGroup::class, 'customer_group_id');
    }


    /**
     * Get all of the sales for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    /**
     * Get all of the saleReturns for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function saleReturns()
    {
        return $this->hasMany(SaleReturn::class);
    }


    /**
     * Get all of the quotations for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }
}
