<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'provider_id',
        'account_number',
    ];
    public function dues(): HasMany
    {
        return $this->hasMany(Due::class);
    }
    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(Package::class, 'member_packages');
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_members');
    }
}
