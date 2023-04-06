<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Due extends Model
{
    use HasFactory;
    protected $fillable = [
        'member_id',
        'package_id',
        'month',
        'year',
        'amount',
        'status',
    ];
    public function transactions(): BelongsToMany
    {
        return $this->belongsToMany(Transaction::class, 'transaction_details');
    }
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }
}
