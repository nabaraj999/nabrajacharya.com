@extends('layouts.app')

@section('title', 'Web Development Nepal | Web Developer in Nepal | ' . ($personal->brand_name ?? 'Nabaraj Acharya'))
@section('description', 'Web development in Nepal by a Laravel-focused web developer in Nepal — responsive, fast, SEO-friendly websites and web applications for Lalitpur, Kathmandu, and beyond.')
@section('keywords', 'web development nepal, web developer nepal, web development in lalitpur, laravel developer nepal, website development kathmandu, nabaraj acharya')
@section('canonical', route('services.web-development'))
@if($service->photo)
@section('og_image', asset('storage/'.$service->photo))
@section('twitter_image', asset('storage/'.$service->photo))
@section('og_image_alt', $service->service_name . ' in Nepal — ' . ($personal->brand_name ?? 'Nabaraj Acharya'))
@endif

@section('schema')
@php
    $serviceSchema = [
        '@context' => 'https://schema.org', '@type' => 'Service', 'name' => 'Web Development',
        'provider' => ['@type' => 'Person', 'name' => $personal->brand_name ?? 'Nabaraj Acharya', 'url' => route('home')],
        'areaServed' => [['@type' => 'Country', 'name' => 'Nepal']],
        'url' => route('services.web-development'),
        'description' => 'Custom Laravel and PHP web development for businesses in Nepal.',
    ];
    $breadcrumbSchema = ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Web Development', 'item' => route('services.web-development')],
    ]];
