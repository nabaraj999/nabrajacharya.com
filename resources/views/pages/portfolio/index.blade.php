@extends('layouts.app')

@section('title', $seo->meta_title ?? 'Portfolio — Full Stack Developer Nepal | Laravel Projects | Nabaraj Acharya')
@section('description', $seo->meta_description ?? 'Explore the web development portfolio of Nabaraj Acharya — Full Stack Developer Nepal. Laravel applications, custom web apps, and SEO-optimised projects.')
@section('keywords', $seo->meta_keywords ?? 'portfolio full stack developer nepal, laravel projects nepal, web development portfolio nepal, nabaraj acharya projects')
@section('canonical', route('portfolio'))

@section('schema')
@php
    $portfolioSchema = ['@context'=>'https://schema.org','@type'=>'CollectionPage','name'=>'Portfolio — Full Stack Developer Nepal','description'=>'Web development projects by Nabaraj Acharya, Full Stack Developer in Nepal','url'=>route('portfolio')];
    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Portfolio', 'item' => route('portfolio')],
        ],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($portfolioSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')

<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">
            Projects by a <span class="gradient-text">Full Stack Developer Nepal</span>
        </h1>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">Portfolio</span>
        </p>
    </div>
</section>

<section class="pt-10 md:pt-12 reveal">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center">
        <p class="text-base leading-relaxed" style="color: var(--ink-dim);">
            Laravel applications, custom web solutions, and SEO-focused projects built for businesses in Nepal and Australia.
        </p>
    </div>
</section>

{{-- Filter by type --}}
<div class="max-w-6xl mx-auto px-4 sm:px-6 pt-8 pb-2 md:pt-10">
    <div class="flex flex-wrap gap-2 justify-center" id="type-filters">
        <button data-type="all" class="type-btn portfolio-filter-btn active">All</button>
        <button data-type="web_dev" class="type-btn portfolio-filter-btn">Web Development</button>
        <button data-type="seo" class="type-btn portfolio-filter-btn">SEO</button>
        <button data-type="design" class="type-btn portfolio-filter-btn">UI/UX Design</button>
    </div>
</div>

{{-- Filter by skill --}}
@if($skills->isNotEmpty())
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-4 md:py-5">
    <div class="flex flex-wrap gap-2 justify-center" id="skill-filters">
        <button data-filter="all" class="filter-btn portfolio-filter-btn active">All Skills</button>
        @foreach($skills as $skill)
        <button data-filter="{{ $skill->id }}" class="filter-btn portfolio-filter-btn">{{ $skill->skill_name }}</button>
        @endforeach
    </div>
</div>
@endif

<section class="py-8 pb-16 md:pb-24 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        @if($projects->isEmpty())
            <p class="text-center py-20" style="color: var(--ink-faint);">No projects available yet.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="projects-grid">
                @foreach($projects as $project)
                <article class="project-item glass-card overflow-hidden" style="padding: 0;"
                         data-skills="{{ $project->skills->pluck('id')->join(',') }}"
                         data-type="{{ $project->type ?? 'web_dev' }}">
                    <a href="{{ route('portfolio.show', $project) }}" class="block">
                        <div class="service-thumb">
                            @if($project->image_url)
                            <img src="{{ asset('storage/'.$project->image_url) }}" alt="{{ $project->title }}" loading="lazy">
                            @else
                            <div class="service-thumb-placeholder">
                                <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            @endif
                        </div>
                    </a>
                    <div class="p-6">
                        <a href="{{ route('portfolio.show', $project) }}">
                            <h2 class="font-display text-lg font-bold mb-2" style="color: var(--ink);">
                                {{ $project->title }}
                            </h2>
                        </a>
                        @if($project->description)
                            <p class="text-sm leading-relaxed line-clamp-2 mb-4" style="color: var(--ink-dim);">
                                {{ strip_tags($project->description) }}
                            </p>
                        @endif

                        @if($project->skills->isNotEmpty())
                        <div class="flex flex-wrap gap-1.5 mb-5">
                            @foreach($project->skills as $skill)
                            <span class="skill-badge">{{ $skill->skill_name }}</span>
                            @endforeach
                        </div>
                        @endif

                        <div class="flex items-center justify-between pt-4" style="border-top: 1px solid var(--line);">
                            <a href="{{ route('portfolio.show', $project) }}"
                               class="text-sm font-semibold flex items-center gap-1.5 transition-colors" style="color: var(--accent);">
                                View Details
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                            </a>
                            @if($project->project_url)
                            <a href="{{ $project->project_url }}" target="_blank" rel="noopener noreferrer"
                               class="text-sm font-semibold flex items-center gap-1.5 transition-colors" style="color: var(--ink-dim);">
                                Live
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                            @endif
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        @endif
    </div>
</section>

@include('partials.services-cta', ['heading' => 'next project'])

@endsection

@push('scripts')
<script>
    const typeBtns   = document.querySelectorAll('.type-btn');
    const filterBtns = document.querySelectorAll('.filter-btn');
    const items      = document.querySelectorAll('.project-item');

    let activeType  = 'all';
    let activeSkill = 'all';

    function applyFilters() {
        items.forEach(item => {
            const typeMatch  = activeType  === 'all' || item.dataset.type  === activeType;
            const skillIds   = item.dataset.skills ? item.dataset.skills.split(',') : [];
            const skillMatch = activeSkill === 'all' || skillIds.includes(activeSkill);
            item.style.display = (typeMatch && skillMatch) ? '' : 'none';
        });
    }

    typeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            typeBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            activeType = btn.dataset.type;
            activeSkill = 'all';
            filterBtns.forEach(b => b.classList.remove('active'));
            document.querySelector('.filter-btn[data-filter="all"]')?.classList.add('active');
            applyFilters();
        });
    });

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            activeSkill = btn.dataset.filter;
            applyFilters();
        });
    });
</script>
<style>
    .portfolio-filter-btn {
        display: inline-flex; align-items: center;
        padding: 8px 18px; border-radius: 100px;
        font-family: 'Rajdhani', sans-serif; font-size: 0.85rem; font-weight: 700;
        background: var(--bg-soft); border: 1px solid var(--line);
        color: var(--ink-dim); transition: all 0.2s; cursor: pointer;
    }
    .portfolio-filter-btn:hover { border-color: var(--accent); color: var(--accent); }
    .portfolio-filter-btn.active { background: var(--accent-soft); border-color: var(--accent); color: var(--accent); }
</style>
@endpush
