@extends('layouts.app')

@section('title', $seo->meta_title ?? 'TechNabu Blog | Laravel & SEO Insights')
@section('description', $seo->meta_description ?? 'Read practical Laravel and SEO insights from an SEO Specialist in Nepal, with local strategy notes for Khotang and Lalitpur.')
@section('keywords', $seo->meta_keywords ?? 'laravel blog nepal, seo blog nepal, seo specialist in nepal, seo specialist in khotang, seo specialist in lalitpur, seo specalist in khotang, seo specalist in lalitpur')
@section('canonical', route('blog.index'))
@section('og_title', $seo->og_title ?? 'TechNabu Blog | Laravel, SEO and Web Growth Insights')
@section('og_description', $seo->og_description ?? 'Explore practical Laravel tutorials, SEO strategies, and growth notes from real-world client work in Nepal.')
@section('twitter_title', $seo->twitter_title ?? 'TechNabu Blog | Laravel, SEO and Web Growth Insights')
@section('twitter_description', $seo->twitter_description ?? 'Explore practical Laravel tutorials, SEO strategies, and growth notes from real-world client work in Nepal.')
@section('og_type', 'blog')
@php $blogOgPost = collect(\App\Http\Controllers\BlogController::posts())->first(fn ($p) => $p['image']); @endphp
@if($blogOgPost)
@section('og_image', asset('storage/'.$blogOgPost['image']))
@section('twitter_image', asset('storage/'.$blogOgPost['image']))
@section('og_image_alt', 'TechNabu Blog — Laravel & SEO Insights')
@endif

@section('schema')
<script type="application/ld+json">
{!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Blog',
        'name' => 'TechNabu Blog',
        'description' => 'Laravel, SEO and web development insights by Nabaraj Acharya',
        'url' => route('blog.index'),
        'publisher' => ['@type' => 'Person', 'name' => $personal->brand_name ?? 'Nabaraj Acharya'],
        'blogPost' => collect(\App\Http\Controllers\BlogController::posts())->map(fn ($post) => [
            '@type' => 'BlogPosting',
            'headline' => $post['title'],
            'url' => route('blog.' . $post['slug']),
        ])->values()->all(),
    ]) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => route('blog.index')],
        ],
    ]) !!}
</script>
@endsection

@section('content')
<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">
            Insights on <span class="gradient-text">Laravel, SEO &amp; Growth</span>
        </h1>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">Blog</span>
        </p>
    </div>
</section>

