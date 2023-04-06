<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference_code',
        'grand_total',
        'user_id',
        'payment_method_id',
        'status'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function payment_method(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }
    public function dues(): BelongsToMany
    {
        return $this->belongsToMany(Due::class, 'transaction_details');
    }
    public function withdraws(): BelongsToMany
    {
        return $this->belongsToMany(Withdraw::class, 'withdraw_details');
    }
}
