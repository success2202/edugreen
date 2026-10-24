<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipApplication extends Model
{
  
    use HasFactory;

    protected $fillable = [
        'application_number',
        'scholarship_programme',
        'first_name',
        'middle_name',
        'last_name',
        'date_of_birth',
        'gender',
        'current_school',
        'current_class',
        'parent_guardian_name',
        'relationship',
        'parent_guardian_phone',
        'parent_guardian_email',
        'parent_guardian_address',
        'reason_for_applying',
        'academic_result',
        'birth_certificate',
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

}
