<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberPackage extends Model
{
    use HasFactory;
    protected $fillable = [
        'package_id',
        'member_id',
    ];
}
