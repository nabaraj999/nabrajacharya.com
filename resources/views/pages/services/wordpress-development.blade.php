@extends('layouts.app')

@section('title', 'WordPress Development in Nepal | ' . ($personal->brand_name ?? 'Nabaraj Acharya'))
@section('description', 'Custom WordPress builds and theme customization for blogs, business sites, and small stores that need to launch fast.')
@section('keywords', 'wordpress developer nepal, wordpress development kathmandu, nabaraj acharya')
@section('canonical', route('services.wordpress-development'))

@section('schema')
@php
    $serviceSchema = [
        '@context' => 'https://schema.org', '@type' => 'Service', 'name' => 'WordPress Development',
        'provider' => ['@type' => 'Person', 'name' => $personal->brand_name ?? 'Nabaraj Acharya', 'url' => route('home')],
        'areaServed' => [['@type' => 'Country', 'name' => 'Nepal']],
        'url' => route('services.wordpress-development'),
        'description' => 'Custom WordPress builds for businesses in Nepal.',
    ];
    $breadcrumbSchema = ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'WordPress Development', 'item' => route('services.wordpress-development')],
    ]];
@endphp
<script type="application/ld+json">{!! json_encode($serviceSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')

<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">WordPress Development</h1>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a><span class="mx-1">&rsaquo;</span>
            <a href="{{ route('services') }}" class="hover:underline">Services</a><span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">WordPress Development</span>
        </p>
    </div>
</section>

@include('partials.services-hero-image')

<section class="py-12 md:py-16 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2">
                <p class="text-base md:text-lg leading-relaxed mb-8" style="color: var(--ink-dim);">
                    Custom WordPress builds and theme customisation for blogs, business sites, and small stores that need to launch fast — without sacrificing speed or clean code.
                </p>

                @if($personal && ($personal->years_experience || $personal->completed_projects))
                <div class="flex flex-wrap gap-3 mb-12">
                    @if($personal->years_experience)<span class="skill-badge !text-sm !py-2 !px-4"><strong style="color:var(--ink);">{{ $personal->years_experience }}+</strong>&nbsp;years experience</span>@endif
                    @if($personal->completed_projects)<span class="skill-badge !text-sm !py-2 !px-4"><strong style="color:var(--ink);">{{ $personal->completed_projects }}+</strong>&nbsp;projects delivered</span>@endif
                    <span class="skill-badge !text-sm !py-2 !px-4">WordPress &amp; <strong style="color:var(--ink);">WooCommerce</strong></span>
                </div>
                @endif

                <h2 class="font-display text-2xl font-bold mb-6" style="color: var(--ink);">What's Included</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-12">
                    @foreach([
                        ['Custom Theme Development', 'A design built for your brand, not a generic theme with your logo dropped in.'],
                        ['Plugin Customisation', 'Configuring and customising plugins so they actually fit your workflow.'],
                        ['Speed Optimisation', 'Caching, image optimisation, and clean code so WordPress stays fast.'],
                        ['WooCommerce Setup', 'A working store with products, payments, and shipping configured correctly.'],
                    ] as [$title, $desc])
                    <div class="glass-card p-6">
                        <h3 class="font-display text-base font-bold mb-1.5" style="color: var(--ink);">{{ $title }}</h3>
                        <p class="text-sm leading-relaxed" style="color: var(--ink-dim);">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>

                @php
                    $tableTitle = "What Kind of WordPress Sites Do I Build?";
                    $tableRows = [
                        ['Business & Brochure Sites', 'Small businesses needing a clean, fast online presence', 'Custom theme, Elementor/Gutenberg'],
                        ['Blogs & Content Sites', 'Writers and publishers needing a strong CMS', 'WordPress, SEO plugins'],
                        ['WooCommerce Stores', 'Small to mid-size online stores', 'WooCommerce, payment plugins'],
                        ['Membership Sites', 'Sites with gated or paid content', 'WordPress, membership plugins'],
                    ];
                @endphp
                @include('partials.services-table')

                @include('partials.services-why-me')

                @php
                    $faqs = [
                        ['Do you build with page builders or custom code?', "Depends on your needs — simple sites can use Elementor, but I write custom theme code when you need something page builders can't do cleanly."],
                        ['Can you fix my existing WordPress site instead of rebuilding it?', 'Yes, that often falls under Website Support & Maintenance — many issues can be fixed without a full rebuild.'],
                        ['Will my site be fast?', 'Yes — caching, image optimisation, and clean code are part of every WordPress build, not an afterthought.'],
                        ['Do you provide ongoing WordPress updates?', 'Yes, through my Website Support & Maintenance service.'],
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

@include('partials.services-cta', ['heading' => 'WordPress'])

@endsection

@push('styles')
<style>.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); } @media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }</style>
@endpush
