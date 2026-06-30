@extends('layouts.app')

@section('title', 'Local SEO for Small Businesses in Nepal: Step-by-Step')
@section('description', 'A practical, step-by-step local SEO guide and checklist for small businesses in Nepal — Google Business Profile, citations, reviews, and local content.')
@section('keywords', 'local seo nepal, seo specialist in nepal, google business profile nepal, local seo lalitpur, nabaraj acharya')
@section('canonical', route('blog.local-seo-small-business-nepal'))
@section('og_type', 'article')
@section('og_image', asset('storage/blogs/local-seo-small-business-nepal.webp'))
@section('twitter_image', asset('storage/blogs/local-seo-small-business-nepal.webp'))
@section('og_image_alt', 'Local SEO for small businesses in Nepal')

@section('schema')
@php
    $articleSchema = [
        '@context' => 'https://schema.org', '@type' => 'BlogPosting',
        'headline' => 'Local SEO for Small Businesses in Nepal: A Step-by-Step Guide',
        'description' => 'A step-by-step local SEO guide for small businesses in Nepal.',
        'image' => asset('storage/blogs/local-seo-small-business-nepal.webp'),
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
            ['@type' => 'Question', 'name' => 'How many reviews do I need?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => "There's no fixed number, but a steady, ongoing stream of genuine reviews matters more than a one-time burst. Consistency signals an active, trustworthy business."]],
            ['@type' => 'Question', 'name' => 'Can I do local SEO myself without hiring anyone?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => "Yes, the basics like Google Business Profile setup are very doable yourself. A professional becomes more valuable for technical site issues and ongoing strategy as competition increases."]],
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
        <div class="mb-10 rounded-2xl overflow-hidden glass-card" style="padding:0;">
            <img src="{{ asset('storage/blogs/local-seo-small-business-nepal.webp') }}" alt="Local SEO for small businesses in Nepal" class="w-full h-auto object-cover" loading="lazy">
        </div>

        <p class="text-lg leading-relaxed mb-8" style="color: var(--ink); border-left: 4px solid var(--accent); padding-left: 16px;">
            If your customers are searching for you within a specific city or neighborhood, local SEO matters more than chasing national keywords. Here's a practical, step-by-step approach with a checklist you can follow this week.
        </p>

        <div class="post-content">
            <p>Local SEO is about making sure your business shows up when someone nearby searches for what you offer — "near me" searches, map results, and local pack listings. It's a different game from national SEO, and a more achievable one for most small businesses, especially in specific areas like Lalitpur or Khotang where competition for any given search term is naturally smaller than in a major city.</p>

            <h2>Step 1: Claim and Complete Your Google Business Profile</h2>
            <p>This is the single highest-value step available, and it's free. Fill in every section — categories, hours, photos, services — not just the basics. An incomplete profile is a missed opportunity that takes minutes to fix. Make sure your primary category accurately reflects your main business, since this affects which searches you show up for.</p>

            <h2>Step 2: Keep Your Business Details Consistent Everywhere</h2>
            <p>Your business name, address, and phone number (often called "NAP") should match exactly across your website, Google Business Profile, and any directories you're listed on. Inconsistent details confuse search engines about which listing is actually correct, and can quietly undermine all your other local SEO work.</p>

            <h2>Step 3: Build Location-Relevant Pages</h2>
            <p>If you serve specific areas, real pages about those areas — not just a list of city names — help you show up for local searches. The key word is "real": genuinely useful, specific content, not a thin page stuffed with a city name repeated for the sake of it. A good local page explains what you offer in that area and why someone there should choose you.</p>

            <h2>Step 4: Collect Genuine Reviews</h2>
            <p>Reviews are both a trust signal for customers and a ranking factor for Google. Asking satisfied customers directly, right after a good experience, is usually the most effective approach. A steady trickle of reviews over time tends to look more natural and trustworthy than a sudden burst followed by silence.</p>

            <h2>Step 5: Get Listed in Relevant Local Directories</h2>
            <p>Beyond Google, relevant local business directories add additional signals that your business is genuine and established in your area. Focus on directories that are actually relevant to your industry or region rather than submitting to every directory you can find.</p>

            <h2>Step 6: Make Sure Your Site Works on Mobile</h2>
            <p>Most local searches happen on a phone, often from someone who wants an answer immediately — directions, a phone number, or opening hours. A slow or hard-to-navigate mobile site loses these visitors before they ever see what you offer, no matter how good your local SEO setup is otherwise.</p>

            <h2>Local SEO Checklist</h2>
            <ul>
                <li>Google Business Profile fully completed, not just created.</li>
                <li>Business name, address, and phone number consistent everywhere.</li>
                <li>At least one genuinely useful page per area you serve, if applicable.</li>
                <li>A process in place for asking satisfied customers for reviews.</li>
                <li>Listed in directories actually relevant to your industry or region.</li>
                <li>Site loads quickly and works cleanly on mobile.</li>
                <li>Contact information and hours easy to find within one tap or click.</li>
            </ul>

            <h2>Common Mistakes That Hold Businesses Back</h2>
            <p>The most common mistake is treating Google Business Profile as a one-time setup rather than something to keep updated — outdated hours or no recent photos signal an inactive business. The second most common mistake is inconsistent business details across different listings, which is easy to overlook but quietly damages trust signals across the board. A third, less obvious mistake is ignoring negative reviews instead of responding professionally — a thoughtful response to a bad review often does more for trust than having no negative reviews at all.</p>

            <h2>How Long Before You See Real Results</h2>
            <p>Local SEO tends to move faster than broad national SEO, but "fast" still usually means weeks to a few months, not days. The Google Business Profile improvements often show the quickest movement, sometimes within a few weeks, while improvements tied to your wider website's authority and content take longer to compound. Setting that expectation upfront helps avoid the common trap of giving up right before the effort starts paying off.</p>

            <h2>How Local SEO Connects to Your Wider Website</h2>
            <p>Local SEO doesn't work in isolation from the rest of your site. A Google Business Profile that links to a slow, outdated, or confusing website undermines the trust you've built through reviews and consistent listings. The two should be treated as one connected effort — strong local signals bring people to your site, and the site itself needs to convert that visit into an actual enquiry or sale.</p>

            <h2>Tracking Whether It's Actually Working</h2>
            <p>Beyond watching your Google Business Profile insights, the clearest sign local SEO is working is a steady increase in calls, direction requests, or enquiries that mention finding you through a search, rather than a referral or existing relationship. Tracking this loosely month over month — even in a simple spreadsheet — gives you a much more honest picture than guessing based on how "busy" search feels on any given day.</p>

            <h2>Final Thoughts</h2>
            <p>Local SEO rewards consistency more than any single big move — a complete profile, consistent details, and genuine reviews compound over time. If you want this set up properly for your business in Khotang, Lalitpur, or anywhere in Nepal, it's part of what I cover under <a href="{{ route('services.seo-social-media-marketing') }}">SEO &amp; Social Media Marketing</a>.</p>

            <h2>FAQs</h2>
            <h3>Is Google Business Profile free?</h3>
            <p>Yes, creating and managing a Google Business Profile is completely free. It is one of the highest-value local SEO steps available to any small business.</p>
            <h3>How long does local SEO take to work?</h3>
            <p>Local SEO often moves faster than national SEO since the competition for a specific city or neighborhood is smaller, but it still typically takes a few months of consistent work to see solid results.</p>
            <h3>Do I need a physical address to rank locally?</h3>
            <p>It helps significantly for Google Business Profile and map-based results, but service-area businesses without a public storefront can still rank well with the right setup.</p>
            <h3>How many reviews do I need?</h3>
            <p>There's no fixed number, but a steady, ongoing stream of genuine reviews matters more than a one-time burst. Consistency signals an active, trustworthy business.</p>
            <h3>Can I do local SEO myself without hiring anyone?</h3>
            <p>Yes, the basics like Google Business Profile setup are very doable yourself. A professional becomes more valuable for technical site issues and ongoing strategy as competition increases.</p>
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
.post-content h2, .post-content h3, .post-content h4 { font-family: 'Rajdhani', sans-serif; color: var(--ink); font-weight: 700; line-height: 1.3; margin-top: 1.8rem; margin-bottom: 0.7rem; }
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
