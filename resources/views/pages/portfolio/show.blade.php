@extends('layouts.app')

@section('title', $project->title.' — Full Stack Developer Nepal | Nabaraj Acharya')
@section('description', strip_tags($project->description ?? 'A web development project by Nabaraj Acharya, Full Stack Developer Nepal specializing in Laravel.'))
@section('canonical', route('portfolio.show', $project))
@section('og_title', $project->title.' | Nabaraj Acharya — Full Stack Developer Nepal')
@section('og_description', strip_tags($project->description ?? 'A web development project by Nabaraj Acharya, Full Stack Developer Nepal.'))
@if($project->image_url)
@section('og_image', asset('storage/'.$project->image_url))
@section('twitter_image', asset('storage/'.$project->image_url))
@section('og_image_alt', $project->title)
@endif

@section('schema')
@php
$projectSchema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'SoftwareApplication',
    'name'        => $project->title,
    'description' => strip_tags($project->description ?? ''),
    'url'         => $project->project_url ?? route('portfolio.show', $project),
    'author'      => ['@type'=>'Person','name'=>'Nabaraj Acharya','url'=>'https://nabrajacharya.com.np','jobTitle'=>'Full Stack Developer Nepal'],
];
if ($project->completion_date) $projectSchema['datePublished'] = $project->completion_date->format('Y-m-d');
if ($project->skills->isNotEmpty()) $projectSchema['keywords'] = $project->skills->pluck('skill_name')->join(', ');
if ($project->image_url) $projectSchema['image'] = asset('storage/'.$project->image_url);

$breadcrumbSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Portfolio', 'item' => route('portfolio')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => $project->title, 'item' => route('portfolio.show', $project)],
    ],
];
@endphp
<script type="application/ld+json">{!! json_encode($projectSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')

<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">{{ $project->title }}</h1>
        <div class="flex flex-wrap items-center justify-center gap-3 mb-4">
            @if($project->completion_date)
            <span class="skill-badge">
                <svg class="skill-badge-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Completed {{ $project->completion_date->format('M Y') }}
            </span>
            @endif
            <span class="skill-badge" style="background: #ecfdf5; border-color: #a7f3d0; color: #047857;">
                {{ ucfirst(str_replace('_',' ',$project->status)) }}
            </span>
            @php
                $typeLabels = ['web_dev' => 'Web Development', 'seo' => 'SEO', 'design' => 'UI/UX Design'];
                $typeColors = [
                    'web_dev' => 'background:#eef2ff;border-color:#c7d2fe;color:#4338ca;',
                    'seo'     => 'background:#ecfeff;border-color:#a5f3fc;color:#0e7490;',
                    'design'  => 'background:#f5f3ff;border-color:#ddd6fe;color:#6d28d9;',
                ];
                $type = $project->type ?? 'web_dev';
            @endphp
            <span class="skill-badge" style="{{ $typeColors[$type] ?? $typeColors['web_dev'] }}">
                {{ $typeLabels[$type] ?? 'Web Development' }}
            </span>
        </div>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a><span class="mx-1">&rsaquo;</span>
            <a href="{{ route('portfolio') }}" class="hover:underline">Portfolio</a><span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">{{ $project->title }}</span>
        </p>
    </div>
</section>

<section class="py-10 md:py-14 reveal">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">

        {{-- Project image --}}
        @if($project->image_url)
        <div class="mb-10 rounded-2xl overflow-hidden glass-card" style="padding:0;">
            <img src="{{ asset('storage/'.$project->image_url) }}" alt="{{ $project->title }} — Full Stack Developer Nepal"
                 class="w-full h-auto object-cover max-h-[500px]">
        </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            {{-- Main content --}}
            <div class="md:col-span-2">
                @if($project->description)
                <h2 class="font-display text-xl font-bold mb-4" style="color: var(--ink);">About This Project</h2>
                <div class="leading-relaxed text-base prose max-w-none" style="color: var(--ink-dim);">
                    {!! $project->description !!}
                </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <div class="space-y-5">

                {{-- SEO: Traffic Growth highlight --}}
                @if(($project->type ?? '') === 'seo' && $project->traffic_growth)
                <div class="glass-card p-5">
                    <h3 class="font-display font-semibold mb-2 text-sm uppercase tracking-wider flex items-center gap-2" style="color: var(--accent);">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                        Traffic Growth
                    </h3>
                    <p class="font-semibold text-lg leading-snug" style="color: var(--ink);">{{ $project->traffic_growth }}</p>
                </div>
                @endif

                {{-- Technologies --}}
                @if($project->skills->isNotEmpty())
                <div class="glass-card p-5">
                    <h3 class="font-display font-semibold mb-4 text-sm uppercase tracking-wider" style="color: var(--ink);">Technologies Used</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($project->skills as $skill)
                        <span class="skill-badge">{{ $skill->skill_name }}</span>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Links --}}
                @if($project->project_url)
                <div class="glass-card p-5">
                    <h3 class="font-display font-semibold mb-4 text-sm uppercase tracking-wider" style="color: var(--ink);">Links</h3>
                    <a href="{{ $project->project_url }}" target="_blank" rel="noopener noreferrer"
                       class="btn-primary w-full justify-center text-sm py-2.5">
                        <span>View Live Project</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </div>
                @endif

                {{-- Project info --}}
                <div class="glass-card p-5 space-y-3 text-sm">
                    @if($project->project_start_date)
                    <div class="flex justify-between items-center" style="color: var(--ink-faint);">
                        <span>Started</span>
                        <span class="font-medium" style="color: var(--ink);">{{ $project->project_start_date->format('M Y') }}</span>
                    </div>
                    @endif
                    @if($project->completion_date)
                    <div class="flex justify-between items-center" style="color: var(--ink-faint);">
                        <span>Completed</span>
                        <span class="font-medium" style="color: var(--ink);">{{ $project->completion_date->format('M Y') }}</span>
                    </div>
                    @endif
                    <div class="flex justify-between items-center" style="color: var(--ink-faint);">
                        <span>Status</span>
                        <span class="font-medium" style="color: #047857;">{{ ucfirst(str_replace('_',' ',$project->status)) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('partials.services-cta', ['heading' => 'similar project'])

@endsection
