<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    protected $table = 'variations';
    protected $fillable = ['name'];

    /**
     * Get all of the variationValues for the Variation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function variationValues()
    {
        return $this->hasMany(VariationValue::class);
    }


    /**
     * The products that belong to the Variation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_variations', 'variation_id', 'product_id')->withTimestamps();
    }
}
