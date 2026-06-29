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

<section class="page-hero pt-24 pb-10 md:pt-32 md:pb-16">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 text-center">
        <div class="section-tag">Services</div>
        <h1 class="font-display text-4xl md:text-5xl font-bold mt-2 mb-4">
            Web Development <span class="gradient-text">in 2026</span>
        </h1>
        <p class="text-slate-400 text-lg max-w-2xl mx-auto">
            Modern web development in 2026 with Laravel applications, business websites, and SEO service in Nepal for companies that want better performance, visibility, and leads.
        </p>
    </div>
</section>

<section class="py-10 md:py-16 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        @if($services->isEmpty())
            <p class="text-center text-slate-500 py-20">No services available at the moment.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                @foreach($services as $service)
                <div class="group relative rounded-2xl overflow-hidden border border-slate-800 bg-surface transition-all duration-300 hover:border-indigo-500/40 hover:-translate-y-1 hover:shadow-xl hover:shadow-indigo-500/10">
                    @if($service->photo)
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('storage/'.$service->photo) }}" alt="{{ $service->service_name }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    @else
                    <div class="h-48 bg-gradient-to-br from-indigo-600/10 to-purple-600/10 flex items-center justify-center">
                        <svg class="w-16 h-16 text-indigo-500/30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                    </div>
                    @endif

                    <div class="p-6">
                        <h2 class="font-display text-lg font-bold text-white mb-3 group-hover:text-indigo-300 transition-colors">
                            {{ $service->service_name }}
                        </h2>
                        <div class="text-slate-400 text-sm leading-relaxed">
                            {!! $service->description !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section class="py-10 md:py-16 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="rounded-2xl bg-gradient-to-br from-indigo-600/15 to-cyan-600/10 border border-indigo-500/20 p-10 text-center">
            <h2 class="font-display text-2xl md:text-3xl font-bold mb-3">
                Need <span class="gradient-text">Web Development in 2026</span>?
            </h2>
            <p class="text-slate-400 mb-7 max-w-lg mx-auto">
                Let's talk about your project. I provide custom Laravel builds, modern website development, and SEO service in Nepal to help businesses grow with stronger search visibility in 2026.
            </p>
            <a href="{{ route('contact') }}" class="btn-primary">
                <span>Start a Project</span>
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </div>
    </div>
</section>

@endsection
