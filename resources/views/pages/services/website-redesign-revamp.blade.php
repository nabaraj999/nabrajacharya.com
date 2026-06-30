@extends('layouts.app')

@section('title', 'Website Redesign & Revamp in Nepal | ' . ($personal->brand_name ?? 'Nabaraj Acharya'))
@section('description', 'Website redesign services in Nepal — modernizing outdated websites with improved UX, faster load times, and mobile-first layouts that convert better, for Lalitpur and Kathmandu businesses.')
@section('keywords', 'website redesign, website redesign nepal, website revamp nepal, website redesign lalitpur, website redesign kathmandu, nabaraj acharya')
@section('canonical', route('services.website-redesign-revamp'))
@if($service->photo)
@section('og_image', asset('storage/'.$service->photo))
@section('twitter_image', asset('storage/'.$service->photo))
@section('og_image_alt', $service->service_name . ' in Nepal — ' . ($personal->brand_name ?? 'Nabaraj Acharya'))
@endif

@section('schema')
@php
    $serviceSchema = [
        '@context' => 'https://schema.org', '@type' => 'Service', 'name' => 'Website Redesign & Revamp',
        'provider' => ['@type' => 'Person', 'name' => $personal->brand_name ?? 'Nabaraj Acharya', 'url' => route('home')],
        'areaServed' => [['@type' => 'Country', 'name' => 'Nepal']],
        'url' => route('services.website-redesign-revamp'),
        'description' => 'Modernizing outdated websites for businesses in Nepal.',
    ];
    $breadcrumbSchema = ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Website Redesign & Revamp', 'item' => route('services.website-redesign-revamp')],
    ]];
