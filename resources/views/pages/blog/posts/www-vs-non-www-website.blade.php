@extends('layouts.app')

@section('title', 'WWW vs Non-WWW: Which Should You Use for Your Website? | TechNabu Blog')
@section('description', 'A clear explanation of the www vs non-www debate, why it matters for SEO, and how to choose and stick with one consistently.')
@section('keywords', 'www vs non-www, technical seo, website canonical, seo specialist in nepal, nabaraj acharya')
@section('canonical', route('blog.www-vs-non-www-website'))
@section('og_type', 'article')

@section('schema')
@php
    $articleSchema = [
        '@context' => 'https://schema.org', '@type' => 'BlogPosting',
        'headline' => 'WWW vs Non-WWW: Which Should You Use for Your Website?',
        'description' => 'A clear explanation of the www vs non-www debate and why it matters for SEO.',
        'author' => ['@type' => 'Person', 'name' => $personal->brand_name ?? 'Nabaraj Acharya'],
        'mainEntityOfPage' => route('blog.www-vs-non-www-website'),
        'timeRequired' => 'PT3M',
    ];
    $faqSchema = [
        '@context' => 'https://schema.org', '@type' => 'FAQPage',
        'mainEntity' => [
            ['@type' => 'Question', 'name' => 'Does www vs non-www affect SEO?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => "Not directly — Google treats both as valid. The real SEO risk is letting both versions exist without one redirecting to the other, which splits your site's signals between two addresses."]],
            ['@type' => 'Question', 'name' => 'Which one should I choose?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Neither is objectively better. Pick whichever you prefer, set it up with a proper redirect from the other version, and keep it consistent everywhere your site is linked.']],
            ['@type' => 'Question', 'name' => 'Can I switch later if I already picked one?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes, but it should be done carefully with a proper 301 redirect and updated in Google Search Console, since switching carelessly can temporarily affect rankings.']],
        ],
    ];
    $breadcrumbSchema = ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => route('blog.index')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'WWW vs Non-WWW', 'item' => route('blog.www-vs-non-www-website')],
    ]];
@endphp
<script type="application/ld+json">{!! json_encode($articleSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($faqSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')
<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">WWW vs Non-WWW: Which Should You Use?</h1>
        <div class="flex flex-wrap items-center justify-center gap-3 mb-4">
            <span class="skill-badge">Technical SEO</span>
            <span class="skill-badge">3 min read</span>
        </div>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a><span class="mx-1">&rsaquo;</span>
            <a href="{{ route('blog.index') }}" class="hover:underline">Blog</a><span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">WWW vs Non-WWW</span>
        </p>
    </div>
</section>

<section class="py-10 md:py-14 reveal">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <p class="text-lg leading-relaxed mb-8" style="color: var(--ink); border-left: 4px solid var(--accent); padding-left: 16px;">
            It's a small decision that's easy to get wrong in a way that quietly hurts your SEO. Here's what actually matters about www vs non-www, in plain terms.
        </p>

        <div class="post-content">
            <p>To Google, <code>www.example.com</code> and <code>example.com</code> are technically two different addresses, even though they point to the same site. That's the entire issue in one sentence — and the fix is simpler than the debate around it suggests.</p>

            <h2>Why This Causes Problems</h2>
            <p>If both versions of your site are accessible without one redirecting to the other, search engines can index both as separate pages with duplicate content. That splits ranking signals — like links pointing to your site — between two addresses instead of consolidating them into one.</p>

            <h2>Is One Actually Better Than the Other?</h2>
            <p>No, not in any meaningful SEO sense. This used to be debated more, but Google has been clear for years that neither version has an inherent ranking advantage. The choice is really about preference and how you want your brand to appear.</p>

            <h2>The Fix: Pick One and Redirect the Other</h2>
            <p>Choose the version you want as your primary address, then set up a permanent (301) redirect so the other version automatically forwards to it. This way visitors and search engines always land on one consistent address, no matter which one they type or click.</p>

            <h2>Where to Check You've Done This Right</h2>
            <ul>
                <li>Type both versions into a browser and confirm one redirects cleanly to the other.</li>
                <li>Check that your sitemap and canonical tags consistently reference your chosen version.</li>
                <li>Set your preferred domain in Google Search Console so there's no ambiguity.</li>
            </ul>

            <h2>Final Thoughts</h2>
            <p>This is a small technical detail, but it's exactly the kind of thing that quietly undermines SEO if it's overlooked. It's one of the items I check as part of every <a href="{{ route('services.seo-social-media-marketing') }}">technical SEO audit</a> I run.</p>

            <h2>FAQs</h2>
            <h3>Does www vs non-www affect SEO?</h3>
            <p>Not directly — Google treats both as valid. The real SEO risk is letting both versions exist without one redirecting to the other, which splits your site's signals between two addresses.</p>
            <h3>Which one should I choose?</h3>
            <p>Neither is objectively better. Pick whichever you prefer, set it up with a proper redirect from the other version, and keep it consistent everywhere your site is linked.</p>
            <h3>Can I switch later if I already picked one?</h3>
            <p>Yes, but it should be done carefully with a proper 301 redirect and updated in Google Search Console, since switching carelessly can temporarily affect rankings.</p>
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

@include('partials.services-cta', ['heading' => 'SEO and marketing'])
@endsection

@push('styles')
<style>
.post-content { color: var(--ink-dim); font-size: 1.05rem; line-height: 1.85; }
.post-content > * + * { margin-top: 1rem; }
.post-content h2, .post-content h3 { font-family: 'Rajdhani', sans-serif; color: var(--ink); font-weight: 700; line-height: 1.3; margin-top: 1.8rem; margin-bottom: 0.7rem; }
.post-content h2 { font-size: 1.6rem; }
.post-content h3 { font-size: 1.25rem; }
.post-content p { margin: 0.9rem 0; }
.post-content code { background: var(--bg-soft); color: var(--ink); border-radius: 6px; padding: 2px 6px; font-size: 0.92em; }
.post-content ul { margin: 1rem 0; padding-left: 1.4rem; list-style: disc; }
.post-content li { margin: 0.45rem 0; }
.post-content a { color: var(--accent); text-decoration: underline; text-underline-offset: 3px; }
.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); }
@media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }
</style>
@endpush
