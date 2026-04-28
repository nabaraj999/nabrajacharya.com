@extends('layouts.app')

@section('title', $seo->meta_title ?? 'Blog — Laravel, SEO & Web Development Insights | SEO Specialist in Nepal')
@section('description', $seo->meta_description ?? 'Read practical Laravel and SEO insights from an SEO Specialist in Nepal, with local strategy notes for Khotang and Lalitpur.')
@section('keywords', $seo->meta_keywords ?? 'laravel blog nepal, seo blog nepal, seo specialist in nepal, seo specialist in khotang, seo specialist in lalitpur, seo specalist in khotang, seo specalist in lalitpur')
@section('canonical', route('blog.index'))
@section('og_title', $seo->og_title ?? 'TechNabu Blog | Laravel, SEO and Web Growth Insights')
@section('og_description', $seo->og_description ?? 'Explore practical Laravel tutorials, SEO strategies, and growth notes from real-world client work in Nepal.')
@section('twitter_title', $seo->twitter_title ?? 'TechNabu Blog | Laravel, SEO and Web Growth Insights')
@section('twitter_description', $seo->twitter_description ?? 'Explore practical Laravel tutorials, SEO strategies, and growth notes from real-world client work in Nepal.')
@section('og_type', 'blog')
@php($blogPreview = $blogs->first())
@section('og_image', $blogPreview && $blogPreview->featured_image ? asset('storage/'.$blogPreview->featured_image) : ($personal && $personal->logo_url ? url(Storage::url($personal->logo_url)) : ''))
@section('twitter_image', $blogPreview && $blogPreview->featured_image ? asset('storage/'.$blogPreview->featured_image) : ($personal && $personal->logo_url ? url(Storage::url($personal->logo_url)) : ''))

@section('schema')
<script type="application/ld+json">
{!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Blog',
        'name' => 'TechNabu Blog',
        'description' => 'Laravel, SEO and web development insights by Nabaraj Acharya',
        'url' => route('blog.index'),
        'publisher' => [
            '@type' => 'Person',
            'name' => $personal->brand_name ?? 'Nabaraj Acharya',
        ],
        'blogPost' => $blogs->map(fn ($post) => [
            '@type' => 'BlogPosting',
            'headline' => $post->title,
            'url' => route('blog.show', $post->slug),
            'datePublished' => optional($post->published_at)->toAtomString(),
            'commentCount' => $post->comment_count,
        ])->values()->all(),
    ]) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
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
        ],
    ]) !!}
</script>
@endsection

@section('content')
<section class="page-hero pt-24 pb-10 md:pt-32 md:pb-16">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 text-center">
        <div class="section-tag">Blog</div>
        <h1 class="font-display text-4xl md:text-5xl font-bold mt-2 mb-4">
            Insights on <span class="gradient-text">Laravel, SEO & Growth</span>
        </h1>
        <p class="text-slate-400 text-lg max-w-2xl mx-auto">
            Practical articles, case-based lessons, and field notes from real client projects in Nepal, including Khotang and Lalitpur.
        </p>
    </div>
</section>

<section class="py-10 md:py-16 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        @if($blogs->isEmpty())
            <p class="text-center text-slate-500 py-20">No blog posts published yet.</p>
        @else
            <div class="mb-8 flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
                <div>
                    <h2 class="font-display text-2xl md:text-3xl font-bold text-white">Recent Articles</h2>
                    <p class="mt-2 text-slate-400">Card-based browsing with publish dates, read time, and comment signals for each post.</p>
                </div>
                <div class="text-sm text-slate-500">{{ $blogs->total() }} published posts</div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                @foreach($blogs as $post)
                <article class="group flex h-full flex-col overflow-hidden rounded-3xl border border-slate-800 bg-[linear-gradient(180deg,rgba(15,23,42,0.94),rgba(15,23,42,0.72))] transition-all duration-300 hover:-translate-y-1.5 hover:border-indigo-500/40 hover:shadow-xl hover:shadow-indigo-500/10">
                    <a href="{{ route('blog.show', $post->slug) }}" class="block relative">
                        @if($post->featured_image)
                        <div class="h-52 overflow-hidden">
                            <img src="{{ asset('storage/'.$post->featured_image) }}" alt="{{ $post->title }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        @else
                        <div class="h-52 bg-gradient-to-br from-indigo-600/15 via-slate-900 to-cyan-600/10 flex items-center justify-center">
                            <span class="text-indigo-300 text-xs font-semibold uppercase tracking-[0.2em]">TechNabu</span>
                        </div>
                        @endif
                        <div class="absolute inset-x-0 bottom-0 p-4">
                            <div class="flex flex-wrap items-center gap-2 text-[11px] font-semibold uppercase tracking-[0.2em]">
                                <span class="rounded-full bg-slate-950/80 px-3 py-1 text-cyan-200 backdrop-blur">{{ $post->published_at?->format('M d, Y') }}</span>
                                <span class="rounded-full bg-slate-950/80 px-3 py-1 text-slate-200 backdrop-blur">{{ $post->reading_time }} min read</span>
                            </div>
                        </div>
                    </a>

                    <div class="flex flex-1 flex-col p-6">
                        @if($post->focus_keyword)
                        <p class="mb-4">
                            <span class="inline-flex items-center rounded-full border border-indigo-500/30 bg-indigo-500/15 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-indigo-300">
                                {{ $post->focus_keyword }}
                            </span>
                        </p>
                        @endif
                        <a href="{{ route('blog.show', $post->slug) }}">
                            <h2 class="font-display text-xl font-bold text-white mb-3 leading-tight group-hover:text-indigo-300 transition-colors">
                                {{ $post->title }}
                            </h2>
                        </a>
                        <p class="text-slate-400 text-sm leading-7 mb-6 flex-1">
                            {{ Str::limit($post->excerpt ?: strip_tags($post->content), 140) }}
                        </p>
                        <div class="mt-auto flex items-center justify-between gap-3 border-t border-slate-800 pt-4">
                            <div class="text-xs uppercase tracking-[0.18em] text-slate-500">
                                {{ number_format($post->comment_count) }} comments
                            </div>
                            <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-indigo-400 hover:text-indigo-300 transition-colors">
                                Read Article
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $blogs->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
