<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'withdraw_id',
        'transaction_id',
    ];
}
