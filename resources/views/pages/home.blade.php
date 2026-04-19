@extends('layouts.app')

@section('title', $seo->meta_title ?? 'Nabaraj Acharya — Full Stack Developer & SEO Expert Nepal | Laravel Developer')
@section('description', $seo->meta_description ?? 'Nabaraj Acharya is a Full Stack Developer & SEO Expert in Nepal — specializing in Laravel, PHP, and technical SEO. Currently at TechAble Australia.')
@section('keywords', $seo->meta_keywords ?? 'full stack developer nepal, laravel developer nepal, seo expert nepal, nabaraj acharya, web developer nepal')

@section('schema')
@php $homeSchema = ['@context'=>'https://schema.org','@type'=>'WebSite','name'=>'Nabaraj Acharya — Full Stack Developer & SEO Expert Nepal','url'=>'https://nabrajacharya.com.np','description'=>'Portfolio of Nabaraj Acharya, Full Stack Developer & SEO Expert in Nepal']; @endphp
<script type="application/ld+json">{!! json_encode($homeSchema) !!}</script>
@endsection

@section('content')

{{-- Mouse spotlight --}}
<div id="spotlight"></div>

{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  HERO                                                        --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
<section id="hero" class="relative min-h-screen flex items-center overflow-hidden">

    {{-- Animated mesh gradient --}}
    <div class="hero-mesh"></div>

    {{-- Grid overlay --}}
    <div class="absolute inset-0 hero-grid"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 pt-28 pb-16 w-full">
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">

            {{-- ── Left: Text ── --}}
            <div class="flex-1 text-center lg:text-left">

                {{-- Employment badge --}}
                @if($personal && $personal->current_company)
                <div class="hero-badge" style="animation-delay:0s">
                    <span class="live-dot"></span>
                    <span class="badge-text">
                        {{ $personal->current_role ?? 'Full Stack Developer & SEO Expert' }}
                    </span>
                    <span class="badge-sep">@</span>
                    <a href="{{ $personal->current_company_url ?? '#' }}" target="_blank" rel="noopener noreferrer" class="badge-link">
                        {{ $personal->current_company }}
                    </a>
                    @if($personal->current_role_start)
                    <span class="badge-since">since {{ \Carbon\Carbon::parse($personal->current_role_start)->format('M Y') }}</span>
                    @endif
                </div>
                @else
                <div class="hero-badge" style="animation-delay:0s">
                    <span class="live-dot"></span>
                    <span class="badge-text">Open to opportunities</span>
                </div>
                @endif

                {{-- Greeting --}}
                <p class="hero-greeting" style="animation-delay:0.15s">Hello, World 👋</p>

                {{-- Name --}}
                <h1 class="hero-name" style="animation-delay:0.3s">
                    {{ $personal->brand_name ?? 'Nabaraj Acharya' }}
                </h1>

                {{-- Role --}}
                <div class="hero-role" style="animation-delay:0.45s">
                    <span class="role-dev">Full Stack Dev</span>
                    <span class="role-amp">&</span>
                    <span class="role-seo">SEO Expert</span>
                </div>

                {{-- Subtitle --}}
                <p class="hero-sub" style="animation-delay:0.6s">
                    {{ $personal->description ?? 'Building high-performance Laravel apps & driving organic growth — based in Nepal, working globally.' }}
                </p>

                {{-- CTAs --}}
                <div class="hero-ctas" style="animation-delay:0.75s">
                    <a href="{{ route('portfolio') }}" class="cta-primary">
                        View My Work
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                    <a href="{{ route('contact') }}" class="cta-ghost">Hire Me</a>
                </div>

                {{-- Stats --}}
                @if($personal)
                <div class="hero-stats" style="animation-delay:0.9s">
                    <div class="stat-item">
                        <span class="stat-num" data-count="{{ $personal->years_experience ?? 0 }}">0</span><span class="stat-plus">+</span>
                        <span class="stat-label">Years Experience</span>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                        <span class="stat-num" data-count="{{ $personal->completed_projects ?? 0 }}">0</span><span class="stat-plus">+</span>
                        <span class="stat-label">Projects Delivered</span>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                        <span class="stat-num" data-count="{{ $personal->happy_clients ?? 0 }}">0</span><span class="stat-plus">+</span>
                        <span class="stat-label">Happy Clients</span>
                    </div>
                </div>
                @endif
            </div>

            {{-- ── Right: Photo ── --}}
            <div class="flex-shrink-0 lg:w-auto" style="animation: heroPhotoIn 0.9s ease forwards 0.4s; opacity:0;">
                <div class="photo-wrapper float">
                    @if($personal && $personal->profile_photo)
                        <div class="photo-ring">
                            <img src="{{ Storage::url($personal->profile_photo) }}"
                                 alt="{{ $personal->brand_name ?? 'Nabaraj Acharya' }} Full Stack Developer SEO Expert Nepal"
                                 class="photo-img">
                        </div>
                    @else
                        <div class="photo-ring">
                            <div class="photo-placeholder">
                                <span>NA</span>
                            </div>
                        </div>
                    @endif
                    {{-- Floating skill chips --}}
                    <div class="chip chip-laravel">⚡ Laravel</div>
                    <div class="chip chip-seo">🔍 SEO</div>
                    <div class="chip chip-php">🐘 PHP</div>
                </div>
            </div>

        </div>

        {{-- Scroll indicator --}}
        <div class="scroll-hint">
            <span>scroll</span>
            <div class="scroll-line"></div>
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  DUAL EXPERTISE                                             --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
<section class="py-28 reveal">
    <div class="max-w-6xl mx-auto px-6">
        <div class="section-tag">Expertise</div>
        <h2 class="text-center font-display text-3xl md:text-5xl font-bold mb-4">
            What I <span class="gradient-text">Bring to the Table</span>
        </h2>
        <p class="text-center text-slate-400 mb-16 max-w-2xl mx-auto">
            A rare combination of full-stack engineering and SEO strategy — I build sites that work beautifully and rank on Google.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Dev Card --}}
            <div class="expertise-card expertise-dev">
                <div class="expertise-icon-wrap dev-icon">
                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                </div>
                <h3 class="expertise-title">Full Stack Development</h3>
                <p class="expertise-desc">Building robust, scalable web applications from database to UI — with clean code and performance in mind.</p>
                <div class="expertise-tags">
                    @php $devSkills = ['Laravel', 'PHP', 'MySQL', 'Vue.js', 'REST API', 'Tailwind CSS', 'JavaScript', 'Git']; @endphp
                    @foreach($devSkills as $s)
                    <span class="etag etag-dev">{{ $s }}</span>
                    @endforeach
                </div>
                <div class="expertise-footer dev-footer">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"/></svg>
                    <a href="{{ route('portfolio') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold text-sm transition-colors">View Projects</a>
                </div>
            </div>

            {{-- SEO Card --}}
            <div class="expertise-card expertise-seo">
                <div class="expertise-icon-wrap seo-icon">
                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <h3 class="expertise-title">SEO & Digital Growth</h3>
                <p class="expertise-desc">Driving organic traffic and search rankings with technical SEO, content strategy, and data-driven optimisation.</p>
                <div class="expertise-tags">
                    @php $seoSkills = ['Technical SEO', 'On-Page SEO', 'Keyword Research', 'Content Strategy', 'Link Building', 'Local SEO', 'Analytics', 'Core Web Vitals']; @endphp
                    @foreach($seoSkills as $s)
                    <span class="etag etag-seo">{{ $s }}</span>
                    @endforeach
                </div>
                <div class="expertise-footer seo-footer">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"/></svg>
                    <a href="{{ route('services') }}" class="text-amber-400 hover:text-amber-300 font-semibold text-sm transition-colors">View Services</a>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  CURRENT EMPLOYMENT                                         --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($personal && $personal->current_company)