@endphp
<script type="application/ld+json">{!! json_encode($serviceSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')

<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">Website Redesign &amp; Revamp</h1>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a><span class="mx-1">&rsaquo;</span>
            <a href="{{ route('services') }}" class="hover:underline">Services</a><span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">Website Redesign &amp; Revamp</span>
        </p>
    </div>
</section>

@include('partials.services-hero-image')

<section class="py-12 md:py-16 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2">
                <p class="text-base md:text-lg leading-relaxed mb-8" style="color: var(--ink-dim);">
                    Modernising outdated websites with improved UX, faster load times, and mobile-first layouts that convert better — keeping the content and SEO value you've already built while fixing what's holding the site back.
                </p>

                @php $quickAnswer = 'A website redesign is the process of rebuilding an outdated site\'s design, structure, and performance while keeping the content and SEO value already built. I modernise slow, dated, or poorly converting websites in Nepal with mobile-first layouts and improved Core Web Vitals.'; @endphp
                @include('partials.services-quick-answer')

                @if($personal && ($personal->years_experience || $personal->completed_projects))
                <div class="flex flex-wrap gap-3 mb-12">
                    @if($personal->years_experience)<span class="skill-badge !text-sm !py-2 !px-4"><strong style="color:var(--ink);">{{ $personal->years_experience }}+</strong>&nbsp;years experience</span>@endif
                    @if($personal->completed_projects)<span class="skill-badge !text-sm !py-2 !px-4"><strong style="color:var(--ink);">{{ $personal->completed_projects }}+</strong>&nbsp;projects delivered</span>@endif
                    <span class="skill-badge !text-sm !py-2 !px-4">Mobile-First <strong style="color:var(--ink);">Redesigns</strong></span>
                </div>
                @endif

                <h2 class="font-display text-2xl font-bold mb-6" style="color: var(--ink);">What's Included</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-12">
                    @foreach([
                        ['UX Audit', 'A clear look at where visitors get confused or drop off, before any redesign work starts.'],
                        ['Visual Refresh', 'A cleaner, more current look that still feels like your brand.'],
                        ['Mobile-First Layouts', 'Rebuilt to work properly on phones first, not as an afterthought.'],
                        ['Speed & Core Web Vitals', 'Faster load times that help both users and search rankings.'],
                    ] as [$title, $desc])
                    <div class="glass-card p-6">
                        <h3 class="font-display text-base font-bold mb-1.5" style="color: var(--ink);">{{ $title }}</h3>
                        <p class="text-sm leading-relaxed" style="color: var(--ink-dim);">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>

                @php
                    $packagesTitle = 'Redesign Engagement Options';
                    $packages = [
                        [
                            'name' => 'Visual Refresh',
                            'tagline' => 'Updated look, same structure and platform',
                            'price' => 'NPR 40,000 – 80,000',
                            'priceNote' => 'one-time',
                            'bullets' => [
                                'Visual redesign of existing pages',
                                'Mobile-first layout fixes',
                                'Basic performance cleanup',
                                'Content carried over as-is',
                            ],
                        ],
                        [
                            'name' => 'Full Redesign',
                            'tagline' => 'UX audit, visual refresh, and SEO preservation',
                            'price' => 'NPR 90,000 – 1,80,000',
                            'priceNote' => 'one-time',
                            'featured' => true,
                            'bullets' => [
                                'Everything in Visual Refresh',
                                'UX audit & restructured navigation',
                                'SEO value preserved with redirects',
                                'Core Web Vitals optimisation',
                            ],
                        ],
                        [
                            'name' => 'Redesign + Replatform',
                            'tagline' => 'New design on a new technical foundation',
                            'price' => 'NPR 2,00,000+',
                            'priceNote' => 'one-time, scoped per project',
                            'bullets' => [
                                'Everything in Full Redesign',
                                'Migration to a new platform if needed',
                                'Full content & URL migration plan',
                                'Post-launch monitoring',
                            ],
                        ],
                    ];
                @endphp
                @include('partials.services-packages')

                @php
                    $tableTitle = "Is a Redesign Right for You?";
                    $tableRows = [
                        ['Outdated Visual Design', 'Sites that look dated compared to competitors', 'Modern UI, updated branding'],
                        ['Poor Mobile Experience', "Sites that don't work well on phones", 'Mobile-first rebuild'],
                        ['Slow Load Times', 'Sites with heavy, unoptimised pages', 'Performance audit, asset optimisation'],
                        ['Low Conversion Rates', 'Sites getting traffic but few enquiries or sales', 'UX audit, clearer calls-to-action'],
                    ];
                @endphp
                @include('partials.services-table')

                @include('partials.services-why-me')

                @php
                    $faqs = [
                        ['Will I lose my current SEO rankings?', 'No — I preserve URLs, content, and SEO value wherever possible, and set up redirects where structure has to change.'],
                        ['Do you redesign sites built on other platforms?', 'Yes, including WordPress, Wix, Squarespace, and custom-built sites.'],
                        ['How much content can stay the same?', "As much as makes sense — a redesign is about improving structure and experience, not throwing away what already works."],
                        ["Can you redesign just part of my site?", "Yes, for example just the homepage or a key landing page, if a full rebuild isn't needed."],
                        ['How do I know if I need a redesign or a full rebuild?', "If the underlying platform is solid but the design and UX feel dated, a redesign is usually enough. If the codebase itself is fragile, insecure, or impossible to extend, a rebuild is the better long-term choice."],
                        ['How long does a website redesign take?', "Most redesigns take 3-6 weeks depending on the number of pages and how much structural change is needed underneath."],
                        ['Will the redesigned site still work with my existing CMS or hosting?', "In most cases yes — a redesign typically focuses on the front-end experience while keeping the existing platform, unless the platform itself is part of the problem."],
                        ['What if I just want a faster site without changing the design?', "That's possible too — performance work like image optimization, caching, and code cleanup can often be done without a full visual redesign."],
                        ['Can you keep my existing branding during the redesign?', "Yes, a redesign typically refreshes layout, UX, and performance while keeping your existing brand identity — colors, logo, and tone — recognizable to returning visitors."],
                        ['Do you provide a before-and-after comparison of site performance?', "Yes, I can show Core Web Vitals and load time comparisons before and after the redesign so you can see the measurable impact."],
                        ['Will old links to my website still work after the redesign?', "Yes, I set up proper redirects for any URLs that change, so existing links, bookmarks, and search engine rankings aren't broken."],
                        ["Can the redesign include new features I didn't have before?", "Yes, a redesign is a good opportunity to add features like a blog, contact forms, or e-commerce that the original site lacked."],
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

@include('partials.services-cta', ['heading' => 'redesign'])

@endsection

@push('styles')
<style>.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); } @media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }</style>
@endpush
