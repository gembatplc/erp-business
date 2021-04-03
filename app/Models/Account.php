<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';
    protected $fillable = ['account_type_id','name','account_number','initial_balance','balance','status'];

    /**
     * Get the accountType that owns the Account
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function accountType()
    {
        return $this->belongsTo(AccountType::class,'account_type_id');
    }
}
