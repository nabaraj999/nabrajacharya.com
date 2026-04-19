<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'personals';

    protected $fillable = [
        'brand_name',
        'logo_url',
        'facebook_url',
        'instagram_url',
        'github_url',
        'linkedin_url',
        'email',
        'phone_number',
        'location',
        'description',
        'about_me',
        'profile_photo',
        'about_description',
        'about_photo',
        'years_experience',
        'completed_projects',
        'happy_clients',
        'current_company',
        'current_company_url',
        'current_role',
        'current_role_start',
    ];
}

