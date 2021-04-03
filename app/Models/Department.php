<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';
    protected $fillable = ['name','description'];
    /**
     * Get all of the divisions for the Department
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function divisions()
    {
        return $this->hasMany(Division::class);
    }

    /**
     * Get all of the holidays for the Department
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function holidays()
    {
        return $this->hasMany(Holiday::class);
    }
}
