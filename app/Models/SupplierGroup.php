<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierGroup extends Model
{
    use HasFactory;

    protected $table = 'supplier_groups';
    protected $fillable = ['name','description'];


    /**
     * Get all of the suppliers for the SupplierGroup
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }
}
