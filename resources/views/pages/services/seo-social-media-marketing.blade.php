@extends('layouts.app')

@section('title', 'SEO Specialist in Nepal | SEO &amp; Social Media Marketing | ' . ($personal->brand_name ?? 'Nabaraj Acharya'))
@section('description', 'SEO specialist in Nepal offering technical SEO, on-page optimization, Meta Ads, Google Ads (PPC), and content marketing for businesses in Kathmandu, Lalitpur, and beyond.')
@section('keywords', 'seo specialist in nepal, seo expert nepal, seo company in nepal, social media marketing nepal, ppc ads nepal, meta ads nepal, content marketing nepal, nabaraj acharya')
@section('canonical', route('services.seo-social-media-marketing'))

@section('schema')
@php
    $serviceSchema = [
        '@context' => 'https://schema.org', '@type' => 'Service', 'name' => 'SEO & Social Media Marketing',
        'provider' => ['@type' => 'Person', 'name' => $personal->brand_name ?? 'Nabaraj Acharya', 'url' => route('home')],
        'areaServed' => [['@type' => 'Country', 'name' => 'Nepal'], ['@type' => 'City', 'name' => 'Lalitpur'], ['@type' => 'City', 'name' => 'Kathmandu']],
        'url' => route('services.seo-social-media-marketing'),
        'description' => 'SEO specialist in Nepal offering technical SEO, on-page optimization, Meta Ads, Google Ads, and content marketing.',
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog', 'name' => 'SEO & Marketing Packages',
            'itemListElement' => [
                ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Starter SEO']],
                ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Growth SEO + Ads']],
                ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Authority SEO + Marketing']],
            ],
        ],
    ];
    $breadcrumbSchema = ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'SEO & Social Media Marketing', 'item' => route('services.seo-social-media-marketing')],
    ]];
