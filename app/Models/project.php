<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    protected $table = 'projects';
     use SoftDeletes, HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'project_url',
        'project_start_date',
        'completion_date',
        'status',
    ];

    protected $casts = [
        'project_start_date' => 'date',
        'completion_date' => 'date',
        'status' => 'string',
    ];


}