<section class="py-12 md:py-16 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- Main column --}}
            <div class="lg:col-span-2">
                @if($search !== '')
                <p class="text-sm mb-6" style="color: var(--ink-faint);">
                    {{ $posts->total() }} result{{ $posts->total() === 1 ? '' : 's' }} for "<span style="color: var(--ink);">{{ $search }}</span>"
                    — <a href="{{ route('blog.index') }}" class="hover:underline" style="color: var(--accent);">clear search</a>
                </p>
                @endif

                @if($posts->isEmpty())
                    <p class="py-20 text-center" style="color: var(--ink-faint);">No blog posts found.</p>
                @else
                    <div class="flex flex-col gap-8">
                        @foreach($posts as $post)
                        <article class="blog-list-card glass-card" style="padding: 0;">
                            <a href="{{ route('blog.' . $post['slug']) }}" class="block blog-list-img">
                                @if($post['image'])
                                <img src="{{ asset('storage/'.$post['image']) }}" alt="{{ $post['title'] }}" loading="lazy">
                                @else
                                <div class="blog-list-img-placeholder">{{ $personal->brand_name ?? 'TechNabu' }}</div>
                                @endif
                            </a>
                            <div class="p-6 md:p-7">
                                <div class="blog-list-meta">
                                    <span><svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>{{ $personal->brand_name ?? 'Admin' }}</span>
                                    <span><svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>{{ $post['date'] }}</span>
                                    <span><svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>{{ $post['reading_time'] }} min read</span>
                                </div>
                                <a href="{{ route('blog.' . $post['slug']) }}">
                                    <h2 class="font-display text-xl font-bold mb-3" style="color: var(--ink);">{{ $post['title'] }}</h2>
                                </a>
                                <p class="text-sm leading-relaxed mb-5" style="color: var(--ink-dim);">{{ $post['excerpt'] }}</p>
                                <a href="{{ route('blog.' . $post['slug']) }}" class="btn-outline" data-magnetic data-cursor="link">
                                    Read More
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                                </a>
                            </div>
                        </article>
                        @endforeach
                    </div>

                    @if($posts->lastPage() > 1)
                    <nav class="blog-pagination" aria-label="Blog pagination">
                        <a href="{{ $posts->previousPageUrl() }}" class="blog-page-link blog-page-arrow {{ $posts->onFirstPage() ? 'is-disabled' : '' }}" aria-label="Previous page">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </a>

                        @foreach($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                            <a href="{{ $url }}" class="blog-page-link {{ $page === $posts->currentPage() ? 'is-active' : '' }}">{{ $page }}</a>
                        @endforeach

                        <a href="{{ $posts->hasMorePages() ? $posts->nextPageUrl() : '#' }}" class="blog-page-link blog-page-arrow {{ $posts->hasMorePages() ? '' : 'is-disabled' }}" aria-label="Next page">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </nav>
                    @endif
                @endif
            </div>

            {{-- Sidebar --}}
            <div class="lg:col-span-1">
                <div class="sticky" style="top: 100px;">
                    <form action="{{ route('blog.index') }}" method="GET" class="glass-card p-5 mb-6 flex gap-2">
                        <input type="text" name="q" value="{{ $search }}" placeholder="Search articles…" class="form-input !py-2.5">
                        <button type="submit" class="btn-primary !px-4" aria-label="Search">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </button>
                    </form>

                    <div class="glass-card p-6">
                        <h3 class="font-display text-sm font-bold uppercase tracking-wider mb-4" style="color: var(--ink-faint);">All Articles</h3>
                        <div class="flex flex-col gap-4">
                            @foreach(collect(\App\Http\Controllers\BlogController::posts()) as $post)
                            <a href="{{ route('blog.' . $post['slug']) }}" class="blog-side-item">
                                <div class="blog-side-thumb">
                                    @if($post['image'])
                                    <img src="{{ asset('storage/'.$post['image']) }}" alt="{{ $post['title'] }}" loading="lazy">
                                    @endif
                                </div>
                                <span class="blog-side-title">{{ Str::limit($post['title'], 60) }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.blog-list-img { aspect-ratio: 16/8; overflow: hidden; display: block; background: var(--bg-soft); }
.blog-list-img img { width: 100%; height: 100%; object-fit: cover; transition: transform .5s ease; }
.blog-list-card:hover .blog-list-img img { transform: scale(1.03); }
.blog-list-img-placeholder { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; font-size: 0.85rem; color: var(--ink-faint); }
.blog-list-meta { display: flex; flex-wrap: wrap; gap: 16px; margin-bottom: 14px; }
.blog-list-meta span { display: flex; align-items: center; gap: 5px; font-size: 0.78rem; color: var(--ink-faint); font-weight: 600; }
.blog-side-item { display: flex; align-items: center; gap: 12px; }
.blog-side-thumb { width: 52px; height: 52px; border-radius: 10px; overflow: hidden; background: var(--bg-soft); flex-shrink: 0; }
.blog-side-thumb img { width: 100%; height: 100%; object-fit: cover; }
.blog-side-title { font-size: 0.85rem; font-weight: 600; color: var(--ink-dim); line-height: 1.4; transition: color .2s ease; }
.blog-side-item:hover .blog-side-title { color: var(--accent); }
.blog-pagination { display: flex; align-items: center; justify-content: center; gap: 8px; margin-top: 48px; flex-wrap: wrap; }
.blog-page-link {
    display: inline-flex; align-items: center; justify-content: center;
    min-width: 40px; height: 40px; padding: 0 4px;
    border-radius: 100px; border: 1.5px solid var(--line-strong);
    font-family: 'Rajdhani', sans-serif; font-weight: 700; font-size: 0.95rem;
    color: var(--ink); background: transparent; transition: all 0.25s ease;
}
.blog-page-link:hover { border-color: var(--accent); color: var(--accent); transform: translateY(-2px); }
.blog-page-link.is-active { background: var(--accent); border-color: var(--accent); color: #fff; box-shadow: 0 8px 20px rgba(223,29,53,0.25); }
.blog-page-link.is-active:hover { transform: none; color: #fff; }
.blog-page-link.is-disabled { opacity: 0.4; pointer-events: none; }
</style>
@endpush