<section class="py-10 reveal">
    <div class="max-w-6xl mx-auto px-6">
        <div class="employment-card">
            <div class="employment-left">
                <div class="flex items-center gap-3 mb-4">
                    <span class="live-dot scale-125"></span>
                    <span class="text-xs font-bold uppercase tracking-widest text-emerald-400">Currently Working At</span>
                </div>
                <h3 class="text-2xl md:text-3xl font-display font-bold text-white mb-1">
                    {{ $personal->current_company }}
                </h3>
                <p class="text-indigo-300 font-semibold text-lg mb-2">{{ $personal->current_role }}</p>
                @if($personal->current_role_start)
                <p class="text-slate-400 text-sm mb-5">
                    Since {{ \Carbon\Carbon::parse($personal->current_role_start)->format('F Y') }} · {{ \Carbon\Carbon::parse($personal->current_role_start)->diffForHumans(['parts' => 2]) }}
                </p>
                @endif
                <p class="text-slate-400 text-sm leading-relaxed max-w-lg mb-6">
                    Contributing to digital growth as a Full Stack Developer & SEO Expert — building Laravel-powered applications and driving organic search performance for Australian businesses.
                </p>
                @if($personal->current_company_url)
                <a href="{{ $personal->current_company_url }}" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-white/5 border border-white/10 text-sm font-semibold text-white hover:bg-white/10 hover:border-indigo-400/40 transition-all">
                    Visit {{ $personal->current_company }}
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
                @endif
            </div>
            <div class="employment-right">
                <div class="emp-stat">
                    <div class="emp-stat-icon">🇦🇺</div>
                    <div>
                        <p class="text-white font-semibold text-sm">Australia</p>
                        <p class="text-slate-500 text-xs">Remote</p>
                    </div>
                </div>
                <div class="emp-stat">
                    <div class="emp-stat-icon">⚡</div>
                    <div>
                        <p class="text-white font-semibold text-sm">Full-Time</p>
                        <p class="text-slate-500 text-xs">Employment Type</p>
                    </div>
                </div>
                <div class="emp-stat">
                    <div class="emp-stat-icon">🔍</div>
                    <div>
                        <p class="text-white font-semibold text-sm">Dev + SEO</p>
                        <p class="text-slate-500 text-xs">Dual Role</p>
                    </div>
                </div>
                <div class="emp-stat">
                    <div class="emp-stat-icon">🌐</div>
                    <div>
                        <p class="text-white font-semibold text-sm">Laravel Expert</p>
                        <p class="text-slate-500 text-xs">Primary Stack</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  EXPERIENCE TIMELINE                                        --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($experiences->isNotEmpty())
