<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationValue extends Model
{
    use HasFactory;

    protected $table = 'variation_values';
    protected $fillable = ['variation_id','name'];

    /**
     * Get the variation te VariationValue
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function variation()
    {
        return $this->belongsTo(Variation::class, 'variation_id');
    }
}
