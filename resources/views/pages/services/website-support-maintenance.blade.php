@extends('layouts.app')

@section('title', 'Website Support & Maintenance in Nepal | ' . ($personal->brand_name ?? 'Nabaraj Acharya'))
@section('description', 'Ongoing updates, security patches, and technical support to keep your website running smoothly after launch.')
@section('keywords', 'website maintenance nepal, website support nepal, laravel maintenance nepal, nabaraj acharya')
@section('canonical', route('services.website-support-maintenance'))

@section('schema')
@php
    $serviceSchema = [
        '@context' => 'https://schema.org', '@type' => 'Service', 'name' => 'Website Support & Maintenance',
        'provider' => ['@type' => 'Person', 'name' => $personal->brand_name ?? 'Nabaraj Acharya', 'url' => route('home')],
        'areaServed' => [['@type' => 'Country', 'name' => 'Nepal']],
        'url' => route('services.website-support-maintenance'),
        'description' => 'Ongoing website support and maintenance for businesses in Nepal.',
    ];
    $breadcrumbSchema = ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Website Support & Maintenance', 'item' => route('services.website-support-maintenance')],
    ]];
@endphp
<script type="application/ld+json">{!! json_encode($serviceSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')

<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">Website Support &amp; Maintenance</h1>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a><span class="mx-1">&rsaquo;</span>
            <a href="{{ route('services') }}" class="hover:underline">Services</a><span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">Website Support &amp; Maintenance</span>
        </p>
    </div>
</section>

@include('partials.services-hero-image')

<section class="py-12 md:py-16 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2">
                <p class="text-base md:text-lg leading-relaxed mb-8" style="color: var(--ink-dim);">
                    Ongoing updates, security patches, and technical support to keep your website running smoothly after launch — so a small issue doesn't turn into downtime or a security problem.
                </p>

                @if($personal && ($personal->years_experience || $personal->completed_projects))
                <div class="flex flex-wrap gap-3 mb-12">
                    @if($personal->years_experience)<span class="skill-badge !text-sm !py-2 !px-4"><strong style="color:var(--ink);">{{ $personal->years_experience }}+</strong>&nbsp;years experience</span>@endif
                    @if($personal->completed_projects)<span class="skill-badge !text-sm !py-2 !px-4"><strong style="color:var(--ink);">{{ $personal->completed_projects }}+</strong>&nbsp;projects delivered</span>@endif
                    <span class="skill-badge !text-sm !py-2 !px-4">Ongoing <strong style="color:var(--ink);">Support</strong></span>
                </div>
                @endif

                <h2 class="font-display text-2xl font-bold mb-6" style="color: var(--ink);">What's Included</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-12">
                    @foreach([
                        ['Security Patches', 'Framework and dependency updates applied before they become a vulnerability.'],
                        ['Bug Fixes', 'Issues reported and resolved without a long back-and-forth.'],
                        ['Backup Management', 'Regular backups so a bad update or hosting issue is never catastrophic.'],
                        ['Monthly Health Checks', 'A periodic look at performance, uptime, and error logs.'],
                    ] as [$title, $desc])
                    <div class="glass-card p-6">
                        <h3 class="font-display text-base font-bold mb-1.5" style="color: var(--ink);">{{ $title }}</h3>
                        <p class="text-sm leading-relaxed" style="color: var(--ink-dim);">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>

                @php
                    $tableTitle = "What Does a Support Plan Cover?";
                    $tableRows = [
                        ['Security & Updates', 'Any live site that needs to stay safe', 'Framework/plugin updates, patches'],
                        ['Bug Fixes', 'Sites with reported issues or broken features', 'Debugging, hotfixes'],
                        ['Backups & Recovery', "Sites that can't afford to lose data", 'Scheduled backups, restore plans'],
                        ['Performance Monitoring', 'Sites wanting to catch issues early', 'Uptime checks, error log review'],
                    ];
                @endphp
                @include('partials.services-table')

                @include('partials.services-why-me')

                @php
                    $faqs = [
                        ['How quickly do you respond to issues?', 'Critical issues are prioritised and addressed as soon as possible; non-urgent requests are handled within a few business days.'],
                        ["Do I need a support plan if my site rarely changes?", 'Yes — security patches and backups matter even for sites that don\'t change often, since vulnerabilities can still be exploited.'],
                        ["Can you support a site you didn't build?", 'Yes, after a short review to understand the existing codebase.'],
                        ["What's not included in maintenance?", 'Major new features or redesigns are scoped separately — maintenance covers keeping the existing site healthy.'],
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

@include('partials.services-cta', ['heading' => 'support plan'])

@endsection

@push('styles')
<style>.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); } @media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }</style>
@endpush
