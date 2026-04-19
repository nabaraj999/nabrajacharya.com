<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'issuer',
        'issue_date',
        'expiry_date',
        'credential_id',
        'credential_url',
        'image',
        'description',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'issue_date'  => 'date',
        'expiry_date' => 'date',
        'is_active'   => 'boolean',
        'sort_order'  => 'integer',
    ];
}
