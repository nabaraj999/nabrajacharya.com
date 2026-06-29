@extends('layouts.app')

@section('title', 'Google Analytics 4 Setup Guide for Nepali Websites | TechNabu Blog')
@section('description', 'A clear, beginner-friendly walkthrough of setting up Google Analytics 4 on your website, and the reports that actually matter for a small business.')
@section('keywords', 'google analytics 4 setup nepal, ga4 tutorial, web analytics nepal, seo specialist in nepal, nabaraj acharya')
@section('canonical', route('blog.google-analytics-4-setup-guide-nepal'))
@section('og_type', 'article')
@section('og_image', 'https://picsum.photos/seed/ga4-setup-nepal/1200/630')

@section('schema')
@php
    $articleSchema = [
        '@context' => 'https://schema.org', '@type' => 'BlogPosting',
        'headline' => 'Google Analytics 4 Setup Guide for Nepali Websites',
        'description' => 'A beginner-friendly walkthrough of setting up Google Analytics 4.',
        'image' => 'https://picsum.photos/seed/ga4-setup-nepal/1200/630',
        'author' => ['@type' => 'Person', 'name' => $personal->brand_name ?? 'Nabaraj Acharya'],
        'mainEntityOfPage' => route('blog.google-analytics-4-setup-guide-nepal'),
        'timeRequired' => 'PT6M',
    ];
    $faqSchema = [
        '@context' => 'https://schema.org', '@type' => 'FAQPage',
        'mainEntity' => [
            ['@type' => 'Question', 'name' => 'Is Google Analytics 4 free?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes, the standard version of GA4 is free for any website owner to use.']],
            ['@type' => 'Question', 'name' => 'What happened to Universal Analytics?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Universal Analytics, the previous version, stopped processing data in 2024. GA4 is now the only active version of Google Analytics.']],
            ['@type' => 'Question', 'name' => 'Do I need coding knowledge to set up GA4?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Basic setup using Google Tag Manager or a plugin generally requires no coding. More advanced custom event tracking benefits from a developer\'s help.']],
            ['@type' => 'Question', 'name' => 'How long does it take for data to start showing up?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Basic traffic data usually appears within minutes to hours of installing the tracking code correctly. Some reports take 24 to 48 hours to fully populate.']],
            ['@type' => 'Question', 'name' => 'Does GA4 work with WordPress as well as custom-built sites?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes — WordPress has plugins that simplify GA4 installation, while custom-built sites typically install it through Google Tag Manager or a direct code snippet in the site\'s layout.']],
            ['@type' => 'Question', 'name' => 'Can I see which specific products or pages perform best?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => "Yes, GA4's engagement and monetization reports break performance down by individual page or product, which is useful for deciding what to promote further and what might need improvement."]],
        ],
    ];
    $breadcrumbSchema = ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => route('blog.index')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Google Analytics 4 Setup Guide', 'item' => route('blog.google-analytics-4-setup-guide-nepal')],
    ]];