@endphp
<script type="application/ld+json">{!! json_encode($serviceSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')

<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">SEO Specialist in Nepal — SEO &amp; Social Media Marketing</h1>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a><span class="mx-1">&rsaquo;</span>
            <a href="{{ route('services') }}" class="hover:underline">Services</a><span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">SEO &amp; Social Media Marketing</span>
        </p>
    </div>
</section>

@include('partials.services-hero-image')

<section class="py-12 md:py-16 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2">
                <p class="text-base md:text-lg leading-relaxed mb-4" style="color: var(--ink-dim);">
                    I work as an <strong style="color: var(--ink);">SEO specialist in Nepal</strong>, helping businesses in Kathmandu, Lalitpur, and beyond grow online through Search Engine Optimization (SEO) and Social Media Marketing (SMM). Every site I build or audit gets the same attention to technical SEO that I'd want for my own.
                </p>
                <p class="text-base md:text-lg leading-relaxed mb-8" style="color: var(--ink-dim);">
                    Beyond organic SEO, I also manage <strong style="color: var(--ink);">Meta Ads</strong> (Facebook &amp; Instagram), <strong style="color: var(--ink);">Google Ads / PPC</strong> campaigns, and <strong style="color: var(--ink);">content marketing</strong> — so search, social, and paid channels work together instead of as disconnected efforts.
                </p>

                @php $quickAnswer = 'SEO (Search Engine Optimization) is the practice of improving a website so it ranks higher in Google search results and attracts more organic traffic. As an SEO specialist in Nepal, I combine technical SEO, content strategy, and social media marketing, including Meta Ads and Google Ads (PPC), to grow visibility and leads.'; @endphp
                @include('partials.services-quick-answer')

                @if($personal && ($personal->years_experience || $personal->completed_projects))
                <div class="flex flex-wrap gap-3 mb-12">
                    @if($personal->years_experience)<span class="skill-badge !text-sm !py-2 !px-4"><strong style="color:var(--ink);">{{ $personal->years_experience }}+</strong>&nbsp;years experience</span>@endif
                    @if($personal->completed_projects)<span class="skill-badge !text-sm !py-2 !px-4"><strong style="color:var(--ink);">{{ $personal->completed_projects }}+</strong>&nbsp;projects delivered</span>@endif
                    <span class="skill-badge !text-sm !py-2 !px-4">Technical SEO &amp; <strong style="color:var(--ink);">Core Web Vitals</strong></span>
                </div>
                @endif

                <h2 class="font-display text-2xl font-bold mb-6" style="color: var(--ink);">What's Included</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-12">
                    @foreach([
                        ['Technical SEO Audit', 'Crawlability, site speed, structured data, and Core Web Vitals — fixed at the source.'],
                        ['Keyword Research', 'Finding the actual search terms your customers use, not just guesses.'],
                        ['On-Page Optimisation', 'Titles, meta descriptions, headings, and internal linking done properly.'],
                        ['Local SEO', 'Google Business Profile setup and local citations for Kathmandu and Lalitpur searches.'],
                        ['Meta Ads Management', 'Facebook and Instagram ad campaigns targeted to the customers most likely to convert.'],
                        ['Google Ads (PPC)', 'Search and display campaigns set up and optimised to control cost per lead.'],
                        ['Content Marketing', 'Blog posts and articles written to support your SEO and attract qualified traffic.'],
                        ['Monthly Reporting', 'Clear reporting on rankings, traffic, and conversions — no jargon, just what changed and why.'],
                    ] as [$title, $desc])
                    <div class="glass-card p-6">
                        <h3 class="font-display text-base font-bold mb-1.5" style="color: var(--ink);">{{ $title }}</h3>
                        <p class="text-sm leading-relaxed" style="color: var(--ink-dim);">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>

                @php
                    $packagesTitle = 'Monthly SEO & Marketing Packages';
                    $packages = [
                        [
                            'name' => 'Starter SEO',
                            'tagline' => 'For new or small sites establishing search presence',
                            'bullets' => [
                                'Technical SEO audit & fixes',
                                'On-page optimisation (up to 10 pages)',
                                'Google Business Profile setup',
                                'Monthly keyword tracking report',
                            ],
                        ],
                        [
                            'name' => 'Growth SEO + Ads',
                            'tagline' => 'For businesses ready to scale traffic and leads',
                            'featured' => true,
                            'bullets' => [
                                'Everything in Starter SEO',
                                'Ongoing content optimisation',
                                'Meta Ads (Facebook & Instagram) management',
                                'Monthly performance report with insights',
                            ],
                        ],
                        [
                            'name' => 'Authority SEO + Marketing',
                            'tagline' => 'Full SEO, paid ads, and content engine',
                            'bullets' => [
                                'Everything in Growth SEO + Ads',
                                'Google Ads (PPC) campaign management',
                                'Content marketing (blog posts & articles)',
                                'Dedicated monthly strategy call',
                            ],
                        ],
                    ];
                @endphp
                @include('partials.services-packages')

                <h2 class="font-display text-2xl font-bold mb-6" style="color: var(--ink);">What Results to Expect</h2>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-12">
                    @foreach([
                        ['Month 1-2', 'Technical foundation fixed: site speed, crawlability, structured data, and on-page basics in place.'],
                        ['Month 3-4', 'Initial movement on lower-competition keywords as content and structure improvements take effect.'],
                        ['Month 5-6+', 'Steadier organic traffic growth, with more competitive terms starting to improve alongside any paid campaigns.'],
                    ] as [$period, $desc])
                    <div class="glass-card p-6">
                        <span class="block font-display text-sm font-extrabold mb-2" style="color: var(--accent);">{{ $period }}</span>
                        <p class="text-sm leading-relaxed" style="color: var(--ink-dim);">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>
                <p class="text-xs mb-12" style="color: var(--ink-faint);">SEO timelines vary by competition and starting point — these are realistic ranges, not guarantees.</p>

                @php
                    $tableTitle = "What's Covered in an SEO Engagement?";
                    $tableRows = [
                        ['Technical SEO Audit', 'Sites with crawl errors, slow speed, or indexing issues', 'Core Web Vitals, structured data'],
                        ['Keyword & Content Strategy', 'Businesses wanting to rank for specific search terms', 'Keyword research, content briefs'],
                        ['On-Page Optimisation', 'Existing sites needing better titles, meta, structure', 'Meta tags, schema markup, internal linking'],
                        ['Local SEO', 'Businesses targeting a specific city or region in Nepal', 'Google Business Profile, local citations'],
                        ['Meta & Google Ads', 'Businesses wanting faster, paid visibility alongside SEO', 'Meta Ads Manager, Google Ads'],
                    ];
                @endphp
                @include('partials.services-table')

                @include('partials.services-why-me')

                @php
                    $faqs = [
                        ['How long does SEO take to show results?', 'Technical fixes can show impact within weeks, but meaningful ranking growth typically takes 3-6 months of consistent work.'],
                        ['Do you guarantee #1 rankings?', "No one honestly can. I focus on sustainable, white-hat improvements that build long-term visibility instead of risky shortcuts."],
                        ['Can you do SEO on a site you didn\'t build?', 'Yes, I regularly audit and improve websites built by other developers or agencies.'],
                        ['What\'s the difference between SEO and PPC ads?', 'SEO grows free, organic traffic over time. PPC (Google Ads) and Meta Ads get you visibility immediately, but stop once you stop paying. Most businesses benefit from both.'],
                        ['Do you write the content for content marketing?', 'Yes, I can write blog posts and articles aligned to your SEO keywords, or work from a strategy you provide.'],
                        ['Which package should I start with?', "If you're just establishing search presence, Starter SEO is the right entry point. If you already have a site getting some traffic and want to grow faster, Growth SEO + Ads is usually the better fit."],
                    ];
                @endphp
                @include('partials.services-faq')

                <a href="{{ route('contact') }}" class="btn-primary" data-magnetic data-cursor="link">
                    Discuss Your Project
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
            </div>

            @include('partials.services-sidebar')
        </div>
    </div>
</section>

@include('partials.services-cta', ['heading' => 'SEO and marketing'])

@endsection

@push('styles')
<style>.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); } @media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }</style>
@endpush
