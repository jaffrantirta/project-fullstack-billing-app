<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provider extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'user_id',
        'category_id'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }
    public function withdraws(): HasMany
    {
        return $this->hasMany(Withdraw::class);
    }
}
