<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolFeesPayment extends Model
{
    use HasFactory;
       protected $table = 'school_fee_payments';
       
     protected $fillable = [
        'student_id',
        'session',
        'term',
        'amount',
        'status',
        'payment_date',
        'payment_reference',
        'notes',
        'recorded_by',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'payment_date' => 'date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
