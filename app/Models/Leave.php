<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $table = 'leaves';
    protected $fillable = ['employee_id','leave_type_id','start_date','end_date','leave_reason','reference_by','status','application_date','approved_by','attach_file'];
    /**
     * Get the employee that owns the Leave
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    /**
     * Get the leaveType that owns the Leave
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class, 'leave_type_id');
    }

    /**
     * Get the referenceBy that owns the Leave
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function referenceBy()
    {
        return $this->belongsTo(Employee::class, 'reference_by');
    }


    /**
     * Get the approvedBy that owns the Leave
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function approvedBy()
    {
        return $this->belongsTo(Employee::class, 'approved_by');
    }
}
