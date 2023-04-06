<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Withdraw extends Model
{
    use HasFactory;
    protected $fillable = [
        'provider_id',
        'status',
        'grand_total',
    ];
    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }
    public function transactions(): BelongsToMany
    {
        return $this->belongsToMany(Transaction::class, 'withdraw_details');
    }
}
