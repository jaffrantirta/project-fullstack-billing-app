<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentMethodCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'payment_type'
    ];
    public function payment_methods(): HasMany
    {
        return $this->hasMany(PaymentMethod::class);
    }
}
