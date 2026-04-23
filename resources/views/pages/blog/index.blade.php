@extends('layouts.app')

@section('title', $seo->meta_title ?? 'Blog — Laravel, SEO & Web Development Insights | SEO Specialist in Nepal')
@section('description', $seo->meta_description ?? 'Read practical Laravel and SEO insights from an SEO Specialist in Nepal, with local strategy notes for Khotang and Lalitpur.')
@section('keywords', $seo->meta_keywords ?? 'laravel blog nepal, seo blog nepal, seo specialist in nepal, seo specialist in khotang, seo specialist in lalitpur, seo specalist in khotang, seo specalist in lalitpur')

@section('schema')
@php
    $blogSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Blog',
        'name' => 'TechNabu Blog',
        'description' => 'Laravel, SEO and web development insights by Nabaraj Acharya',
        'url' => route('blog.index'),
    ];
@endphp
<script type="application/ld+json">{!! json_encode($blogSchema) !!}</script>
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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                @foreach($blogs as $post)
                <article class="group rounded-2xl overflow-hidden border border-slate-800 bg-surface transition-all duration-300 hover:border-indigo-500/40 hover:-translate-y-1 hover:shadow-xl hover:shadow-indigo-500/10">
                    <a href="{{ route('blog.show', $post->slug) }}" class="block">
                        @if($post->featured_image)
                        <div class="h-52 overflow-hidden">
                            <img src="{{ asset('storage/'.$post->featured_image) }}" alt="{{ $post->title }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        @else
                        <div class="h-52 bg-gradient-to-br from-indigo-600/15 to-cyan-600/10 flex items-center justify-center">
                            <span class="text-indigo-300 text-xs font-semibold uppercase tracking-[0.2em]">TechNabu</span>
                        </div>
                        @endif
                    </a>

                    <div class="p-6">
                        <p class="text-xs uppercase tracking-widest text-slate-500 mb-3">
                            {{ $post->published_at ? $post->published_at->format('M d, Y') : 'Draft' }}
                        </p>
                        <a href="{{ route('blog.show', $post->slug) }}">
                            <h2 class="font-display text-xl font-bold text-white mb-3 leading-tight group-hover:text-indigo-300 transition-colors">
                                {{ $post->title }}
                            </h2>
                        </a>
                        <p class="text-slate-400 text-sm leading-relaxed mb-5">
                            {{ Str::limit($post->excerpt ?: strip_tags($post->content), 140) }}
                        </p>
                        <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-indigo-400 hover:text-indigo-300 transition-colors">
                            Read Article
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </a>
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
