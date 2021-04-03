<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    use HasFactory;

    protected $table = 'leave_types';
    protected $fillable = ['name','description','max_leave_count','leave_count_interval'];

    /**
     * Get all of the leaves for the LeaveType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }
}
