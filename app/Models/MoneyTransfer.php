<?php

namespace App\Models;

use App\Models\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MoneyTransfer extends Model
{
    use HasFactory;

    protected $table = 'money_transfers';
    protected $fillable = ['from_account_id','to_account_id','date','amount','status','reference'];

    /**
     * Get the fromAccount that owns the MoneyTransfer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fromAccount()
    {
        return $this->belongsTo(Account::class, 'from_account_id');
    }

    public function toAccount()
    {
        return $this->belongsTo(Account::class, 'to_account_id');
    }
}
