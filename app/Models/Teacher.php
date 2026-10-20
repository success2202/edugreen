<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'gender',
        'subject',
        'academic_level',
        'qualification',
        'bio',
        'image',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
