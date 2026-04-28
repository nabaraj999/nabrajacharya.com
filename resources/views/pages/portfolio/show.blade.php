@extends('layouts.app')

@section('title', $project->title.' — Full Stack Developer Nepal | Nabaraj Acharya')
@section('description', strip_tags($project->description ?? 'A web development project by Nabaraj Acharya, Full Stack Developer Nepal specializing in Laravel.'))
@section('canonical', route('portfolio.show', $project))
@section('og_title', $project->title.' | Nabaraj Acharya — Full Stack Developer Nepal')
@section('og_description', strip_tags($project->description ?? 'A web development project by Nabaraj Acharya, Full Stack Developer Nepal.'))

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

<div class="pt-24 pb-6 md:pt-28 page-hero">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <a href="{{ route('portfolio') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-indigo-400 transition-colors mb-6">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Back to Portfolio
        </a>
        <h1 class="font-display text-3xl md:text-4xl font-bold text-white mb-4">{{ $project->title }}</h1>
        <div class="flex flex-wrap gap-3 items-center text-sm text-slate-400">
            @if($project->completion_date)
            <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Completed {{ $project->completion_date->format('M Y') }}
            </span>
            @endif
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/12 border border-emerald-500/25 text-emerald-400">
                {{ ucfirst(str_replace('_',' ',$project->status)) }}
            </span>
        </div>
    </div>
</div>

<article class="max-w-4xl mx-auto px-4 sm:px-6 py-8 md:py-12">

    {{-- Project image --}}
    @if($project->image_url)
    <div class="rounded-2xl overflow-hidden border border-slate-800 mb-10 shadow-xl">
        <img src="{{ asset('storage/'.$project->image_url) }}" alt="{{ $project->title }} — Full Stack Developer Nepal"
             class="w-full h-auto object-cover max-h-[500px]">
    </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        {{-- Main content --}}
        <div class="md:col-span-2">
            @if($project->description)
            <h2 class="font-display text-xl font-bold text-white mb-4">About This Project</h2>
            <div class="prose prose-invert prose-slate max-w-none text-slate-300 leading-relaxed">
                {!! $project->description !!}
            </div>
            @endif
        </div>

        {{-- Sidebar --}}
        <div class="space-y-5">

            {{-- Technologies --}}
            @if($project->skills->isNotEmpty())
            <div class="glass-card p-5">
                <h3 class="font-display font-semibold text-white mb-4 text-sm uppercase tracking-wider">Technologies Used</h3>
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
                <h3 class="font-display font-semibold text-white mb-4 text-sm uppercase tracking-wider">Links</h3>
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
                <div class="flex justify-between items-center text-slate-400">
                    <span>Started</span>
                    <span class="text-slate-200 font-medium">{{ $project->project_start_date->format('M Y') }}</span>
                </div>
                @endif
                @if($project->completion_date)
                <div class="flex justify-between items-center text-slate-400">
                    <span>Completed</span>
                    <span class="text-slate-200 font-medium">{{ $project->completion_date->format('M Y') }}</span>
                </div>
                @endif
                <div class="flex justify-between items-center text-slate-400">
                    <span>Status</span>
                    <span class="text-emerald-400 font-medium">{{ ucfirst(str_replace('_',' ',$project->status)) }}</span>
                </div>
            </div>

            {{-- CTA --}}
            <div class="glass-card p-5 text-center">
                <p class="text-slate-400 text-sm mb-4">Need a similar project?</p>
                <a href="{{ route('contact') }}" class="btn-outline w-full justify-center text-sm py-2.5">
                    Hire Me
                </a>
            </div>
        </div>
    </div>
</article>

@endsection
