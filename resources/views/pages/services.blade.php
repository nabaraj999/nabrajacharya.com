@extends('layouts.app')

@php
    $defaultTitle = 'Web Development in 2026 | SEO Service in Nepal | Nabaraj Acharya';
    $defaultDescription = 'Explore web development in 2026 with modern Laravel, business websites, and SEO service in Nepal by Nabaraj Acharya for brands that want faster, search-friendly growth.';
    $defaultKeywords = 'web development in 2026, seo service in nepal, web development nepal, website development nepal, laravel developer nepal, web developer nepal, technical seo nepal, digital marketing nepal';
@endphp

@section('title', $defaultTitle)
@section('description', $defaultDescription)
@section('keywords', $defaultKeywords)
@section('canonical', route('services'))
@section('og_title', $defaultTitle)
@section('og_description', $defaultDescription)
@section('twitter_title', $defaultTitle)
@section('twitter_description', $defaultDescription)

@section('schema')
@php
    $servicesSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => 'Web Development in 2026 and SEO Service in Nepal',
        'provider' => [
            '@type' => 'Person',
            'name' => $personal->brand_name ?? 'Nabaraj Acharya',
            'url' => route('home'),
        ],
        'areaServed' => [
            ['@type' => 'Country', 'name' => 'Nepal'],
            ['@type' => 'City', 'name' => 'Kathmandu'],
        ],
        'url' => route('services'),
        'description' => $defaultDescription,
        'serviceType' => ['Web Development', 'SEO Service'],
    ];
    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('services')],
        ],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($servicesSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')

<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">
            Web Development <span class="gradient-text">Services in Nepal</span>
        </h1>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">Services</span>
        </p>
    </div>
</section>

<section class="pt-12 md:pt-16 reveal">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center">
        <p class="text-base leading-relaxed mb-5" style="color: var(--ink-dim);">
            @if($personal && $personal->years_experience)
            With <strong style="color: var(--ink);">{{ $personal->years_experience }}+ years of experience</strong> as a full-stack web developer in Nepal, I offer
            @else
            As a full-stack web developer in Nepal, I offer
            @endif
            professional web development services tailored to businesses, startups, and organisations across Kathmandu, Lalitpur, and beyond. From custom Laravel applications to e-commerce platforms, API development to SEO optimisation — I build secure, scalable, and high-performance digital solutions that drive real business results.
        </p>
        <p class="text-sm" style="color: var(--ink-faint);">
            Explore my range of services below, or <a href="{{ route('contact') }}" class="font-semibold hover:underline" style="color: var(--accent);">contact me</a> for a free consultation.
        </p>
    </div>
</section>

<section class="py-12 md:py-16 reveal">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        @if($services->isEmpty())
            <p class="text-center py-20" style="color: var(--ink-faint);">No services available at the moment.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($services as $i => $service)
                <a href="{{ route('services.' . $service->slug) }}" class="glass-card p-8 block">
                    <span class="block font-display text-xl font-extrabold mb-3" style="color: var(--accent);">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}.</span>
                    <h2 class="font-display text-lg font-bold mb-2.5" style="color: var(--ink);">
                        {{ $service->service_name }}
                    </h2>
                    <div class="text-sm leading-relaxed mb-4" style="color: var(--ink-dim);">
                        {!! $service->description !!}
                    </div>
                    <span class="text-sm font-semibold" style="color: var(--accent);">Learn more &rarr;</span>
                </a>
                @endforeach
            </div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section class="py-12 md:py-20 reveal">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <div class="cta-kk-banner text-center">
            <p class="section-tag !justify-center">Ready to start?</p>
            <h2 class="font-display text-2xl md:text-4xl font-bold mb-4" style="color: var(--ink);">
                Need <span class="gradient-text">Web Development</span> in Nepal?
            </h2>
            <p class="mb-8 max-w-lg mx-auto" style="color: var(--ink-dim);">
                Let's talk about your project. I provide custom Laravel builds, modern website development, and SEO services to help your business grow with stronger search visibility.
            </p>
            <a href="{{ route('contact') }}" class="btn-primary" data-magnetic data-cursor="link">
                <span>Start a Project</span>
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); }
@media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }
</style>
@endpush
