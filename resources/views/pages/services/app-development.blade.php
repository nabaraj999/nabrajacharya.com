@extends('layouts.app')

@section('title', 'App Development in Nepal | ' . ($personal->brand_name ?? 'Nabaraj Acharya'))
@section('description', 'Modern, fast, and user-friendly mobile and web-based application development for businesses in Nepal.')
@section('keywords', 'app development nepal, mobile app developer nepal, android app development nepal, nabaraj acharya')
@section('canonical', route('services.app-development'))

@section('schema')
@php
    $serviceSchema = [
        '@context' => 'https://schema.org', '@type' => 'Service', 'name' => 'App Development',
        'provider' => ['@type' => 'Person', 'name' => $personal->brand_name ?? 'Nabaraj Acharya', 'url' => route('home')],
        'areaServed' => [['@type' => 'Country', 'name' => 'Nepal']],
        'url' => route('services.app-development'),
        'description' => 'Mobile and web-based application development for businesses in Nepal.',
    ];
    $breadcrumbSchema = ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'App Development', 'item' => route('services.app-development')],
    ]];
@endphp
<script type="application/ld+json">{!! json_encode($serviceSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')

<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">App Development</h1>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a><span class="mx-1">&rsaquo;</span>
            <a href="{{ route('services') }}" class="hover:underline">Services</a><span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">App Development</span>
        </p>
    </div>
</section>

@include('partials.services-hero-image')

<section class="py-12 md:py-16 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2">
                <p class="text-base md:text-lg leading-relaxed mb-8" style="color: var(--ink-dim);">
                    Bring your ideas to life with modern, fast, and user-friendly applications. I develop Android and web-based applications designed to solve real-world problems and enhance business productivity, backed by a Laravel API where one is needed.
                </p>

                @php $quickAnswer = 'App development is the process of building mobile or web-based applications that solve a specific problem for users or a business. I build Android and progressive web apps backed by a Laravel API, designed for real-world business use in Nepal and abroad.'; @endphp
                @include('partials.services-quick-answer')

                @if($personal && ($personal->years_experience || $personal->completed_projects))
                <div class="flex flex-wrap gap-3 mb-12">
                    @if($personal->years_experience)<span class="skill-badge !text-sm !py-2 !px-4"><strong style="color:var(--ink);">{{ $personal->years_experience }}+</strong>&nbsp;years experience</span>@endif
                    @if($personal->completed_projects)<span class="skill-badge !text-sm !py-2 !px-4"><strong style="color:var(--ink);">{{ $personal->completed_projects }}+</strong>&nbsp;projects delivered</span>@endif
                    <span class="skill-badge !text-sm !py-2 !px-4">Android &amp; <strong style="color:var(--ink);">Web Apps</strong></span>
                </div>
                @endif

                <h2 class="font-display text-2xl font-bold mb-6" style="color: var(--ink);">What's Included</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-12">
                    @foreach([
                        ['Android & Web Apps', 'Native-feeling Android apps and responsive web apps from one connected codebase.'],
                        ['API-Backed Architecture', 'A Laravel API behind the scenes so your app can grow without a rebuild.'],
                        ['Clean, Practical UI/UX', 'Interfaces designed around how people actually use the app, not just how it looks.'],
                        ['Real-World Testing', 'Checked across devices and connection speeds before anything ships.'],
                    ] as [$title, $desc])
                    <div class="glass-card p-6">
                        <h3 class="font-display text-base font-bold mb-1.5" style="color: var(--ink);">{{ $title }}</h3>
                        <p class="text-sm leading-relaxed" style="color: var(--ink-dim);">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>

                @php
                    $tableTitle = "What Kind of Apps Do I Build?";
                    $tableRows = [
                        ['Android Apps', 'Businesses wanting a dedicated mobile presence', 'Android (Java/Kotlin), REST APIs'],
                        ['Progressive Web Apps', 'Teams wanting an app-like experience without app stores', 'Laravel, JavaScript, responsive UI'],
                        ['Internal Business Apps', 'Companies needing tools for staff or operations', 'Laravel, Vue.js/Alpine.js, MySQL'],
                        ['API-Connected Apps', 'Apps that need to talk to an existing system', 'Laravel API, Sanctum/Passport'],
                    ];
                @endphp
                @include('partials.services-table')

                @include('partials.services-why-me')

                @php
                    $faqs = [
                        ['Do you build apps for both Android and iOS?', 'My core focus is Android and web-based/progressive apps; for iOS I can scope the project together with the right specialist if needed.'],
                        ['Will my app need a backend?', 'Most apps need one for data, accounts, and updates — I build that as a Laravel API alongside the app.'],
                        ['Can you maintain the app after launch?', 'Yes, ongoing support is covered under my Website Support & Maintenance service, which also applies to apps.'],
                        ['How much does an app cost?', "It depends on features and complexity. Share your requirements via the contact page and I'll give you a realistic estimate."],
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

@include('partials.services-cta', ['heading' => 'app'])

@endsection

@push('styles')
<style>.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); } @media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }</style>
@endpush
