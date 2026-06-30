@extends('layouts.app')

@section('title', 'API Development Services in Nepal | ' . ($personal->brand_name ?? 'Nabaraj Acharya'))
@section('description', 'Secure, well-documented REST API development connecting your web and mobile apps with clean architecture and reliable data flow.')
@section('keywords', 'api development nepal, rest api developer nepal, laravel api nepal, nabaraj acharya')
@section('canonical', route('services.api-development'))

@section('schema')
@php
    $serviceSchema = [
        '@context' => 'https://schema.org', '@type' => 'Service', 'name' => 'API Development',
        'provider' => ['@type' => 'Person', 'name' => $personal->brand_name ?? 'Nabaraj Acharya', 'url' => route('home')],
        'areaServed' => [['@type' => 'Country', 'name' => 'Nepal']],
        'url' => route('services.api-development'),
        'description' => 'Secure REST API development for web and mobile apps.',
    ];
    $breadcrumbSchema = ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'API Development', 'item' => route('services.api-development')],
    ]];
@endphp
<script type="application/ld+json">{!! json_encode($serviceSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')

<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">API Development</h1>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a><span class="mx-1">&rsaquo;</span>
            <a href="{{ route('services') }}" class="hover:underline">Services</a><span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">API Development</span>
        </p>
    </div>
</section>

@include('partials.services-hero-image')

<section class="py-12 md:py-16 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2">
                <p class="text-base md:text-lg leading-relaxed mb-8" style="color: var(--ink-dim);">
                    Secure, well-documented REST APIs that connect your web and mobile apps with clean architecture and reliable data flow — whether you need a new API from scratch or one that connects to systems you already run.
                </p>

                @php $quickAnswer = 'An API (Application Programming Interface) lets two systems, like your website and a mobile app, or your site and a payment provider, exchange data securely. I build and document secure REST APIs using Laravel, Sanctum, and Passport for businesses that need their systems to talk to each other.'; @endphp
                @include('partials.services-quick-answer')

                @if($personal && ($personal->years_experience || $personal->completed_projects))
                <div class="flex flex-wrap gap-3 mb-12">
                    @if($personal->years_experience)<span class="skill-badge !text-sm !py-2 !px-4"><strong style="color:var(--ink);">{{ $personal->years_experience }}+</strong>&nbsp;years experience</span>@endif
                    @if($personal->completed_projects)<span class="skill-badge !text-sm !py-2 !px-4"><strong style="color:var(--ink);">{{ $personal->completed_projects }}+</strong>&nbsp;projects delivered</span>@endif
                    <span class="skill-badge !text-sm !py-2 !px-4">Laravel <strong style="color:var(--ink);">Sanctum &amp; Passport</strong></span>
                </div>
                @endif

                <h2 class="font-display text-2xl font-bold mb-6" style="color: var(--ink);">What's Included</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-12">
                    @foreach([
                        ['RESTful API Design', 'Predictable, well-named endpoints that are easy for any client app to consume.'],
                        ['Authentication & Security', 'Token-based auth with Sanctum or Passport, rate limiting, and input validation.'],
                        ['Third-Party Integrations', 'Connecting your systems to payment gateways, SMS, email, or other external services.'],
                        ['Clear Documentation', 'Endpoint docs your team or another developer can actually follow.'],
                    ] as [$title, $desc])
                    <div class="glass-card p-6">
                        <h3 class="font-display text-base font-bold mb-1.5" style="color: var(--ink);">{{ $title }}</h3>
                        <p class="text-sm leading-relaxed" style="color: var(--ink-dim);">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>

                @php
                    $tableTitle = "What Kind of APIs Do I Build?";
                    $tableRows = [
                        ['Mobile App Backends', 'Apps needing accounts, data sync, and notifications', 'Laravel, Sanctum, REST'],
                        ['Third-Party Integrations', 'Connecting your site to payment, SMS, or email providers', 'Laravel HTTP client, webhooks'],
                        ['Public APIs', 'Letting partners or clients access your data securely', 'Laravel, API tokens, rate limiting'],
                        ['Internal Microservices', 'Splitting a large system into manageable services', 'Laravel, queues, REST/JSON'],
                    ];
                @endphp
                @include('partials.services-table')

                @include('partials.services-why-me')

                @php
                    $faqs = [
                        ['What authentication do you use for APIs?', 'Typically Laravel Sanctum for SPA/mobile apps, or Passport for more complex OAuth2 needs.'],
                        ['Can you document the API for my team?', 'Yes, I provide clear endpoint documentation so your team or another developer can integrate without guesswork.'],
                        ['Can you connect my API to an existing app?', 'Yes, whether the app already exists or is being built alongside the API.'],
                        ['How do you handle API security?', 'Token-based auth, rate limiting, input validation, and HTTPS as standard practice on every API I build.'],
                        ['Do you build REST APIs only, or GraphQL too?', "I primarily build REST APIs, since they're simpler to document, debug, and integrate for most business use cases. GraphQL can be discussed if your project specifically calls for it."],
                        ['Can you version my API as it grows?', "Yes, I structure endpoints so new versions (v1, v2, etc.) can be introduced without breaking existing client apps that depend on the older version."],
                        ['What format does the API return data in?', "JSON, the standard format for REST APIs, with consistent response structures and clear error messages so client apps can handle them predictably."],
                        ['Can you integrate payment gateways into my API?', "Yes, I've integrated payment providers like eSewa, Khalti, and Stripe into Laravel APIs, including webhook handling for payment confirmations."],
                        ['Do you provide a Postman collection or similar testing tool?', "Yes, I can provide a Postman collection alongside written documentation so your team can test every endpoint without writing code first."],
                        ['How do you handle rate limiting and abuse prevention?', "Laravel's built-in throttle middleware limits requests per user or IP, and I configure sensible limits based on your expected traffic to prevent abuse without blocking real users."],
                        ['Can the API support both a web app and a mobile app at the same time?', "Yes, a well-designed REST API is client-agnostic — the same endpoints can serve your website, a mobile app, and third-party integrations simultaneously."],
                        ['What happens if my API needs change after launch?', "Since the API is documented and versioned, new endpoints or fields can usually be added without disrupting existing integrations already in production."],
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

@include('partials.services-cta', ['heading' => 'API'])

@endsection

@push('styles')
<style>.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); } @media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }</style>
@endpush
