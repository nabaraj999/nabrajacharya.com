@extends('layouts.app')

@section('title', $blog->meta_title_text)
@section('description', $blog->meta_description_text)
@section('keywords', $blog->meta_keywords ?: ($blog->focus_keyword ?: ($seo->meta_keywords ?? 'laravel blog, seo insights, web development article')))
@section('canonical', route('blog.show', $blog->slug))
@section('og_title', $blog->meta_title_text)
@section('og_description', $blog->meta_description_text)
@section('twitter_title', $blog->meta_title_text)
@section('twitter_description', $blog->meta_description_text)
@section('og_type', 'article')
@section('og_image', $blog->featured_image ? asset('storage/'.$blog->featured_image) : ($personal && $personal->logo_url ? url(Storage::url($personal->logo_url)) : ''))
@section('twitter_image', $blog->featured_image ? asset('storage/'.$blog->featured_image) : ($personal && $personal->logo_url ? url(Storage::url($personal->logo_url)) : ''))
@section('og_image_alt', $blog->title)
@section('og_meta')
    <meta property="article:published_time" content="{{ optional($blog->published_at)->toAtomString() }}">
    <meta property="article:modified_time" content="{{ optional($blog->updated_at)->toAtomString() }}">
    <meta property="article:author" content="{{ $personal->brand_name ?? 'Nabaraj Acharya' }}">
    <meta property="article:section" content="Blog">
    @if($blog->focus_keyword)
    <meta property="article:tag" content="{{ $blog->focus_keyword }}">
    <meta name="news_keywords" content="{{ $blog->focus_keyword }}">
    @endif
@endsection

@section('schema')
@php
    $articleSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BlogPosting',
        'headline' => $blog->title,
        'description' => $blog->meta_description_text,
        'datePublished' => optional($blog->published_at)->toAtomString(),
        'dateModified' => optional($blog->updated_at)->toAtomString(),
        'author' => [
            '@type' => 'Person',
            'name' => $personal->brand_name ?? 'Nabaraj Acharya',
        ],
        'mainEntityOfPage' => route('blog.show', $blog->slug),
        'image' => $blog->featured_image ? asset('storage/'.$blog->featured_image) : null,
        'wordCount' => str_word_count(strip_tags($blog->content ?? '')),
        'timeRequired' => 'PT' . $blog->reading_time . 'M',
        'commentCount' => $blog->comment_count,
        'keywords' => array_values(array_filter([$blog->focus_keyword, $blog->meta_keywords])),
    ];

    $faqSchema = $blog->hasFaqs ? [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $blog->faq_items->map(fn ($faq) => [
            '@type' => 'Question',
            'name' => $faq['question'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['answer'],
            ],
        ])->all(),
    ] : null;

    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'Home',
                'item' => route('home'),
            ],
            [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => 'Blog',
                'item' => route('blog.index'),
            ],
            [
                '@type' => 'ListItem',
                'position' => 3,
                'name' => $blog->title,
                'item' => route('blog.show', $blog->slug),
            ],
        ],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($articleSchema) !!}</script>
@if($faqSchema)
<script type="application/ld+json">{!! json_encode($faqSchema) !!}</script>
@endif
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')
<section class="page-hero pt-24 pb-10 md:pt-32 md:pb-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <div class="section-tag">Article</div>
        <h1 class="font-display text-3xl md:text-5xl font-bold mt-2 mb-4 leading-tight">{{ $blog->title }}</h1>
        <div class="mt-5 flex flex-wrap items-center justify-center gap-3 text-sm text-slate-300">
            <span class="rounded-full border border-slate-700 bg-slate-900/70 px-4 py-2">Published {{ $blog->published_at ? $blog->published_at->format('F d, Y') : 'recently' }}</span>
            <span class="rounded-full border border-slate-700 bg-slate-900/70 px-4 py-2">{{ $blog->reading_time }} min read</span>
            <span class="rounded-full border border-slate-700 bg-slate-900/70 px-4 py-2">{{ number_format($blog->comment_count) }} comments</span>
            @if($blog->focus_keyword)
            <span class="rounded-full border border-indigo-500/30 bg-indigo-500/15 px-4 py-2 text-indigo-200">{{ $blog->focus_keyword }}</span>
            @endif
        </div>
    </div>
</section>