@endphp
<script type="application/ld+json">{!! json_encode($serviceSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')

<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">Web Development Nepal — Web Developer in Nepal</h1>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a><span class="mx-1">&rsaquo;</span>
            <a href="{{ route('services') }}" class="hover:underline">Services</a><span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">Web Development</span>
        </p>
    </div>
</section>

@include('partials.services-hero-image')

<section class="py-12 md:py-16 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2">
                <p class="text-base md:text-lg leading-relaxed mb-4" style="color: var(--ink-dim);">
                    I offer <strong style="color: var(--ink);">web development in Nepal</strong> as a Laravel-focused <strong style="color: var(--ink);">web developer in Nepal</strong>, based in Lalitpur and working with clients across Kathmandu and abroad. I design and build modern, responsive, and SEO-friendly websites using HTML, CSS, JavaScript, PHP, and Laravel.
                </p>
                <p class="text-base md:text-lg leading-relaxed mb-8" style="color: var(--ink-dim);">
                    Whether you need a personal portfolio, a company website, or a dynamic web application, I focus on clean code, elegant UI/UX, and fast performance from the first line of code.
                </p>

                @php $quickAnswer = 'Web development is the process of designing, building, and maintaining a website or web application, from the visual interface to the backend logic that powers it. I build custom websites and web apps in Nepal using Laravel and PHP, focused on performance and search visibility for clients in Kathmandu, Lalitpur, and beyond.'; @endphp
                @include('partials.services-quick-answer')

                @if($personal && ($personal->years_experience || $personal->completed_projects))
                <div class="flex flex-wrap gap-3 mb-12">
                    @if($personal->years_experience)<span class="skill-badge !text-sm !py-2 !px-4"><strong style="color:var(--ink);">{{ $personal->years_experience }}+</strong>&nbsp;years experience</span>@endif
                    @if($personal->completed_projects)<span class="skill-badge !text-sm !py-2 !px-4"><strong style="color:var(--ink);">{{ $personal->completed_projects }}+</strong>&nbsp;projects delivered</span>@endif
                    <span class="skill-badge !text-sm !py-2 !px-4">Built with <strong style="color:var(--ink);">Laravel &amp; PHP</strong></span>
                </div>
                @endif

                <h2 class="font-display text-2xl font-bold mb-6" style="color: var(--ink);">What's Included</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-12">
                    @foreach([
                        ['Custom Laravel Builds', 'Hand-coded applications built around your actual workflow, not a bloated theme.'],
                        ['Responsive by Default', 'Every page is tested and tuned to work cleanly on phones, tablets, and desktops.'],
                        ['Admin-Friendly CMS', 'A simple back office so you can update content without calling a developer.'],
                        ['Performance Tuning', 'Optimised queries, caching, and asset loading so pages load fast.'],
                    ] as [$title, $desc])
                    <div class="glass-card p-6">
                        <h3 class="font-display text-base font-bold mb-1.5" style="color: var(--ink);">{{ $title }}</h3>
                        <p class="text-sm leading-relaxed" style="color: var(--ink-dim);">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>

                @php
                    $packagesTitle = 'Web Development Engagement Options';
                    $packages = [
                        [
                            'name' => 'Starter Website',
                            'tagline' => 'Brochure or portfolio sites, up to 5 pages',
                            'price' => 'NPR 25,000 – 50,000',
                            'priceNote' => 'one-time',
                            'bullets' => [
                                'Custom-designed, responsive layout',
                                'Up to 5 pages of content',
                                'Basic on-page SEO setup',
                                'Contact form & Google Maps',
                            ],
                        ],
                        [
                            'name' => 'Business Website',
                            'tagline' => 'Custom design, CMS, and SEO foundation',
                            'price' => 'NPR 60,000 – 1,20,000',
                            'priceNote' => 'one-time',
                            'featured' => true,
                            'bullets' => [
                                'Everything in Starter Website',
                                'Up to 15 pages, admin-friendly CMS',
                                'Technical SEO setup & schema markup',
                                'Blog/news section included',
                            ],
                        ],
                        [
                            'name' => 'Web Application',
                            'tagline' => 'Custom Laravel app with accounts & dashboard',
                            'price' => 'NPR 1,50,000+',
                            'priceNote' => 'one-time, scoped per project',
                            'bullets' => [
                                'Custom Laravel application',
                                'User accounts & admin dashboard',
                                'Database design & REST API',
                                'Ongoing support available',
                            ],
                        ],
                    ];
                @endphp
                @include('partials.services-packages')

                @php
                    $tableTitle = "What Kind of Websites Do I Build?";
                    $tableRows = [
                        ['Business Websites', 'Companies, agencies, consultancies needing an online presence', 'Laravel, Bootstrap, MySQL'],
                        ['Portfolio & Personal Sites', 'Freelancers, professionals, creatives', 'Laravel, Tailwind CSS'],
                        ['Custom Web Applications', 'Internal tools, dashboards, admin panels', 'Laravel, REST APIs, Alpine.js'],
                        ['News & Content Sites', 'Blogs, media, content publishers', 'Laravel CMS, SEO architecture'],
                    ];
                @endphp
                @include('partials.services-table')

                @include('partials.services-why-me')

                @php
                    $faqs = [
                        ['How long does a custom website take to build?', 'Most business websites take 2-4 weeks. Complex web applications can take 6-12 weeks depending on scope.'],
                        ['Do you provide hosting and domain setup too?', "Yes, I can help with domain registration and hosting setup as a separate service, or just hand over a deployment-ready build if you already have hosting."],
                        ['Will my website be mobile-friendly?', 'Every site I build is tested across phones, tablets, and desktops before launch.'],
                        ['Can you redesign my existing website instead of building from scratch?', 'Yes, that falls under my Website Redesign & Revamp service — I can review your current site and suggest the best approach.'],
                        ['What technologies do you use to build websites?', 'I build primarily with Laravel, PHP, MySQL, Tailwind CSS, and Alpine.js — a stack that is fast, secure, and easy to maintain long-term.'],
                        ['Do I need to provide content and images, or can you help with that?', "You can provide your own content, or I can help structure and write placeholder copy you can refine later. I'll guide you on what's needed for each page."],
                        ['Will my website rank on Google?', "Every site I build follows on-page SEO best practices from the start — clean URLs, proper headings, fast load times, and schema markup — which gives you a strong technical foundation to rank on."],
                        ['Can you build an e-commerce store as part of this service?', "Yes, smaller stores can be built under Web Development, but larger catalogs or complex checkout flows are better suited to my dedicated E-Commerce Development service."],
                        ['Do you offer ongoing support after the website launches?', "Yes, I offer maintenance and support plans for bug fixes, updates, and small content changes after launch — see the Website Support & Maintenance service for details."],
                        ['How much does a custom website cost?', "Pricing depends on scope — a Starter Website costs less than a full Business Website or custom Web Application. I'll give you a clear quote after understanding your requirements."],
                        ["Will I be able to update the website myself after it's built?", "Yes, business and application builds include an admin-friendly CMS so you can update text, images, and basic content without needing a developer for every change."],
                        ['What if I need extra features later, like a booking system or a member area?', "Laravel applications are built to scale, so new features like bookings, member areas, or integrations can usually be added later without rebuilding the site from scratch."],
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

@include('partials.services-cta', ['heading' => 'web development'])

@endsection

@push('styles')
<style>.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); } @media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }</style>
@endpush
