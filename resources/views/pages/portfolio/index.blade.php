@extends('layouts.app')

@section('title', $seo->meta_title ?? 'Portfolio — Full Stack Developer Nepal | Laravel Projects | Nabaraj Acharya')
@section('description', $seo->meta_description ?? 'Explore the web development portfolio of Nabaraj Acharya — Full Stack Developer Nepal. Laravel applications, custom web apps, and SEO-optimised projects.')
@section('keywords', $seo->meta_keywords ?? 'portfolio full stack developer nepal, laravel projects nepal, web development portfolio nepal, nabaraj acharya projects')

@section('schema')
@php $portfolioSchema = ['@context'=>'https://schema.org','@type'=>'CollectionPage','name'=>'Portfolio — Full Stack Developer Nepal','description'=>'Web development projects by Nabaraj Acharya, Full Stack Developer in Nepal','url'=>route('portfolio')]; @endphp
<script type="application/ld+json">{!! json_encode($portfolioSchema) !!}</script>
@endsection

@section('content')

<section class="page-hero pt-24 pb-10 md:pt-32 md:pb-16">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 text-center">
        <div class="section-tag">Portfolio</div>
        <h1 class="font-display text-4xl md:text-5xl font-bold mt-2 mb-4">
            Projects by a <span class="gradient-text">Full Stack Developer Nepal</span>
        </h1>
        <p class="text-slate-400 text-lg max-w-2xl mx-auto">
            Laravel applications, custom web solutions, and SEO-focused projects built for businesses in Nepal and Australia.
        </p>
    </div>
</section>


{{-- Filter by skill --}}
@if($skills->isNotEmpty())
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-6 md:py-8">
    <div class="flex flex-wrap gap-2 justify-center" id="skill-filters">
        <button data-filter="all"
                class="filter-btn active skill-badge text-sm px-4 py-2 cursor-pointer">All</button>
        @foreach($skills as $skill)
        <button data-filter="{{ $skill->id }}"
                class="filter-btn skill-badge text-sm px-4 py-2 cursor-pointer">{{ $skill->skill_name }}</button>
        @endforeach
    </div>
</div>
@endif


<section class="py-8 pb-16 md:pb-24 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        @if($projects->isEmpty())
            <p class="text-center text-slate-500 py-20">No projects available yet.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="projects-grid">
                @foreach($projects as $project)
                <article class="project-item group block rounded-2xl overflow-hidden border border-slate-800 bg-surface transition-all duration-300 hover:border-indigo-500/40 hover:-translate-y-1 hover:shadow-xl hover:shadow-indigo-500/10"
                         data-skills="{{ $project->skills->pluck('id')->join(',') }}">
                    <a href="{{ route('portfolio.show', $project->id) }}">
                        <div class="h-52 overflow-hidden bg-slate-900 relative"
                             style="{{ $project->image_url ? 'background-image:url('.asset('storage/'.$project->image_url).');background-size:cover;background-position:center;' : '' }}">
                            @if(!$project->image_url)
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="h-12 w-12 text-slate-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            @endif
                            <div class="absolute inset-0 bg-indigo-600/0 group-hover:bg-indigo-600/10 transition-colors duration-300"></div>
                        </div>
                    </a>
                    <div class="p-5">
                        <a href="{{ route('portfolio.show', $project->id) }}">
                            <h2 class="font-display font-semibold text-white mb-2 group-hover:text-indigo-300 transition-colors">
                                {{ $project->title }}
                            </h2>
                        </a>
                        @if($project->description)
                            <p class="text-slate-400 text-sm leading-relaxed line-clamp-2 mb-3">
                                {{ strip_tags($project->description) }}
                            </p>
                        @endif

                        {{-- Skills --}}
                        @if($project->skills->isNotEmpty())
                        <div class="flex flex-wrap gap-1.5 mb-4">
                            @foreach($project->skills as $skill)
                            <span class="skill-badge">{{ $skill->skill_name }}</span>
                            @endforeach
                        </div>
                        @endif

                        <div class="flex items-center justify-between pt-3 border-t border-slate-800">
                            <a href="{{ route('portfolio.show', $project->id) }}"
                               class="text-sm font-semibold text-indigo-400 hover:text-indigo-300 flex items-center gap-1.5 transition-colors">
                                View Details
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                            </a>
                            @if($project->project_url)
                            <a href="{{ $project->project_url }}" target="_blank" rel="noopener noreferrer"
                               class="text-sm font-semibold text-cyan-400 hover:text-cyan-300 flex items-center gap-1.5 transition-colors">
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

@endsection

@push('scripts')
<script>
    const filterBtns = document.querySelectorAll('.filter-btn');
    const items      = document.querySelectorAll('.project-item');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active','border-indigo-400','text-indigo-300'));
            btn.classList.add('active','border-indigo-400','text-indigo-300');

            const filter = btn.dataset.filter;
            items.forEach(item => {
                if (filter === 'all') {
                    item.style.display = '';
                } else {
                    const skillIds = item.dataset.skills ? item.dataset.skills.split(',') : [];
                    item.style.display = skillIds.includes(filter) ? '' : 'none';
                }
            });
        });
    });
</script>
<style>
    .filter-btn.active {
        background: rgba(99,102,241,0.25);
        border-color: rgba(99,102,241,0.6);
        color: #c7d2fe;
    }
</style>
@endpush
