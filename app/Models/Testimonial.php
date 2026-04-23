<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'client_email',
        'company_name',
        'client_role',
        'client_photo',
        'rating',
        'message',
        'is_approved',
        'approved_at',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
        'approved_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::saving(function (Testimonial $testimonial): void {
            if ($testimonial->is_approved && empty($testimonial->approved_at)) {
                $testimonial->approved_at = now();
            }

            if (! $testimonial->is_approved) {
                $testimonial->approved_at = null;
            }
        });
    }
}