@endphp
<script type="application/ld+json">{!! json_encode($articleSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($faqSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')
<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">Google Analytics 4 Setup Guide</h1>
        <div class="flex flex-wrap items-center justify-center gap-3 mb-4">
            <span class="skill-badge">Setup Guide</span>
            <span class="skill-badge">6 min read</span>
        </div>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a><span class="mx-1">&rsaquo;</span>
            <a href="{{ route('blog.index') }}" class="hover:underline">Blog</a><span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">Google Analytics 4 Setup Guide</span>
        </p>
    </div>
</section>

<section class="py-10 md:py-14 reveal">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="mb-10 rounded-2xl overflow-hidden glass-card" style="padding:0;">
            <img src="https://picsum.photos/seed/ga4-setup-nepal/1200/630" alt="Google Analytics 4 setup guide" class="w-full h-auto object-cover" loading="lazy">
        </div>

        <p class="text-lg leading-relaxed mb-8" style="color: var(--ink); border-left: 4px solid var(--accent); padding-left: 16px;">
            If you don't know how many people visit your site, where they come from, or what they do once they're there, you're making business decisions blind. Here's how to set up Google Analytics 4 properly, step by step.
        </p>

        <div class="post-content">
            <p>GA4 is the current version of Google Analytics, and it works a bit differently from the older version many people remember. Instead of measuring sessions and pageviews as the primary unit, it's built around tracking "events" — actions people take on your site — which gives a more complete picture of behavior once it's configured correctly. Here's a straightforward path to getting it set up properly from the start.</p>

            <h2>Step 1: Create Your GA4 Property</h2>
            <p>In your Google Analytics account, create a new property for your website and fill in basic business details — industry, time zone, and currency. This takes just a couple of minutes.</p>

            <h2>Step 2: Install the Tracking Code</h2>
            <p>You'll get a tracking ID and a snippet of code. The cleanest way to install it is through Google Tag Manager, which lets you manage tracking codes without editing your site's code directly every time something changes. Alternatively, many website platforms have a simple field to paste your GA4 ID directly.</p>

            <h2>Step 3: Set Up Key Events</h2>
            <p>GA4 is built around "events" rather than simple pageviews. Beyond the basics it tracks automatically, it's worth manually defining the events that actually matter for your business — a contact form submission, a phone number click, an add-to-cart action — so you can see what's actually driving results, not just traffic.</p>

            <h2>Step 4: Link Google Search Console</h2>
            <p>Connecting Search Console to GA4 lets you see search performance data alongside your on-site behavior data in one place, which makes it much easier to connect "what people searched for" with "what they did once they arrived."</p>

            <h2>The Reports Worth Checking Regularly</h2>
            <ul>
                <li><strong>Acquisition</strong> — where your traffic is actually coming from (search, social, direct, referral).</li>
                <li><strong>Engagement</strong> — which pages people spend time on, and which they leave quickly.</li>
                <li><strong>Conversions</strong> — whether the key events you set up are actually happening, and how often.</li>
                <li><strong>Demographics</strong> — broad location and device data, useful for understanding who is actually visiting.</li>
            </ul>

            <h2>Setup Checklist</h2>
            <ul>
                <li>GA4 property created with correct business details (time zone, currency, industry).</li>
                <li>Tracking code installed and verified live using GA4's real-time report.</li>
                <li>Key events defined for actions that actually matter to the business (form submission, call click, purchase).</li>
                <li>Google Search Console linked to GA4.</li>
                <li>Internal traffic from your own team excluded, so it doesn't skew the data.</li>
            </ul>

            <h2>How to Verify Your Setup Is Actually Working</h2>
            <p>Open GA4's real-time report, then visit your own website in a separate browser tab. If your visit shows up within a few seconds, the basic tracking code is installed correctly. To confirm key events, trigger each one yourself — submit a test form, click the phone number link — and check that it appears under the "events" report shortly after. Skipping this verification step is how broken tracking can go unnoticed for months.</p>

            <h2>Setting Up Conversion Tracking Correctly</h2>
            <p>"Key events" in GA4 are how you tell Google Analytics which actions actually matter to your business — not every click, but the specific ones tied to revenue or leads. For a service business, that might be a contact form submission or a WhatsApp click. For an online store, it's typically the purchase event, along with add-to-cart as a secondary signal. Defining these clearly, early, makes every later report meaningfully more useful, because you can filter and compare based on what actually drove a result rather than just raw traffic numbers.</p>

            <h2>GA4 and Privacy Considerations</h2>
            <p>If your audience includes visitors from regions with specific data privacy requirements, it's worth pairing your GA4 setup with a basic cookie consent mechanism appropriate for your audience. This doesn't need to be complicated for most small business sites, but it's worth setting up correctly from the start rather than retrofitting it later once visitor data has already been collected without proper consent in place.</p>

            <h2>A Common Mistake: Setting It Up and Never Looking Again</h2>
            <p>The most common failure with GA4 isn't a technical one — it's installing it correctly and then never opening it again. Data without a regular review habit doesn't improve anything. Even a brief monthly look at acquisition and conversions is enough to start noticing patterns worth acting on, like a marketing channel underperforming or a page quietly losing visitors.</p>

            <h2>Comparing Performance Across Time Periods</h2>
            <p>One of the most useful habits once GA4 has been running for a few months is comparing the same period year over year or month over month, rather than only looking at the most recent stretch in isolation. This is especially useful for seasonal businesses, where a quiet month might look alarming in isolation but is completely normal compared to the same month a year earlier. GA4's date comparison feature makes this a few clicks rather than a manual spreadsheet exercise.</p>

            <h2>Final Thoughts</h2>
            <p>Analytics only matters if you actually look at it and act on what you see. A correctly configured GA4 setup, checked regularly, takes the guesswork out of deciding what to improve next on your site. I set this up as part of every <a href="{{ route('services.seo-social-media-marketing') }}">SEO engagement</a> I run, so progress can actually be measured.</p>

            <h2>FAQs</h2>
            <h3>Is Google Analytics 4 free?</h3>
            <p>Yes, the standard version of GA4 is free for any website owner to use.</p>
            <h3>What happened to Universal Analytics?</h3>
            <p>Universal Analytics, the previous version, stopped processing data in 2024. GA4 is now the only active version of Google Analytics.</p>
            <h3>Do I need coding knowledge to set up GA4?</h3>
            <p>Basic setup using Google Tag Manager or a plugin generally requires no coding. More advanced custom event tracking benefits from a developer's help.</p>
            <h3>How long does it take for data to start showing up?</h3>
            <p>Basic traffic data usually appears within minutes to hours of installing the tracking code correctly. Some reports take 24 to 48 hours to fully populate.</p>
            <h3>Does GA4 work with WordPress as well as custom-built sites?</h3>
            <p>Yes — WordPress has plugins that simplify GA4 installation, while custom-built sites typically install it through Google Tag Manager or a direct code snippet in the site's layout.</p>
            <h3>Can I see which specific products or pages perform best?</h3>
            <p>Yes, GA4's engagement and monetization reports break performance down by individual page or product, which is useful for deciding what to promote further and what might need improvement.</p>
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
.post-content strong { color: var(--ink); font-weight: 700; }
.post-content a { color: var(--accent); text-decoration: underline; text-underline-offset: 3px; }
.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); }
@media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }
</style>
@endpush
