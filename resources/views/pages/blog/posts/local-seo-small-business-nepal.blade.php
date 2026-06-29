@extends('layouts.app')

@section('title', 'Local SEO for Small Businesses in Nepal: A Step-by-Step Guide | TechNabu Blog')
@section('description', 'A practical, step-by-step local SEO guide for small businesses in Nepal — Google Business Profile, citations, reviews, and local content.')
@section('keywords', 'local seo nepal, seo specialist in nepal, google business profile nepal, local seo lalitpur, nabaraj acharya')
@section('canonical', route('blog.local-seo-small-business-nepal'))
@section('og_type', 'article')

@section('schema')
@php
    $articleSchema = [
        '@context' => 'https://schema.org', '@type' => 'BlogPosting',
        'headline' => 'Local SEO for Small Businesses in Nepal: A Step-by-Step Guide',
        'description' => 'A step-by-step local SEO guide for small businesses in Nepal.',
        'author' => ['@type' => 'Person', 'name' => $personal->brand_name ?? 'Nabaraj Acharya'],
        'mainEntityOfPage' => route('blog.local-seo-small-business-nepal'),
        'timeRequired' => 'PT6M',
    ];
    $faqSchema = [
        '@context' => 'https://schema.org', '@type' => 'FAQPage',
        'mainEntity' => [
            ['@type' => 'Question', 'name' => 'Is Google Business Profile free?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes, creating and managing a Google Business Profile is completely free. It is one of the highest-value local SEO steps available to any small business.']],
            ['@type' => 'Question', 'name' => 'How long does local SEO take to work?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Local SEO often moves faster than national SEO since the competition for a specific city or neighborhood is smaller, but it still typically takes a few months of consistent work to see solid results.']],
            ['@type' => 'Question', 'name' => 'Do I need a physical address to rank locally?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => "It helps significantly for Google Business Profile and map-based results, but service-area businesses without a public storefront can still rank well with the right setup."]],
        ],
    ];
    $breadcrumbSchema = ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => route('blog.index')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Local SEO for Small Businesses in Nepal', 'item' => route('blog.local-seo-small-business-nepal')],
    ]];
@endphp
<script type="application/ld+json">{!! json_encode($articleSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($faqSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')
<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">Local SEO for Small Businesses in Nepal</h1>
        <div class="flex flex-wrap items-center justify-center gap-3 mb-4">
            <span class="skill-badge">Step-by-Step Guide</span>
            <span class="skill-badge">6 min read</span>
        </div>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a><span class="mx-1">&rsaquo;</span>
            <a href="{{ route('blog.index') }}" class="hover:underline">Blog</a><span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">Local SEO for Small Businesses in Nepal</span>
        </p>
    </div>
</section>

<section class="py-10 md:py-14 reveal">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <p class="text-lg leading-relaxed mb-8" style="color: var(--ink); border-left: 4px solid var(--accent); padding-left: 16px;">
            If your customers are searching for you within a specific city or neighborhood, local SEO matters more than chasing national keywords. Here's a practical, step-by-step approach.
        </p>

        <div class="post-content">
            <p>Local SEO is about making sure your business shows up when someone nearby searches for what you offer — "near me" searches, map results, and local pack listings. It's a different game from national SEO, and a more achievable one for most small businesses.</p>

            <h2>Step 1: Claim and Complete Your Google Business Profile</h2>
            <p>This is the single highest-value step available, and it's free. Fill in every section — categories, hours, photos, services — not just the basics. An incomplete profile is a missed opportunity that takes minutes to fix.</p>

            <h2>Step 2: Keep Your Business Details Consistent Everywhere</h2>
            <p>Your business name, address, and phone number (often called "NAP") should match exactly across your website, Google Business Profile, and any directories you're listed on. Inconsistent details confuse search engines about which listing is actually correct.</p>

            <h2>Step 3: Build Location-Relevant Pages</h2>
            <p>If you serve specific areas, real pages about those areas — not just a list of city names — help you show up for local searches. The key word is "real": genuinely useful, specific content, not a thin page stuffed with a city name repeated for the sake of it.</p>

            <h2>Step 4: Collect Genuine Reviews</h2>
            <p>Reviews are both a trust signal for customers and a ranking factor for Google. Asking satisfied customers directly, right after a good experience, is usually the most effective approach.</p>

            <h2>Step 5: Get Listed in Relevant Local Directories</h2>
            <p>Beyond Google, relevant local business directories add additional signals that your business is genuine and established in your area.</p>

            <h2>Step 6: Make Sure Your Site Works on Mobile</h2>
            <p>Most local searches happen on a phone, often from someone who wants an answer immediately. A slow or hard-to-navigate mobile site loses these visitors before they ever see what you offer.</p>

            <h2>Final Thoughts</h2>
            <p>Local SEO rewards consistency more than any single big move — a complete profile, consistent details, and genuine reviews compound over time. If you want this set up properly for your business in Khotang, Lalitpur, or anywhere in Nepal, it's part of what I cover under <a href="{{ route('services.seo-social-media-marketing') }}">SEO &amp; Social Media Marketing</a>.</p>

            <h2>FAQs</h2>
            <h3>Is Google Business Profile free?</h3>
            <p>Yes, creating and managing a Google Business Profile is completely free. It is one of the highest-value local SEO steps available to any small business.</p>
            <h3>How long does local SEO take to work?</h3>
            <p>Local SEO often moves faster than national SEO since the competition for a specific city or neighborhood is smaller, but it still typically takes a few months of consistent work to see solid results.</p>
            <h3>Do I need a physical address to rank locally?</h3>
            <p>It helps significantly for Google Business Profile and map-based results, but service-area businesses without a public storefront can still rank well with the right setup.</p>
        </div>

        @if($otherPosts->isNotEmpty())
        <div class="mt-16 pt-10" style="border-top: 1px solid var(--line);">
            <h2 class="font-display text-2xl font-bold mb-6" style="color: var(--ink);">More Articles</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                @foreach($otherPosts->take(4) as $other)
                <a href="{{ route('blog.' . $other['slug']) }}" class="glass-card p-5 block">
                    <p class="text-xs font-semibold mb-2" style="color: var(--ink-faint);">{{ $other['date'] }} · {{ $other['reading_time'] }} min read</p>
                    <h3 class="font-display text-base font-bold" style="color: var(--ink);">{{ $other['title'] }}</h3>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

@include('partials.services-cta', ['heading' => 'local SEO'])
@endsection

@push('styles')
<style>
.post-content { color: var(--ink-dim); font-size: 1.05rem; line-height: 1.85; }
.post-content > * + * { margin-top: 1rem; }
.post-content h2, .post-content h3 { font-family: 'Rajdhani', sans-serif; color: var(--ink); font-weight: 700; line-height: 1.3; margin-top: 1.8rem; margin-bottom: 0.7rem; }
.post-content h2 { font-size: 1.6rem; }
.post-content h3 { font-size: 1.25rem; }
.post-content p { margin: 0.9rem 0; }
.post-content a { color: var(--accent); text-decoration: underline; text-underline-offset: 3px; }
.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); }
@media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }
</style>
@endpush
