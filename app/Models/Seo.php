<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seo extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'page_name',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_author',
        'canonical_url',
        'robots_directives',
        'og_title',
        'og_description',
        'og_image',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'structured_data_json',
    ];

    protected $casts = [
        'structured_data_json' => 'array',
    ];
}