<section class="py-6 md:py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        @if($blog->featured_image)
        <div class="mb-8 rounded-2xl overflow-hidden border border-slate-800">
            <img src="{{ asset('storage/'.$blog->featured_image) }}" alt="{{ $blog->title }}" class="w-full h-auto object-cover">
        </div>
        @endif

        <article class="rounded-2xl border border-slate-800 bg-surface p-6 md:p-10">
            @if($blog->excerpt)
            <p class="text-slate-300 text-lg leading-relaxed mb-8 border-l-2 border-indigo-500 pl-4">{{ $blog->excerpt }}</p>
            @endif

            <div class="blog-editor-content max-w-none">
                {!! $blog->content !!}
            </div>
        </article>

        @if($blog->hasFaqs)
        <section class="mt-10 rounded-2xl border border-slate-800 bg-slate-900/40 p-6 md:p-8">
            <div class="flex items-start justify-between gap-4 mb-6">
                <div>
                    <p class="text-xs uppercase tracking-[0.22em] text-indigo-300">FAQ</p>
                    <h2 class="mt-2 font-display text-2xl font-bold text-white">Frequently Asked Questions</h2>
                </div>
                <div class="hidden md:block text-sm text-slate-500">{{ $blog->faq_items->count() }} answers</div>
            </div>

            <div class="space-y-4">
                @foreach($blog->faq_items as $faq)
                <details class="group rounded-2xl border border-slate-800 bg-slate-950/40 p-5">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-4 text-left text-white font-semibold">
                        <span>{{ $faq['question'] }}</span>
                        <span class="text-indigo-300 transition-transform group-open:rotate-45">+</span>
                    </summary>
                    <div class="mt-4 border-t border-slate-800 pt-4 text-slate-300 leading-7">
                        {!! nl2br(e($faq['answer'])) !!}
                    </div>
                </details>
                @endforeach
            </div>
        </section>
        @endif

        <section class="mt-10 grid gap-8 lg:grid-cols-[1.15fr_0.85fr]">
            <div class="rounded-2xl border border-slate-800 bg-slate-900/40 p-6 md:p-8">
                <div class="flex items-start justify-between gap-4 mb-6">
                    <div>
                        <p class="text-xs uppercase tracking-[0.22em] text-indigo-300">Comments</p>
                        <h2 class="mt-2 font-display text-2xl font-bold text-white">Reader Discussion</h2>
                    </div>
                    <div class="text-sm text-slate-500">{{ $comments->count() }} approved</div>
                </div>

                @if($comments->isEmpty())
                <p class="text-slate-400 leading-7">No approved comments yet. Be the first person to start the conversation.</p>
                @else
                <div class="space-y-5">
                    @foreach($comments as $comment)
                    <article class="rounded-2xl border border-slate-800 bg-slate-950/50 p-5">
                        <div class="flex flex-wrap items-center justify-between gap-3">
                            <div>
                                <h3 class="font-semibold text-white">{{ $comment->author_name }}</h3>
                                <p class="text-xs uppercase tracking-[0.18em] text-slate-500">{{ $comment->created_at->format('M d, Y') }}</p>
                            </div>
                            @if($comment->author_website)
                            <a href="{{ $comment->author_website }}" target="_blank" rel="noopener noreferrer nofollow" class="text-sm text-indigo-300 hover:text-indigo-200">
                                Visit Website
                            </a>
                            @endif
                        </div>

                        <div class="mt-4 text-slate-300 leading-7">
                            {!! nl2br(e($comment->comment)) !!}
                        </div>

                        @if($comment->admin_reply)
                        <div class="mt-5 rounded-2xl border border-indigo-500/20 bg-indigo-500/8 p-5">
                            <div class="flex flex-wrap items-center justify-between gap-3">
                                <div>
                                    <p class="font-semibold text-white">{{ $personal->brand_name ?? 'Admin' }}</p>
                                    <p class="text-xs uppercase tracking-[0.18em] text-indigo-200">Reply</p>
                                </div>
                                @if($comment->replied_at)
                                <p class="text-xs uppercase tracking-[0.18em] text-slate-400">{{ $comment->replied_at->format('M d, Y') }}</p>
                                @endif
                            </div>
                            <div class="mt-4 text-slate-200 leading-7">
                                {!! nl2br(e($comment->admin_reply)) !!}
                            </div>
                        </div>
                        @endif
                    </article>
                    @endforeach
                </div>
                @endif
            </div>

            <div class="rounded-2xl border border-slate-800 bg-slate-900/40 p-6 md:p-8">
                <p class="text-xs uppercase tracking-[0.22em] text-indigo-300">Leave a Comment</p>
                <h2 class="mt-2 font-display text-2xl font-bold text-white">Share Your Thoughts</h2>
                <p class="mt-3 text-slate-400 leading-7">Comments are moderated before they appear publicly. Use a real email so I can verify genuine discussion.</p>

                @if(session('comment_success'))
                <div class="mt-6 rounded-2xl border border-emerald-500/25 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-200">
                    {{ session('comment_success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="mt-6 rounded-2xl border border-rose-500/25 bg-rose-500/10 px-4 py-3 text-sm text-rose-200">
                    Please fix the highlighted comment form fields and try again.
                </div>
                @endif

                <form action="{{ route('blog.comments.store', $blog->slug) }}" method="POST" class="mt-6 space-y-4">
                    @csrf
                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <input
                                type="text"
                                name="author_name"
                                value="{{ old('author_name') }}"
                                placeholder="Your name"
                                class="form-input @error('author_name') border-rose-500/60 @enderror"
                                required
                            >
                            @error('author_name')
                            <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <input
                                type="email"
                                name="author_email"
                                value="{{ old('author_email') }}"
                                placeholder="Your email"
                                class="form-input @error('author_email') border-rose-500/60 @enderror"
                                required
                            >
                            @error('author_email')
                            <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <input
                            type="url"
                            name="author_website"
                            value="{{ old('author_website') }}"
                            placeholder="Website (optional)"
                            class="form-input @error('author_website') border-rose-500/60 @enderror"
                        >
                        @error('author_website')
                        <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <textarea
                            name="comment"
                            rows="7"
                            placeholder="Write your comment here..."
                            class="form-input min-h-[180px] @error('comment') border-rose-500/60 @enderror"
                            required
                        >{{ old('comment') }}</textarea>
                        @error('comment')
                        <p class="mt-2 text-sm text-rose-300">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn-primary">
                        Submit Comment
                    </button>
                </form>
            </div>
        </section>

        @if($latestBlogs->isNotEmpty())
        <div class="mt-12">
            <h2 class="font-display text-2xl font-bold mb-5">More Articles</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach($latestBlogs as $latest)
                <a href="{{ route('blog.show', $latest->slug) }}" class="rounded-2xl border border-slate-800 bg-slate-900/40 p-5 hover:border-indigo-500/40 transition-all">
                    <div class="mb-3 flex flex-wrap items-center gap-2 text-[11px] uppercase tracking-[0.18em] text-slate-500">
                        <span>{{ $latest->published_at?->format('M d, Y') }}</span>
                        <span>{{ $latest->reading_time }} min read</span>
                        <span>{{ number_format($latest->comment_count) }} comments</span>
                    </div>
                    <h3 class="text-white font-semibold leading-snug">{{ Str::limit($latest->title, 70) }}</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-400">{{ Str::limit($latest->excerpt ?: strip_tags($latest->content), 88) }}</p>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection

@push('scripts')
<style>
    .blog-editor-content {
        color: #cbd5e1;
        font-size: 1.125rem;
        line-height: 1.85;
    }
    .blog-editor-content > * + * {
        margin-top: 1rem;
    }
    .blog-editor-content h2,
    .blog-editor-content h3,
    .blog-editor-content h4 {
        font-family: 'Space Grotesk', sans-serif;
        color: #f8fafc;
        letter-spacing: -0.01em;
        line-height: 1.3;
        margin-top: 1.8rem;
        margin-bottom: 0.7rem;
    }
    .blog-editor-content h2 { font-size: 1.7rem; font-weight: 700; }
    .blog-editor-content h3 { font-size: 1.35rem; font-weight: 650; }
    .blog-editor-content h4 { font-size: 1.15rem; font-weight: 650; }
    .blog-editor-content p {
        margin: 0.9rem 0;
        color: #cbd5e1;
    }
    .blog-editor-content strong {
        color: #f8fafc;
        font-weight: 700;
    }
    .blog-editor-content ul,
    .blog-editor-content ol {
        margin: 1rem 0;
        padding-left: 1.4rem;
    }
    .blog-editor-content ul { list-style: disc; }
    .blog-editor-content ol { list-style: decimal; }
    .blog-editor-content li {
        margin: 0.45rem 0;
        color: #cbd5e1;
    }
    .blog-editor-content a {
        color: #818cf8;
        text-decoration: underline;
        text-decoration-thickness: 1px;
        text-underline-offset: 3px;
    }
    .blog-editor-content a:hover {
        color: #a5b4fc;
    }
    .blog-editor-content blockquote {
        margin: 1.25rem 0;
        padding: 0.85rem 1rem;
        border-left: 3px solid rgba(99, 102, 241, 0.85);
        background: rgba(99, 102, 241, 0.08);
        border-radius: 0.5rem;
        color: #dbeafe;
    }
    .blog-editor-content img {
        display: block;
        max-width: 100%;
        height: auto;
        border-radius: 0.75rem;
        border: 1px solid rgba(148, 163, 184, 0.25);
        margin: 1rem 0;
    }
    .blog-editor-content code {
        background: rgba(148, 163, 184, 0.12);
        color: #e2e8f0;
        border-radius: 0.35rem;
        padding: 0.15rem 0.4rem;
        font-size: 0.95em;
    }
    .blog-editor-content pre {
        background: #0b1220;
        color: #e2e8f0;
        border: 1px solid rgba(148, 163, 184, 0.2);
        border-radius: 0.75rem;
        padding: 1rem;
        overflow-x: auto;
        margin: 1.1rem 0;
    }
    .blog-editor-content pre code {
        background: transparent;
        padding: 0;
    }
</style>
@endpush
