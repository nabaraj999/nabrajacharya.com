@extends('layouts.app')

@section('title', 'Ecommerce Website Development in Nepal | ' . ($personal->brand_name ?? 'Nabaraj Acharya'))
@section('description', 'Ecommerce website development in Nepal — custom Laravel-based online stores with secure payment gateways, inventory management, and conversion-focused design for Lalitpur and Kathmandu businesses.')
@section('keywords', 'ecommerce website development in nepal, ecommerce development nepal, online store developer nepal, laravel ecommerce nepal, ecommerce website lalitpur, nabaraj acharya')
@section('canonical', route('services.e-commerce-development'))
@if($service->photo)
@section('og_image', asset('storage/'.$service->photo))
@section('twitter_image', asset('storage/'.$service->photo))
@section('og_image_alt', $service->service_name . ' in Nepal — ' . ($personal->brand_name ?? 'Nabaraj Acharya'))
@endif

@section('schema')
@php
    $serviceSchema = [
        '@context' => 'https://schema.org', '@type' => 'Service', 'name' => 'E-commerce Development',
        'provider' => ['@type' => 'Person', 'name' => $personal->brand_name ?? 'Nabaraj Acharya', 'url' => route('home')],
        'areaServed' => [['@type' => 'Country', 'name' => 'Nepal']],
        'url' => route('services.e-commerce-development'),
        'description' => 'Custom online stores built on Laravel for businesses in Nepal.',
    ];
    $breadcrumbSchema = ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'E-commerce Development', 'item' => route('services.e-commerce-development')],
    ]];
@endphp
<script type="application/ld+json">{!! json_encode($serviceSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')

<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">Ecommerce Website Development in Nepal</h1>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a><span class="mx-1">&rsaquo;</span>
            <a href="{{ route('services') }}" class="hover:underline">Services</a><span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">E-commerce Development</span>
        </p>
    </div>
</section>

@include('partials.services-hero-image')

<section class="py-12 md:py-16 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2">
                <p class="text-base md:text-lg leading-relaxed mb-8" style="color: var(--ink-dim);">
                    I provide <strong style="color: var(--ink);">ecommerce website development in Nepal</strong> for businesses in Lalitpur, Kathmandu, and beyond — custom online stores built on Laravel, with secure payment gateways, inventory management, and conversion-focused design, built around how you actually sell, not a one-size-fits-all template.
                </p>

                @php $quickAnswer = 'E-commerce development is building an online store that lets customers browse, buy, and pay securely. I build custom Laravel-based e-commerce websites for businesses in Nepal with eSewa, Khalti, and Stripe integration, covering everything from product catalogues to order management.'; @endphp
                @include('partials.services-quick-answer')

                @if($personal && ($personal->years_experience || $personal->completed_projects))
                <div class="flex flex-wrap gap-3 mb-12">
                    @if($personal->years_experience)<span class="skill-badge !text-sm !py-2 !px-4"><strong style="color:var(--ink);">{{ $personal->years_experience }}+</strong>&nbsp;years experience</span>@endif
                    @if($personal->completed_projects)<span class="skill-badge !text-sm !py-2 !px-4"><strong style="color:var(--ink);">{{ $personal->completed_projects }}+</strong>&nbsp;projects delivered</span>@endif
                    <span class="skill-badge !text-sm !py-2 !px-4">eSewa, Khalti &amp; <strong style="color:var(--ink);">Stripe</strong></span>
                </div>
                @endif

                <h2 class="font-display text-2xl font-bold mb-6" style="color: var(--ink);">What's Included</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-12">
                    @foreach([
                        ['Product & Inventory', 'Catalogue, variants, and stock tracking that stays accurate as you grow.'],
                        ['Payment Gateways', 'eSewa, Khalti, and card payments wired up correctly and securely.'],
                        ['Cart & Checkout Flow', 'A smooth, low-friction checkout that doesn\'t lose sales at the last step.'],
                        ['Order Management', 'A clear back office to track, fulfil, and follow up on every order.'],
                    ] as [$title, $desc])
                    <div class="glass-card p-6">
                        <h3 class="font-display text-base font-bold mb-1.5" style="color: var(--ink);">{{ $title }}</h3>
                        <p class="text-sm leading-relaxed" style="color: var(--ink-dim);">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>

                @php
                    $tableTitle = "What Kind of Stores Do I Build?";
                    $tableRows = [
                        ['Small Online Stores', 'New businesses launching their first store', 'Laravel, eSewa/Khalti, basic catalogue'],
                        ['Growing Product Catalogues', 'Stores with variants, categories, and stock tracking', 'Laravel, MySQL, inventory logic'],
                        ['Subscription Stores', 'Businesses selling subscriptions or memberships', 'Laravel, recurring billing logic'],
                        ['Multi-Vendor Marketplaces', 'Platforms hosting multiple sellers', 'Laravel, scoped permissions, payouts'],
                    ];
                @endphp
                @include('partials.services-table')

                @include('partials.services-why-me')

                @php
                    $faqs = [
                        ['Which payment gateways do you support?', 'eSewa and Khalti for Nepal, plus Stripe and PayPal for international payments.'],
                        ['Can you migrate my existing store to a new platform?', 'Yes, including products, customers, and order history where the source platform allows export.'],
                        ['Will I be able to manage products myself?', 'Yes, you get an admin area to add, edit, and manage products without needing a developer.'],
                        ['Do you handle shipping and tax setup?', 'Yes, shipping rules and tax calculation are configured as part of the build based on how you operate.'],
                        ['How long does it take to build an online store?', 'A store with a standard product catalogue typically takes 4-6 weeks. Stores with custom features like subscriptions or multi-vendor support can take 8-12 weeks.'],
                        ['Can the store handle a large number of products?', "Yes, the Laravel and MySQL foundation is built to scale — stores with thousands of products and variants run smoothly when the database and search are structured correctly from the start."],
                        ['Do you build mobile-friendly checkout flows?', "Yes, every checkout I build is tested across phones and tablets, since a large share of online shopping in Nepal happens on mobile."],
                        ['Can customers track their orders after purchase?', "Yes, customer accounts can include order history and status tracking, so buyers can see exactly where their order is without contacting you directly."],
                        ['What happens if a payment fails or is interrupted?', "Payment gateway integrations are built with proper webhook handling so failed or interrupted payments are detected and don't leave orders in a broken state."],
                        ['Can I run discounts, coupons, or sales on my store?', "Yes, discount codes, percentage-off sales, and promotional pricing can be built into the store's checkout logic."],
                        ['Do you provide SEO for product pages?', "Yes, product and category pages are built with clean URLs, structured data, and on-page SEO basics so your products are discoverable in search results."],
                        ['Can the store integrate with my existing inventory or accounting system?', "Yes, if you already use a system with an API or export capability, I can build integrations to keep stock and sales data in sync."],
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

@include('partials.services-cta', ['heading' => 'online store'])

@endsection

@push('styles')
<style>.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); } @media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }</style>
@endpush
