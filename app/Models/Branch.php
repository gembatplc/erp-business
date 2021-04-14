<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branches';

    protected $fillable = ['name','description','location'];


    /**
     * Get all of the shift for the Branch
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }

    /**
     * Get all of the holidays for the Branch
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function holidays()
    {
        return $this->hasMany(Holiday::class);
    }


    /**
     * Get all of the purchases for the Branch
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }


    /**
     * Get all of the sales for the Branch
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    /**
     * Get all of the purchaseReturns for the Branch
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseReturns()
    {
        return $this->hasMany(PurchaseReturn::class);
    }


    /**
     * Get all of the saleReturns for the Branch
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function saleReturns()
    {
        return $this->hasMany(SaleReturn::class);
    }


    /**
     * Get all of the quotations for the Branch
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }
}
