<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';

    protected $fillable = [
        'degree',
        'institution',
        'image_url',
        'start_year',
        'end_year',
        'description',
        'status',
    ];

    protected $casts = [
        'start_year' => 'integer',
        'end_year' => 'integer',
        'status' => 'string',
    ];
}
