@extends('layouts.app')

@section('title', 'How to Use Google Search Console: A Beginner\'s Guide | TechNabu Blog')
@section('description', 'A beginner-friendly walkthrough of Google Search Console — what it tracks, the reports that actually matter, and how to use it to improve your SEO.')
@section('keywords', 'google search console guide, seo nepal, technical seo nepal, nabaraj acharya')
@section('canonical', route('blog.google-search-console-beginners-guide'))
@section('og_type', 'article')

@section('schema')
@php
    $articleSchema = [
        '@context' => 'https://schema.org', '@type' => 'BlogPosting',
        'headline' => "How to Use Google Search Console: A Beginner's Guide",
        'description' => 'A beginner-friendly walkthrough of Google Search Console.',
        'author' => ['@type' => 'Person', 'name' => $personal->brand_name ?? 'Nabaraj Acharya'],
        'mainEntityOfPage' => route('blog.google-search-console-beginners-guide'),
        'timeRequired' => 'PT5M',
    ];
    $faqSchema = [
        '@context' => 'https://schema.org', '@type' => 'FAQPage',
        'mainEntity' => [
            ['@type' => 'Question', 'name' => 'Is Google Search Console free?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes, it is completely free and available to any website owner who can verify ownership of the site.']],
            ['@type' => 'Question', 'name' => 'How long until Search Console shows data?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Search performance data typically starts appearing within a few days, though it can take a few weeks to build up a useful amount of data for a new site.']],
            ['@type' => 'Question', 'name' => 'Do I need Search Console if I already have Google Analytics?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes — they show different things. Analytics focuses on visitor behavior once they arrive at your site; Search Console focuses specifically on how your site appears and performs in Google Search.']],
        ],
    ];
    $breadcrumbSchema = ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => route('blog.index')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Google Search Console Beginner\'s Guide', 'item' => route('blog.google-search-console-beginners-guide')],
    ]];
@endphp
<script type="application/ld+json">{!! json_encode($articleSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($faqSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')
<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">How to Use Google Search Console</h1>
        <div class="flex flex-wrap items-center justify-center gap-3 mb-4">
            <span class="skill-badge">Beginner's Guide</span>
            <span class="skill-badge">5 min read</span>
        </div>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a><span class="mx-1">&rsaquo;</span>
            <a href="{{ route('blog.index') }}" class="hover:underline">Blog</a><span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">Google Search Console Beginner's Guide</span>
        </p>
    </div>
</section>

<section class="py-10 md:py-14 reveal">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <p class="text-lg leading-relaxed mb-8" style="color: var(--ink); border-left: 4px solid var(--accent); padding-left: 16px;">
            Google Search Console is free, and it's one of the most useful tools you can set up for your website — yet most small business owners never open it. Here's what it actually does, in plain language.
        </p>

        <div class="post-content">
            <p>Search Console isn't an analytics tool in the way Google Analytics is. It specifically shows you how Google sees and ranks your site — which is exactly the data you need to improve SEO.</p>

            <h2>What Search Console Actually Shows You</h2>
            <h3>Performance Report</h3>
            <p>This shows which search queries bring people to your site, how often your pages appear in search results, and how often people actually click. It's the most useful report for understanding what's working.</p>

            <h3>Coverage / Indexing Report</h3>
            <p>This tells you which pages Google has actually indexed, and flags pages it couldn't index along with the reason. If a page isn't showing up in search at all, this is the first place to check why.</p>

            <h3>Core Web Vitals Report</h3>
            <p>This shows how your site performs on real-world speed and stability metrics that Google factors into rankings — directly tied to how fast and smooth your site feels to visitors.</p>

            <h2>Setting It Up</h2>
            <p>Setup involves verifying you own the site (usually through a DNS record, an HTML file, or a meta tag) and submitting an XML sitemap so Google can find all your pages efficiently. This is normally a one-time setup that takes a few minutes.</p>

            <h2>What to Check Regularly</h2>
            <ul>
                <li>New indexing errors that appear after a site update.</li>
                <li>Queries where you're appearing in search but not getting clicks — often a sign your title or description needs work.</li>
                <li>Sudden drops in clicks or impressions, which can flag a technical issue worth investigating quickly.</li>
            </ul>

            <h2>Final Thoughts</h2>
            <p>Search Console won't fix anything by itself, but it tells you exactly where to focus — which is half the work of doing SEO well. I review this data as a standard part of every <a href="{{ route('services.seo-social-media-marketing') }}">SEO engagement</a> I run.</p>

            <h2>FAQs</h2>
            <h3>Is Google Search Console free?</h3>
            <p>Yes, it is completely free and available to any website owner who can verify ownership of the site.</p>
            <h3>How long until Search Console shows data?</h3>
            <p>Search performance data typically starts appearing within a few days, though it can take a few weeks to build up a useful amount of data for a new site.</p>
            <h3>Do I need Search Console if I already have Google Analytics?</h3>
            <p>Yes — they show different things. Analytics focuses on visitor behavior once they arrive at your site; Search Console focuses specifically on how your site appears and performs in Google Search.</p>
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
.post-content ul { margin: 1rem 0; padding-left: 1.4rem; list-style: disc; }
.post-content li { margin: 0.45rem 0; }
.post-content a { color: var(--accent); text-decoration: underline; text-underline-offset: 3px; }
.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); }
@media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }
</style>
@endpush
