<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_name',
        'school_address',
        'phone',
        'email',
        'logo',
        'favicon',
        'session',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'current_term',
    ];
}