<section class="py-24 reveal">
    <div class="max-w-6xl mx-auto px-6">
        <div class="section-tag">Career</div>
        <h2 class="font-display text-3xl md:text-4xl font-bold text-center mb-4">
            Work <span class="gradient-text">Experience</span>
        </h2>
        <p class="text-center text-slate-400 mb-16 max-w-xl mx-auto">
            My professional journey — building products and driving growth across Nepal and Australia.
        </p>

        <div class="exp-timeline">
            @foreach($experiences as $exp)
            <div class="exp-item">
                <div class="exp-dot-wrap">
                    <div class="exp-dot {{ $exp->is_current ? 'exp-dot-current' : '' }}">
                        @if($exp->is_current)<span class="exp-dot-pulse"></span>@endif
                    </div>
                    <div class="exp-line"></div>
                </div>
                <div class="exp-card {{ $exp->is_current ? 'exp-card-current' : '' }}">
                    <div class="exp-card-header">
                        @if($exp->company_logo)
                        <img src="{{ asset('storage/'.$exp->company_logo) }}" alt="{{ $exp->company_name }}" class="exp-logo">
                        @else
                        <div class="exp-logo-placeholder">
                            <svg class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                        @endif
                        <div class="exp-header-text">
                            <h3 class="exp-position">{{ $exp->position }}</h3>
                            <div class="flex flex-wrap items-center gap-2 mt-1">
                                @if($exp->company_url)
                                <a href="{{ $exp->company_url }}" target="_blank" rel="noopener noreferrer" class="exp-company hover:text-indigo-300 transition-colors">{{ $exp->company_name }}</a>
                                @else
                                <span class="exp-company">{{ $exp->company_name }}</span>
                                @endif
                                @if($exp->employment_type)
                                <span class="exp-badge">{{ $exp->employment_type }}</span>
                                @endif
                                @if($exp->is_current)
                                <span class="exp-badge exp-badge-current">Current</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="exp-meta">
                        <span class="exp-date">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            {{ $exp->start_date->format('M Y') }} — {{ $exp->is_current ? 'Present' : ($exp->end_date ? $exp->end_date->format('M Y') : 'Present') }}
                            <span class="exp-duration">
                                · {{ $exp->start_date->diffForHumans($exp->end_date ?? now(), ['parts' => 2, 'syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE]) }}
                            </span>
                        </span>
                        @if($exp->location)
                        <span class="exp-location">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            {{ $exp->location }}
                        </span>
                        @endif
                    </div>
                    @if($exp->description)
                    <p class="exp-desc">{{ $exp->description }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  PARTNERS                                                    --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($partners->isNotEmpty())
<section class="py-16 reveal">
    <div class="max-w-6xl mx-auto px-6">
        <p class="text-center text-xs font-bold uppercase tracking-widest text-slate-500 mb-8">Trusted Partners & Clients</p>
        <div class="partners-track-wrap">
            <div class="partners-track">
                @foreach($partners as $partner)
                <div class="partner-item">
                    @if($partner->website_url)
                    <a href="{{ $partner->website_url }}" target="_blank" rel="noopener noreferrer" class="partner-link" title="{{ $partner->name }}">
                    @else
                    <div class="partner-link" title="{{ $partner->name }}">
                    @endif
                        @if($partner->logo)
                        <img src="{{ asset('storage/'.$partner->logo) }}" alt="{{ $partner->name }}" class="partner-logo">
                        @else
                        <span class="partner-name-text">{{ $partner->name }}</span>
                        @endif
                    @if($partner->website_url)
                    </a>
                    @else
                    </div>
                    @endif
                </div>
                @endforeach
                {{-- Duplicate for seamless scroll --}}
                @foreach($partners as $partner)
                <div class="partner-item" aria-hidden="true">
                    <div class="partner-link" title="{{ $partner->name }}">
                        @if($partner->logo)
                        <img src="{{ asset('storage/'.$partner->logo) }}" alt="{{ $partner->name }}" class="partner-logo">
                        @else
                        <span class="partner-name-text">{{ $partner->name }}</span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  FEATURED PROJECTS                                          --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($featured->isNotEmpty())
<section class="py-28 reveal">
    <div class="max-w-6xl mx-auto px-6">
        <div class="section-tag">Portfolio</div>
        <div class="flex flex-col md:flex-row justify-between items-end mb-14">
            <div>
                <h2 class="font-display text-3xl md:text-5xl font-bold">
                    Featured <span class="gradient-text">Projects</span>
                </h2>
                <p class="text-slate-400 mt-3 max-w-md text-base">
                    Laravel applications & SEO-optimised websites built for businesses across Nepal and Australia.
                </p>
            </div>
            <a href="{{ route('portfolio') }}"
               class="mt-5 md:mt-0 inline-flex items-center gap-2 text-sm font-semibold text-slate-400 hover:text-white border border-slate-700 hover:border-slate-500 px-4 py-2 rounded-lg transition-all">
                View All
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($featured as $index => $project)
            <a href="{{ route('portfolio.show', $project->id) }}" class="proj-card group">
                <div class="proj-img"
                     style="{{ $project->image_url ? 'background-image:url('.asset('storage/'.$project->image_url).');' : '' }}">
                    @if(!$project->image_url)
                    <div class="proj-placeholder">
                        <svg class="w-10 h-10 text-slate-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    @endif
                    <div class="proj-img-overlay"></div>
                    <div class="proj-number">#{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                </div>
                <div class="proj-body">
                    <h3 class="proj-title group-hover:text-indigo-300 transition-colors duration-300">{{ $project->title }}</h3>
                    @if($project->skills->isNotEmpty())
                    <div class="proj-skills">
                        @foreach($project->skills->take(4) as $skill)
                        <span class="proj-skill">{{ $skill->skill_name }}</span>
                        @endforeach
                        @if($project->skills->count() > 4)
                        <span class="proj-skill">+{{ $project->skills->count() - 4 }}</span>
                        @endif
                    </div>
                    @endif
                    <div class="proj-arrow">
                        <span class="text-xs text-slate-500 group-hover:text-indigo-400 transition-colors">View Case Study</span>
                        <svg class="w-4 h-4 text-slate-600 group-hover:text-indigo-400 transition-all duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  SKILLS                                                     --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($skills->isNotEmpty())
<section class="py-24 reveal">
    <div class="max-w-6xl mx-auto px-6">
        <div class="section-tag">Tech Stack</div>
        <h2 class="font-display text-3xl md:text-4xl font-bold text-center mb-14">
            Skills & <span class="gradient-text">Technologies</span>
        </h2>

        {{-- Group by category --}}
        @php
            $grouped = $skills->groupBy(fn($s) => $s->category ?: 'Development');
            $seoGroup = collect(['Technical SEO','On-Page SEO','Keyword Research','Content Strategy','Local SEO','Analytics','Core Web Vitals','Link Building']);
        @endphp

        <div class="space-y-8">
            @foreach($grouped as $category => $catSkills)
            <div class="skill-group">
                <h4 class="skill-cat-label">{{ $category }}</h4>
                <div class="flex flex-wrap gap-3">
                    @foreach($catSkills as $skill)
                    <div class="skill-pill" style="--pct: {{ $skill->proficiency }}%">
                        <span class="skill-pill-name">{{ $skill->skill_name }}</span>
                        <span class="skill-pill-pct">{{ $skill->proficiency }}%</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach

            {{-- SEO skills always shown --}}
            <div class="skill-group">
                <h4 class="skill-cat-label seo-cat">SEO & Digital Marketing</h4>
                <div class="flex flex-wrap gap-3">
                    @foreach($seoGroup as $s)
                    <div class="skill-pill seo-pill">
                        <span class="skill-pill-name">{{ $s }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  SERVICES                                                   --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($services->isNotEmpty())
<section class="py-24 reveal">
    <div class="max-w-6xl mx-auto px-6">
        <div class="section-tag">Services</div>
        <div class="flex flex-col md:flex-row justify-between items-end mb-12">
            <h2 class="font-display text-3xl md:text-4xl font-bold">
                What I <span class="gradient-text">Offer</span>
            </h2>
            <a href="{{ route('services') }}"
               class="mt-4 md:mt-0 text-sm font-semibold text-slate-400 hover:text-white border border-slate-700 hover:border-slate-500 px-4 py-2 rounded-lg transition-all inline-flex items-center gap-2">
                All Services
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($services as $i => $service)
            <div class="svc-card" style="animation-delay: {{ $i * 0.08 }}s">
                @if($service->photo)
                <div class="svc-icon-img"><img src="{{ asset('storage/'.$service->photo) }}" alt="{{ $service->service_name }}" class="w-full h-full object-cover"></div>
                @else
                <div class="svc-icon-default">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                </div>
                @endif
                <h3 class="svc-title">{{ $service->service_name }}</h3>
                <p class="svc-desc">{{ Str::limit(strip_tags($service->description), 100) }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  CTA                                                        --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
<section class="py-28 reveal">
    <div class="max-w-6xl mx-auto px-6">
        <div class="cta-banner">
            <div class="cta-glow-1"></div>
            <div class="cta-glow-2"></div>
            <div class="relative z-10 text-center">
                <p class="text-xs font-bold uppercase tracking-widest text-indigo-400 mb-4">Ready to collaborate?</p>
                <h2 class="font-display text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-5 leading-tight">
                    Let's Build Something<br>
                    <span class="gradient-text">Extraordinary</span>
                </h2>
                <p class="text-slate-400 text-lg max-w-xl mx-auto mb-10">
                    Whether you need a high-performance Laravel app or a top-ranking SEO strategy — I'm your developer.
                </p>
                <div class="flex flex-wrap gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="cta-primary text-base px-8 py-4">
                        Start a Project
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                    <a href="{{ route('portfolio') }}" class="cta-ghost text-base px-8 py-4">View Portfolio</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<style>
/* ── Spotlight ── */
#spotlight {
    position: fixed; pointer-events: none; z-index: 2;
    width: 500px; height: 500px; border-radius: 50%;
    background: radial-gradient(circle, rgba(99,102,241,.07) 0%, transparent 65%);
    transform: translate(-50%,-50%);
    transition: left .08s ease, top .08s ease;
    top: -999px; left: -999px;
}

/* ── Hero mesh bg ── */
.hero-mesh {
    position: absolute; inset: 0;
    background:
        radial-gradient(ellipse 80% 50% at 20% 40%, rgba(99,102,241,.12) 0%, transparent 60%),
        radial-gradient(ellipse 60% 40% at 80% 60%, rgba(6,182,212,.08) 0%, transparent 60%),
        radial-gradient(ellipse 50% 50% at 50% 100%, rgba(168,85,247,.06) 0%, transparent 60%);
}
.hero-grid {
    background-image: linear-gradient(rgba(99,102,241,.04) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(99,102,241,.04) 1px, transparent 1px);
    background-size: 60px 60px;
}

/* ── Hero animations ── */
@keyframes heroIn {
    from { opacity:0; transform: translateY(24px); }
    to   { opacity:1; transform: translateY(0); }
}
@keyframes heroPhotoIn {
    from { opacity:0; transform: scale(.92) translateY(20px); }
    to   { opacity:1; transform: scale(1) translateY(0); }
}

/* ── Hero badge ── */
.hero-badge {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 6px 16px; border-radius: 100px; margin-bottom: 20px;
    background: rgba(16,185,129,.08); border: 1px solid rgba(16,185,129,.2);
    font-size: .75rem; font-weight: 600;
    animation: heroIn .6s ease forwards; opacity: 0;
}
.live-dot {
    width: 8px; height: 8px; border-radius: 50%;
    background: #10b981; flex-shrink: 0;
    box-shadow: 0 0 0 0 rgba(16,185,129,.5);
    animation: livePulse 2s ease infinite;
}
@keyframes livePulse {
    0%   { box-shadow: 0 0 0 0 rgba(16,185,129,.5); }
    70%  { box-shadow: 0 0 0 8px rgba(16,185,129,0); }
    100% { box-shadow: 0 0 0 0 rgba(16,185,129,0); }
}
.badge-text { color: #6ee7b7; }
.badge-sep  { color: rgba(110,231,183,.5); }
.badge-link { color: #34d399; text-decoration: underline; text-underline-offset: 3px; }
.badge-link:hover { color: #6ee7b7; }
.badge-since { color: rgba(110,231,183,.5); }

/* ── Hero text ── */
.hero-greeting {
    font-family: 'Space Grotesk', sans-serif;
    font-size: 1.1rem; font-weight: 500;
    color: #94a3b8; margin-bottom: 10px;
    animation: heroIn .6s ease forwards; opacity: 0;
}
.hero-name {
    font-family: 'Space Grotesk', sans-serif;
    font-size: clamp(2.4rem, 6vw, 4.5rem);
    font-weight: 800; line-height: 1.05;
    color: #f8fafc; margin-bottom: 12px;
    animation: heroIn .6s ease forwards; opacity: 0;
    letter-spacing: -.02em;
}
.hero-role {
    display: flex; flex-wrap: wrap; align-items: center; gap: 10px;
    margin-bottom: 20px; justify-content: center;
    animation: heroIn .6s ease forwards; opacity: 0;
}
@media (min-width: 1024px) { .hero-role { justify-content: flex-start; } }
.role-dev {
    font-family: 'Space Grotesk', sans-serif;
    font-size: clamp(1.4rem, 3.5vw, 2.2rem); font-weight: 700;
    background: linear-gradient(135deg, #6366f1, #06b6d4);
    -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
}
.role-amp {
    font-size: clamp(1.2rem, 3vw, 1.8rem); color: #475569;
}
.role-seo {
    font-family: 'Space Grotesk', sans-serif;
    font-size: clamp(1.4rem, 3.5vw, 2.2rem); font-weight: 700;
    background: linear-gradient(135deg, #f59e0b, #f97316);
    -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
}
.hero-sub {
    color: #94a3b8; font-size: 1.05rem; line-height: 1.75;
    max-width: 520px; margin-bottom: 36px;
    animation: heroIn .6s ease forwards; opacity: 0;
    margin-left: auto; margin-right: auto;
}
@media (min-width: 1024px) { .hero-sub { margin-left: 0; } }

/* ── CTAs ── */
.hero-ctas {
    display: flex; flex-wrap: wrap; gap: 14px;
    justify-content: center; margin-bottom: 40px;
    animation: heroIn .6s ease forwards; opacity: 0;
}
@media (min-width: 1024px) { .hero-ctas { justify-content: flex-start; } }
.cta-primary {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 14px 28px; border-radius: 12px; font-weight: 700; font-size: .9rem;
    background: linear-gradient(135deg, #6366f1, #a855f7);
    color: #fff; transition: all .3s ease; position: relative; overflow: hidden;
}
.cta-primary::after {
    content:''; position: absolute; inset: 0;
    background: linear-gradient(135deg, #818cf8, #c084fc);
    opacity: 0; transition: opacity .3s;
}
.cta-primary:hover::after { opacity: 1; }
.cta-primary:hover { transform: translateY(-3px); box-shadow: 0 12px 32px rgba(99,102,241,.4); }
.cta-primary > * { position: relative; z-index: 1; }
.cta-ghost {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 13px 28px; border-radius: 12px; font-weight: 700; font-size: .9rem;
    border: 1.5px solid rgba(99,102,241,.4); color: #818cf8;
    background: rgba(99,102,241,.05); transition: all .3s;
}
.cta-ghost:hover { background: rgba(99,102,241,.12); border-color: #6366f1; color: #c7d2fe; transform: translateY(-3px); }

/* ── Stats ── */
.hero-stats {
    display: flex; align-items: center; gap: 0;
    animation: heroIn .6s ease forwards; opacity: 0;
    background: rgba(13,17,23,.8); border: 1px solid rgba(99,102,241,.12);
    border-radius: 16px; padding: 20px 28px; width: fit-content;
    margin: 0 auto;
}
@media (min-width: 1024px) { .hero-stats { margin: 0; } }
.stat-item { text-align: center; padding: 0 24px; }
.stat-num {
    display: block; font-family: 'Space Grotesk', sans-serif;
    font-size: 2rem; font-weight: 800; line-height: 1;
    background: linear-gradient(135deg, #6366f1, #06b6d4);
    -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
}
.stat-plus { font-family: 'Space Grotesk', sans-serif; font-size: 1.5rem; font-weight: 800; color: #6366f1; }
.stat-label { display: block; font-size: .7rem; color: #64748b; margin-top: 4px; text-transform: uppercase; letter-spacing: .08em; font-weight: 600; }
.stat-divider { width: 1px; height: 48px; background: rgba(99,102,241,.2); flex-shrink: 0; }

/* ── Photo wrapper ── */
.photo-wrapper { position: relative; display: inline-block; }
.photo-ring {
    position: relative; display: inline-block;
    padding: 4px; border-radius: 50%;
    background: conic-gradient(#6366f1, #06b6d4, #a855f7, #f59e0b, #6366f1);
}
.photo-img {
    width: 280px; height: 280px; border-radius: 50%;
    object-fit: cover; display: block;
    border: 4px solid #050816; position: relative; z-index: 1;
}
.photo-placeholder {
    width: 280px; height: 280px; border-radius: 50%;
    background: linear-gradient(135deg, #4f46e5, #a855f7, #06b6d4);
    display: flex; align-items: center; justify-content: center;
    font-family: 'Space Grotesk', sans-serif; font-size: 3.5rem; font-weight: 800; color: white;
    border: 4px solid #050816;
}
@media (min-width: 1024px) {
    .photo-img, .photo-placeholder { width: 340px; height: 340px; }
}

/* ── Floating chips ── */
.chip {
    position: absolute; display: flex; align-items: center; gap: 5px;
    padding: 6px 12px; border-radius: 100px; font-size: .7rem; font-weight: 700;
    backdrop-filter: blur(12px); animation: chipFloat 6s ease-in-out infinite;
}
.chip-laravel { top: 10%; right: -20px; background: rgba(239,68,68,.15); border: 1px solid rgba(239,68,68,.3); color: #fca5a5; animation-delay: 0s; }
.chip-seo     { bottom: 20%; right: -30px; background: rgba(245,158,11,.15); border: 1px solid rgba(245,158,11,.3); color: #fde68a; animation-delay: 1.5s; }
.chip-php     { top: 30%; left: -25px; background: rgba(139,92,246,.15); border: 1px solid rgba(139,92,246,.3); color: #c4b5fd; animation-delay: 3s; }
@keyframes chipFloat {
    0%,100% { transform: translateY(0) rotate(-2deg); }
    50%      { transform: translateY(-12px) rotate(2deg); }
}

/* ── Scroll hint ── */
.scroll-hint {
    position: absolute; bottom: 32px; left: 50%; transform: translateX(-50%);
    display: flex; flex-direction: column; align-items: center; gap: 8px;
    color: #334155; font-size: .65rem; letter-spacing: .15em; text-transform: uppercase;
}
.scroll-line {
    width: 1px; height: 40px;
    background: linear-gradient(to bottom, rgba(99,102,241,.6), transparent);
    animation: scrollPulse 2s ease-in-out infinite;
}
@keyframes scrollPulse { 0%,100% { opacity: .4; height: 40px; } 50% { opacity: 1; height: 48px; } }

/* ── Expertise cards ── */
.expertise-card {
    padding: 36px; border-radius: 20px; position: relative;
    border: 1px solid rgba(99,102,241,.12);
    background: rgba(13,17,23,.9);
    transition: all .4s ease; overflow: hidden;
}
.expertise-card::before {
    content:''; position: absolute; inset: 0; opacity: 0; transition: opacity .4s;
    border-radius: 20px;
}
.expertise-dev::before { background: linear-gradient(135deg, rgba(99,102,241,.06), transparent); }
.expertise-seo::before { background: linear-gradient(135deg, rgba(245,158,11,.06), transparent); }
.expertise-card:hover::before { opacity: 1; }
.expertise-dev:hover { border-color: rgba(99,102,241,.35); box-shadow: 0 24px 48px rgba(0,0,0,.5), 0 0 40px rgba(99,102,241,.08); transform: translateY(-4px); }
.expertise-seo:hover { border-color: rgba(245,158,11,.35); box-shadow: 0 24px 48px rgba(0,0,0,.5), 0 0 40px rgba(245,158,11,.08); transform: translateY(-4px); }
.expertise-icon-wrap {
    width: 56px; height: 56px; border-radius: 14px;
    display: flex; align-items: center; justify-content: center; margin-bottom: 20px;
}
.dev-icon { background: rgba(99,102,241,.15); border: 1px solid rgba(99,102,241,.25); color: #818cf8; }
.seo-icon { background: rgba(245,158,11,.15); border: 1px solid rgba(245,158,11,.25); color: #fbbf24; }
.expertise-title { font-family: 'Space Grotesk', sans-serif; font-size: 1.3rem; font-weight: 700; color: #f8fafc; margin-bottom: 12px; }
.expertise-desc { color: #94a3b8; font-size: .9rem; line-height: 1.7; margin-bottom: 20px; }
.expertise-tags { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 24px; }
.etag { padding: 4px 11px; border-radius: 100px; font-size: .7rem; font-weight: 600; }
.etag-dev { background: rgba(99,102,241,.12); border: 1px solid rgba(99,102,241,.25); color: #a5b4fc; }
.etag-seo { background: rgba(245,158,11,.12); border: 1px solid rgba(245,158,11,.25); color: #fde68a; }
.expertise-footer { display: flex; align-items: center; gap: 8px; padding-top: 16px; border-top: 1px solid rgba(255,255,255,.05); }
.dev-footer { color: #6366f1; }
.seo-footer { color: #f59e0b; }

/* ── Employment card ── */
.employment-card {
    background: linear-gradient(135deg, rgba(13,17,23,.95), rgba(16,21,35,.95));
    border: 1px solid rgba(99,102,241,.2);
    border-radius: 24px; padding: 40px;
    display: flex; flex-direction: column; gap: 32px;
    position: relative; overflow: hidden;
}
.employment-card::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
    background: linear-gradient(90deg, #6366f1, #06b6d4, #a855f7, #f59e0b);
}
.employment-card::after {
    content: ''; position: absolute; top: -80px; right: -80px;
    width: 300px; height: 300px; border-radius: 50%;
    background: radial-gradient(circle, rgba(6,182,212,.06), transparent 70%);
    pointer-events: none;
}
@media (min-width: 768px) {
    .employment-card { flex-direction: row; align-items: flex-start; gap: 48px; padding: 48px 56px; }
}
.employment-left { flex: 1; }
.employment-right {
    display: grid; grid-template-columns: 1fr 1fr; gap: 16px;
    flex-shrink: 0; width: 100%;
}
@media (min-width: 768px) { .employment-right { width: 260px; } }
.emp-stat {
    display: flex; align-items: center; gap: 12px;
    background: rgba(255,255,255,.03); border: 1px solid rgba(255,255,255,.06);
    border-radius: 12px; padding: 14px;
}
.emp-stat-icon { font-size: 1.4rem; line-height: 1; }

/* ── Project cards ── */
.proj-card {
    display: block; background: rgba(13,17,23,.9);
    border: 1px solid rgba(255,255,255,.06);
    border-radius: 18px; overflow: hidden;
    transition: all .4s cubic-bezier(.4,0,.2,1);
}
.proj-card:hover {
    border-color: rgba(99,102,241,.35);
    transform: translateY(-6px);
    box-shadow: 0 28px 56px rgba(0,0,0,.5), 0 0 30px rgba(99,102,241,.08);
}
.proj-img {
    height: 200px; position: relative;
    background-size: cover; background-position: center;
    background-color: #0d1117;
    overflow: hidden;
}
.proj-img-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(5,8,22,.7), transparent);
    opacity: 0; transition: opacity .4s;
}
.proj-card:hover .proj-img-overlay { opacity: 1; }
.proj-placeholder { width:100%; height:100%; display:flex; align-items:center; justify-content:center; }
.proj-number {
    position: absolute; top: 12px; left: 14px;
    font-family: 'Space Grotesk', sans-serif; font-size: .7rem; font-weight: 700;
    color: rgba(255,255,255,.3); letter-spacing: .1em;
}
.proj-body { padding: 20px 22px 18px; }
.proj-title { font-family: 'Space Grotesk', sans-serif; font-size: 1rem; font-weight: 700; color: #f1f5f9; margin-bottom: 10px; }
.proj-skills { display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 14px; }
.proj-skill {
    padding: 3px 10px; border-radius: 100px; font-size: .65rem; font-weight: 600;
    background: rgba(99,102,241,.12); border: 1px solid rgba(99,102,241,.25); color: #a5b4fc;
}
.proj-arrow { display: flex; align-items: center; justify-content: space-between; padding-top: 12px; border-top: 1px solid rgba(255,255,255,.04); }

/* ── Skills ── */
.skill-group { padding: 24px; background: rgba(13,17,23,.7); border: 1px solid rgba(255,255,255,.05); border-radius: 16px; }
.skill-cat-label {
    font-size: .65rem; font-weight: 700; letter-spacing: .12em; text-transform: uppercase;
    color: #6366f1; margin-bottom: 14px; display: flex; align-items: center; gap: 8px;
}
.skill-cat-label::after { content:''; flex: 1; height: 1px; background: rgba(99,102,241,.2); }
.seo-cat { color: #f59e0b; }
.seo-cat::after { background: rgba(245,158,11,.2); }
.skill-pill {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 8px 16px; border-radius: 10px;
    background: rgba(22,27,39,.9); border: 1px solid rgba(99,102,241,.15);
    transition: all .2s; cursor: default;
    position: relative; overflow: hidden;
}
.skill-pill::before {
    content:''; position: absolute; left: 0; top: 0; bottom: 0;
    width: var(--pct, 0%); background: rgba(99,102,241,.1);
    border-right: 1px solid rgba(99,102,241,.2);
    transition: width 1s ease;
}
.skill-pill:hover { border-color: rgba(99,102,241,.4); background: rgba(99,102,241,.08); }
.skill-pill-name { font-size: .8rem; font-weight: 600; color: #cbd5e1; position: relative; z-index: 1; }
.skill-pill-pct { font-size: .65rem; font-weight: 700; color: #6366f1; position: relative; z-index: 1; }
.seo-pill { border-color: rgba(245,158,11,.15); }
.seo-pill::before { background: rgba(245,158,11,.08); border-right-color: rgba(245,158,11,.2); }
.seo-pill:hover { border-color: rgba(245,158,11,.4); background: rgba(245,158,11,.06); }

/* ── Services ── */
.svc-card {
    padding: 28px; border-radius: 16px; position: relative;
    background: rgba(13,17,23,.9); border: 1px solid rgba(255,255,255,.06);
    transition: all .35s ease;
}
.svc-card:hover { border-color: rgba(99,102,241,.3); transform: translateY(-4px); box-shadow: 0 20px 40px rgba(0,0,0,.4); }
.svc-icon-img { width: 44px; height: 44px; border-radius: 10px; overflow: hidden; margin-bottom: 16px; border: 1px solid rgba(99,102,241,.2); }
.svc-icon-default {
    width: 44px; height: 44px; border-radius: 10px; margin-bottom: 16px;
    background: rgba(99,102,241,.12); border: 1px solid rgba(99,102,241,.2);
    display: flex; align-items: center; justify-content: center;
}
.svc-title { font-family: 'Space Grotesk', sans-serif; font-size: 1rem; font-weight: 700; color: #f1f5f9; margin-bottom: 8px; }
.svc-desc { font-size: .85rem; color: #64748b; line-height: 1.65; }

/* ── Experience timeline ── */
.exp-timeline { display: flex; flex-direction: column; gap: 0; }
.exp-item { display: flex; gap: 20px; }
.exp-dot-wrap { display: flex; flex-direction: column; align-items: center; flex-shrink: 0; padding-top: 4px; }
.exp-dot {
    width: 16px; height: 16px; border-radius: 50%; flex-shrink: 0;
    background: rgba(99,102,241,.2); border: 2px solid rgba(99,102,241,.4);
    position: relative; z-index: 1;
}
.exp-dot-current {
    background: rgba(16,185,129,.2); border-color: #10b981;
}
.exp-dot-pulse {
    position: absolute; inset: -4px; border-radius: 50%;
    background: rgba(16,185,129,.3); animation: livePulse 2s ease infinite;
}
.exp-line { flex: 1; width: 2px; background: rgba(99,102,241,.1); margin: 6px 0; min-height: 24px; }
.exp-item:last-child .exp-line { display: none; }
.exp-card {
    flex: 1; padding: 22px 26px; border-radius: 16px; margin-bottom: 20px;
    background: rgba(13,17,23,.8); border: 1px solid rgba(255,255,255,.06);
    transition: all .3s ease;
}
.exp-card:hover { border-color: rgba(99,102,241,.25); background: rgba(13,17,23,.95); }
.exp-card-current {
    border-color: rgba(16,185,129,.2);
    background: linear-gradient(135deg, rgba(13,17,23,.9), rgba(16,185,129,.03));
}
.exp-card-current:hover { border-color: rgba(16,185,129,.4); }
.exp-card-header { display: flex; align-items: flex-start; gap: 14px; margin-bottom: 10px; }
.exp-logo { width: 44px; height: 44px; border-radius: 10px; object-fit: contain; background: rgba(255,255,255,.05); border: 1px solid rgba(255,255,255,.08); padding: 4px; flex-shrink: 0; }
.exp-logo-placeholder { width: 44px; height: 44px; border-radius: 10px; background: rgba(99,102,241,.1); border: 1px solid rgba(99,102,241,.2); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.exp-header-text { flex: 1; }
.exp-position { font-family: 'Space Grotesk', sans-serif; font-size: 1rem; font-weight: 700; color: #f1f5f9; }
.exp-company { font-size: .85rem; font-weight: 600; color: #818cf8; }
.exp-badge {
    font-size: .65rem; font-weight: 700; padding: 2px 8px; border-radius: 100px;
    background: rgba(99,102,241,.12); border: 1px solid rgba(99,102,241,.25); color: #a5b4fc;
}
.exp-badge-current { background: rgba(16,185,129,.12); border-color: rgba(16,185,129,.3); color: #6ee7b7; }
.exp-meta { display: flex; flex-wrap: wrap; gap: 14px; margin-bottom: 10px; }
.exp-date { display: flex; align-items: center; gap: 5px; font-size: .75rem; color: #64748b; }
.exp-duration { color: #475569; }
.exp-location { display: flex; align-items: center; gap: 5px; font-size: .75rem; color: #64748b; }
.exp-desc { font-size: .85rem; color: #94a3b8; line-height: 1.7; }

/* ── Partners marquee ── */
.partners-track-wrap { overflow: hidden; mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent); }
.partners-track {
    display: flex; align-items: center; gap: 40px; width: max-content;
    animation: marquee 25s linear infinite;
}
.partners-track:hover { animation-play-state: paused; }
@keyframes marquee {
    from { transform: translateX(0); }
    to   { transform: translateX(-50%); }
}
.partner-item { flex-shrink: 0; }
.partner-link {
    display: flex; align-items: center; justify-content: center;
    padding: 14px 24px; border-radius: 12px; height: 64px; min-width: 120px;
    background: rgba(13,17,23,.7); border: 1px solid rgba(255,255,255,.06);
    transition: all .3s; filter: grayscale(100%) opacity(0.5);
}
.partner-link:hover { filter: grayscale(0%) opacity(1); border-color: rgba(99,102,241,.3); }
.partner-logo { max-height: 36px; max-width: 100px; object-fit: contain; }
.partner-name-text { font-size: .8rem; font-weight: 700; color: #64748b; white-space: nowrap; }

/* ── CTA banner ── */
.cta-banner {
    position: relative; overflow: hidden;
    border-radius: 28px; padding: 72px 40px;
    background: rgba(13,17,23,.95);
    border: 1px solid rgba(99,102,241,.15);
}
.cta-glow-1 {
    position: absolute; width: 500px; height: 500px; border-radius: 50%;
    background: radial-gradient(circle, rgba(99,102,241,.12), transparent 60%);
    top: -150px; left: -150px; pointer-events: none;
}
.cta-glow-2 {
    position: absolute; width: 400px; height: 400px; border-radius: 50%;
    background: radial-gradient(circle, rgba(245,158,11,.08), transparent 60%);
    bottom: -100px; right: -100px; pointer-events: none;
}
</style>

<script>
// Spotlight effect
document.addEventListener('mousemove', e => {
    const s = document.getElementById('spotlight');
    s.style.left = e.clientX + 'px';
    s.style.top  = e.clientY + 'px';
});

// Animate counters when in view
const counterObs = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        entry.target.querySelectorAll('.stat-num').forEach(el => {
            const target = parseInt(el.dataset.count);
            let cur = 0;
            const step = target / 50;
            const t = setInterval(() => {
                cur += step;
                if (cur >= target) { cur = target; clearInterval(t); }
                el.textContent = Math.floor(cur);
            }, 30);
        });
        counterObs.unobserve(entry.target);
    });
}, { threshold: 0.5 });
document.querySelectorAll('.hero-stats').forEach(el => counterObs.observe(el));

// Skill pill fill on scroll
const pillObs = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        // pills use CSS transition, trigger via data attribute
        entry.target.querySelectorAll('.skill-pill').forEach((pill, i) => {
            setTimeout(() => {
                const pct = pill.style.getPropertyValue('--pct');
                if (pct) {
                    pill.style.setProperty('--pct-active', pct);
                    pill.style.setProperty('--pct', pct);
                }
            }, i * 40);
        });
        pillObs.unobserve(entry.target);
    });
}, { threshold: 0.2 });
document.querySelectorAll('.skill-group').forEach(el => pillObs.observe(el));
</script>
@endpush
