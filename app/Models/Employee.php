<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = ['division_id','position_id','shift_id','full_name','email','phone','present_address','join_date','duty_type','salary_type','status','employee_unique_id'];
    /**
     * Get the position that owns the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }


    /**
     * Get the division that owns the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }


    /**
     * Get all of the leaves for the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }


    /**
     * Get all of the leaveReferences for the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function leaveReferences()
    {
        return $this->hasMany(Leave::class);
    }

    /**
     * Get all of the leaveApproveds for the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function leaveApproveds()
    {
        return $this->hasMany(Leave::class);
    }


    /**
     * Get all of the attendances for the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }


    /**
     * Get all of the purchases for the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }


    /**
     * Get all of the sales for the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }


    /**
     * Get all of the purchaseReturns for the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseReturns()
    {
        return $this->hasMany(PurchaseReturn::class);
    }

    /**
     * Get all of the saleReturns for the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function saleReturns()
    {
        return $this->hasMany(SaleReturn::class);
    }


    /**
     * Get all of the quotations for the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }
}
