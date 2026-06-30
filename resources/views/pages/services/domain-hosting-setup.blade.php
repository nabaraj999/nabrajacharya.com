@extends('layouts.app')

@section('title', 'Domain & Hosting Setup in Nepal | ' . ($personal->brand_name ?? 'Nabaraj Acharya'))
@section('description', 'Getting your site online the right way the first time — domain registration, hosting setup, and DNS configuration.')
@section('keywords', 'domain registration nepal, web hosting setup nepal, dns configuration nepal, nabaraj acharya')
@section('canonical', route('services.domain-hosting-setup'))
@if($service->photo)
@section('og_image', asset('storage/'.$service->photo))
@section('twitter_image', asset('storage/'.$service->photo))
@section('og_image_alt', $service->service_name . ' in Nepal — ' . ($personal->brand_name ?? 'Nabaraj Acharya'))
@endif

@section('schema')
@php
    $serviceSchema = [
        '@context' => 'https://schema.org', '@type' => 'Service', 'name' => 'Domain & Hosting Setup',
        'provider' => ['@type' => 'Person', 'name' => $personal->brand_name ?? 'Nabaraj Acharya', 'url' => route('home')],
        'areaServed' => [['@type' => 'Country', 'name' => 'Nepal']],
        'url' => route('services.domain-hosting-setup'),
        'description' => 'Domain registration and hosting setup for businesses in Nepal.',
    ];
    $breadcrumbSchema = ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Domain & Hosting Setup', 'item' => route('services.domain-hosting-setup')],
    ]];
@endphp
<script type="application/ld+json">{!! json_encode($serviceSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')

<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">Domain &amp; Hosting Setup</h1>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a><span class="mx-1">&rsaquo;</span>
            <a href="{{ route('services') }}" class="hover:underline">Services</a><span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">Domain &amp; Hosting Setup</span>
        </p>
    </div>
</section>

@include('partials.services-hero-image')

<section class="py-12 md:py-16 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2">
                <p class="text-base md:text-lg leading-relaxed mb-8" style="color: var(--ink-dim);">
                    Getting your site online the right way the first time — domain registration, hosting setup, and DNS configuration, so email, SSL, and your website all work correctly from day one.
                </p>

                @php $quickAnswer = 'Domain and hosting setup is registering your website\'s address (the domain) and configuring the server it lives on (hosting), including DNS and SSL. I help businesses in Nepal get online correctly the first time, domain registration, hosting, DNS, and professional email, all configured properly.'; @endphp
                @include('partials.services-quick-answer')

                @if($personal && ($personal->years_experience || $personal->completed_projects))
                <div class="flex flex-wrap gap-3 mb-12">
                    @if($personal->years_experience)<span class="skill-badge !text-sm !py-2 !px-4"><strong style="color:var(--ink);">{{ $personal->years_experience }}+</strong>&nbsp;years experience</span>@endif
                    @if($personal->completed_projects)<span class="skill-badge !text-sm !py-2 !px-4"><strong style="color:var(--ink);">{{ $personal->completed_projects }}+</strong>&nbsp;projects delivered</span>@endif
                    <span class="skill-badge !text-sm !py-2 !px-4">DNS &amp; <strong style="color:var(--ink);">SSL Setup</strong></span>
                </div>
                @endif

                <h2 class="font-display text-2xl font-bold mb-6" style="color: var(--ink);">What's Included</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-12">
                    @foreach([
                        ['Domain Registration', 'Help picking and registering the right domain for your brand.'],
                        ['Hosting Setup', 'A hosting plan sized correctly for your site, configured from scratch.'],
                        ['DNS Configuration', 'Records set up correctly so your domain, email, and site all resolve properly.'],
                        ['SSL & Email Setup', 'HTTPS and professional email addresses working from day one.'],
                    ] as [$title, $desc])
                    <div class="glass-card p-6">
                        <h3 class="font-display text-base font-bold mb-1.5" style="color: var(--ink);">{{ $title }}</h3>
                        <p class="text-sm leading-relaxed" style="color: var(--ink-dim);">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>

                @php
                    $tableTitle = "What's Involved in Getting Online?";
                    $tableRows = [
                        ['Domain Registration', "New businesses without a domain yet", 'Domain registrars, WHOIS setup'],
                        ['Hosting Setup', 'Sites needing a server to live on', 'VPS/shared hosting configuration'],
                        ['DNS Configuration', 'Connecting a domain to hosting and email', 'DNS records, nameservers'],
                        ['SSL & Email', 'Making the site secure and email professional', 'SSL certificates, MX records'],
                    ];
                @endphp
                @include('partials.services-table')

                @include('partials.services-why-me')

                @php
                    $faqs = [
                        ['Do I need to buy my own domain?', 'You can, or I can guide you through registering one — either way, you retain full ownership of your domain.'],
                        ['What hosting do you recommend?', 'It depends on the site — a small business site has very different hosting needs than a high-traffic application. I size this to your project.'],
                        ['Will my email work with my domain?', 'Yes, professional email (like you@yourdomain.com) is part of the setup.'],
                        ['Can you move my site to a different host?', "Yes, that's covered under website migration work within this service."],
                        ['How long does domain and hosting setup take?', "Domain registration and basic hosting setup can usually be completed within 1-2 business days, though DNS changes can take up to 24-48 hours to fully propagate worldwide."],
                        ['What is the difference between shared hosting and a VPS?', "Shared hosting is cheaper and fine for small sites with moderate traffic, but you share server resources with other sites. A VPS gives you dedicated resources, better performance, and more control — recommended for business-critical or high-traffic sites."],
                        ['Do I own my domain, or do you?', "You always own the domain — it's registered under your name and contact details. I configure it for you, but ownership and renewal control stay entirely with you."],
                        ["What happens if I don't renew my domain or hosting?", "If a domain expires, your site and email stop working, and after a grace period the domain can become available for anyone else to register. I can help set up renewal reminders so this doesn't happen."],
                        ['Can you set up a subdomain for a specific part of my site?', "Yes, subdomains (like shop.yoursite.com or blog.yoursite.com) are straightforward to configure as part of DNS setup."],
                        ['Is SSL really necessary for a small business website?', "Yes — without SSL, browsers flag your site as 'not secure,' which damages trust, and Google also factors HTTPS into search rankings. It's included as standard in every setup I do."],
                        ['Can you help if my current hosting is already causing problems?', "Yes, I can audit your current hosting setup, identify what's causing slowdowns or downtime, and migrate you to a more reliable host if needed."],
                        ['Do you handle hosting renewals and ongoing management?', "Initial setup is a one-time service, but ongoing hosting management and renewals can be covered under my Website Support & Maintenance plans if you'd prefer not to manage it yourself."],
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

@include('partials.services-cta', ['heading' => 'domain and hosting'])

@endsection

@push('styles')
<style>.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); } @media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }</style>
@endpush
