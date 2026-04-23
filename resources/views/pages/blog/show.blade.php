@extends('layouts.app')

@section('title', $blog->title . ' | TechNabu Blog')
@section('description', Str::limit($blog->excerpt ?: strip_tags($blog->content), 155))
@section('keywords', $blog->focus_keyword ?: ($seo->meta_keywords ?? 'laravel blog, seo insights, web development article'))

@section('schema')
@php
    $articleSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BlogPosting',
        'headline' => $blog->title,
        'description' => $blog->excerpt ?: Str::limit(strip_tags($blog->content), 155),
        'datePublished' => optional($blog->published_at)->toAtomString(),
        'dateModified' => optional($blog->updated_at)->toAtomString(),
        'author' => [
            '@type' => 'Person',
            'name' => $personal->brand_name ?? 'Nabaraj Acharya',
        ],
        'mainEntityOfPage' => route('blog.show', $blog->slug),
        'image' => $blog->featured_image ? asset('storage/'.$blog->featured_image) : null,
    ];
@endphp
<script type="application/ld+json">{!! json_encode($articleSchema) !!}</script>
@endsection

@section('content')
<section class="page-hero pt-24 pb-10 md:pt-32 md:pb-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <div class="section-tag">Article</div>
        <h1 class="font-display text-3xl md:text-5xl font-bold mt-2 mb-4 leading-tight">{{ $blog->title }}</h1>
        <p class="text-slate-400 text-sm md:text-base">
            Published {{ $blog->published_at ? $blog->published_at->format('F d, Y') : 'recently' }}
        </p>
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

        @if($latestBlogs->isNotEmpty())
        <div class="mt-12">
            <h2 class="font-display text-2xl font-bold mb-5">More Articles</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach($latestBlogs as $latest)
                <a href="{{ route('blog.show', $latest->slug) }}" class="rounded-xl border border-slate-800 bg-slate-900/40 p-4 hover:border-indigo-500/40 transition-all">
                    <p class="text-xs text-slate-500 uppercase tracking-widest mb-2">{{ $latest->published_at?->format('M d, Y') }}</p>
                    <h3 class="text-white font-semibold leading-snug">{{ Str::limit($latest->title, 70) }}</h3>
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
