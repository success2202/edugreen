<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
     protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'date_of_birth',
        'gender',
        'level',
        'class',
        'previous_school',
        'student_photo',
        'parent_name',
        'parent_phone',
        'parent_email',
        'relationship',
        'parent_address',
        'session',
        'referral_source',
        'message',
        'status',
        'admission_number',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];
}
