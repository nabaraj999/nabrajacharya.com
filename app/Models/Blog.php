<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'focus_keyword',
        'excerpt',
        'content',
        'featured_image',
        'comment_count',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'faqs',
        'published_at',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'comment_count' => 'integer',
        'faqs' => 'array',
        'is_active' => 'boolean',
    ];

    protected $appends = [
        'reading_time',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->where('is_active', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function comments(): HasMany
    {
        return $this->hasMany(BlogComment::class)->latest();
    }

    public function approvedComments(): HasMany
    {
        return $this->hasMany(BlogComment::class)
            ->approved()
            ->latest();
    }

    public function getReadingTimeAttribute(): int
    {
        $wordCount = str_word_count(strip_tags($this->content ?? ''));

        return max(1, (int) ceil($wordCount / 200));
    }

    public function getMetaTitleTextAttribute(): string
    {
        return $this->meta_title ?: $this->title . ' | TechNabu Blog';
    }

    public function getMetaDescriptionTextAttribute(): string
    {
        return $this->meta_description ?: Str::limit($this->excerpt ?: strip_tags($this->content), 155);
    }

    public function getFaqItemsAttribute(): Collection
    {
        return collect($this->faqs ?? [])
            ->filter(fn ($faq) => filled($faq['question'] ?? null) && filled($faq['answer'] ?? null))
            ->values();
    }

    public function getHasFaqsAttribute(): bool
    {
        return $this->faq_items->isNotEmpty();
    }
}
