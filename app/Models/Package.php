<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'fee',
        'frequency',
        'billing_day',
        'provider_id'
    ];
    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Member::class, 'member_packages');
    }
    public function dues(): HasMany
    {
        return $this->hasMany(Due::class);
    }
    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }
}
