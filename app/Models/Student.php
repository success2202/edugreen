<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
     protected $fillable = [

        'first_name',
        'middle_name',
        'last_name',
        'admission_number',
        'date_of_birth',
        'gender',
        'image',

        'level',
        'class',
        'admission_date',

        'parent_name',
        'parent_phone',
        'parent_email',
        'parent_address',

        'status',
        'password',
    ];

    protected $casts = [

        'date_of_birth' => 'date',
        'admission_date' => 'date',
        'status' => 'boolean',
        'password' => 'hashed',
    ];

    public function results()
{
    return $this->hasMany(Result::class);
}


public static function generateAdmissionNumber()
{
    $year = date('Y');

    $lastStudent = self::where(
        'admission_number',
        'like',
        "ADM/AG/{$year}/%"
    )
    ->orderByDesc('id')
    ->first();

    if ($lastStudent && $lastStudent->admission_number) {

        $lastNumber = (int) substr(
            $lastStudent->admission_number,
            strrpos($lastStudent->admission_number, '/') + 1
        );

        $nextNumber = $lastNumber + 1;

    } else {

        $nextNumber = 1;
    }

    return 'ADM/AG/' . $year . '/' . str_pad(
        $nextNumber,
        3,
        '0',
        STR_PAD_LEFT
    );
}
}
