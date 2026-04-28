<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogComment extends Model
{
    protected $fillable = [
        'blog_id',
        'author_name',
        'author_email',
        'author_website',
        'comment',
        'is_approved',
        'admin_reply',
        'replied_at',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
        'replied_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::saved(fn (BlogComment $comment) => $comment->syncBlogCommentCount());
        static::deleted(fn (BlogComment $comment) => $comment->syncBlogCommentCount());
    }

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    public function scopeApproved(Builder $query): Builder
    {
        return $query->where('is_approved', true);
    }

    public function syncBlogCommentCount(): void
    {
        if (! $this->blog_id) {
            return;
        }

        Blog::whereKey($this->blog_id)->update([
            'comment_count' => static::query()
                ->where('blog_id', $this->blog_id)
                ->approved()
                ->count(),
        ]);
    }
}
