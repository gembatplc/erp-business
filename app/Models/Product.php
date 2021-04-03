<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['brand_id','category_id','unit_id','warranty_id','name','sku','purchase_quantity','stock_quantity','purchase_price','stock_price','image','status','description'];

    /**
     * The variations that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function variations()
    {
        return $this->belongsToMany(Variation::class, 'product_variations', 'product_id', 'variation_id')->withTimestamps();
    }


    /**
     * Get the unit that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }


    /**
     * Get the brand that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }


    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Get the warranty that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function warranty()
    {
        return $this->belongsTo(Warranty::class, 'warranty_id');
    }


    /**
     * The purchases that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function purchases()
    {
        return $this->belongsToMany(Purchase::class, 'product_purchases', 'product_id', 'purchase_id');
    }


    /**
     * The sales that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'product_sales', 'product_id', 'sale_id');
    }


    /**
     * The purchaseReturns that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function purchaseReturns()
    {
        return $this->belongsToMany(PurchaseReturn::class, 'product_purchase_returns', 'product_id', 'purchase_return_id');
    }

    /**
     * The saleReturns that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function saleReturns()
    {
        return $this->belongsToMany(SaleReturn::class, 'product_sale_returns', 'product_id', 'sale_return_id');
    }


    /**
     * The quotations that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function quotations()
    {
        return $this->belongsToMany(Quotation::class, 'product_quotations', 'product_id', 'quotation_id')->withTimestamps();
    }
}
