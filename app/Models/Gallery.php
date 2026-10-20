<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'description',
        'media',
        'media_type',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
