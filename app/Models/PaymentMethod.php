<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentMethod extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'logo',
        'payment_method_category_id'
    ];
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
    public function payement_method_category(): BelongsTo
    {
        return $this->belongsTo(PaymentMethodCategory::class);
    }
}
