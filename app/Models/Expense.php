<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'expenses';
    protected $fillable = ['expense_type_id','date','time','amount','expense_reason'];
    /**
     * Get the expenseType that owns the Expense
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function expenseType()
    {
        return $this->belongsTo(ExpenseType::class, 'expense_type_id');
    }
}
