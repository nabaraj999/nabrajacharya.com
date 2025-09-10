<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';

    protected $fillable = [
        'personal_id',
        'skill_name',
        'proficiency',
        'category',
    ];

    protected $casts = [
        'proficiency' => 'integer',
    ];
}
