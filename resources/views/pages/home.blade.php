@extends('layouts.app')

@section('title', $seo->meta_title ?? 'Nabaraj Acharya — Full Stack Developer & SEO Specialist in Nepal | Laravel Developer')
@section('description', $seo->meta_description ?? 'Nabaraj Acharya is a Full Stack Developer and SEO Specialist in Nepal, helping brands grow with Laravel and technical SEO across Nepal, Khotang, and Lalitpur.')
@section('keywords', $seo->meta_keywords ?? 'full stack developer nepal, laravel developer nepal, seo specialist in nepal, seo specialist in khotang, seo specialist in lalitpur, seo specalist in khotang, seo specalist in lalitpur')
@section('canonical', route('home'))

@section('schema')
@php
    $homeSchema = ['@context'=>'https://schema.org','@type'=>'WebSite','name'=>'Nabaraj Acharya — Full Stack Developer & SEO Specialist in Nepal','url'=>'https://nabrajacharya.com.np','description'=>'Portfolio of Nabaraj Acharya, Full Stack Developer and SEO Specialist in Nepal, Khotang, and Lalitpur'];
    $orgSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'ProfessionalService',
        'name' => 'TechNabu',
        'alternateName' => $personal->brand_name ?? 'Nabaraj Acharya',
        'url' => 'https://nabrajacharya.com.np',
        'description' => 'TechNabu is the Laravel development and technical SEO practice of Nabaraj Acharya, building web applications and growing search visibility for businesses in Nepal and abroad.',
        'founder' => ['@type' => 'Person', 'name' => $personal->brand_name ?? 'Nabaraj Acharya'],
        'areaServed' => [
            ['@type' => 'Country', 'name' => 'Nepal'],
            ['@type' => 'City', 'name' => 'Kathmandu'],
            ['@type' => 'City', 'name' => 'Lalitpur'],
        ],
        'address' => ['@type' => 'PostalAddress', 'addressCountry' => 'NP', 'addressLocality' => 'Lalitpur'],
        'email' => $personal->email ?? null,
        'telephone' => $personal->phone_number ?? null,
        'sameAs' => array_filter([
            $personal->facebook_url ?? '',
            $personal->linkedin_url ?? '',
            $personal->github_url ?? '',
            $personal->instagram_url ?? '',
        ]),
        'serviceType' => $services->pluck('service_name')->values()->all(),
    ];
    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($homeSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($orgSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')

@php
    $iconSvgs = [
        'code' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>',
        'laptop' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v9a2 2 0 01-2 2h-4M3 20h18M9 17v3m6-3v3"/>',
        'seo' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>',
        'rocket' => '<rect x="7" y="2" width="10" height="20" rx="2" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 18h2"/>',
    ];
    $pickFeatureIcon = function ($name) {
        $name = strtolower($name);
        if (str_contains($name, 'seo') || str_contains($name, 'market')) return 'seo';
        if (str_contains($name, 'app') || str_contains($name, 'mobile')) return 'rocket';
        if (str_contains($name, 'web') || str_contains($name, 'develop')) return 'laptop';
        return 'code';
    };
@endphp

{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  HERO                                                        --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
<section class="hero-kk-wrap">
    <div class="hero-kk-pattern"></div>
    <div class="hero-kk-blob"></div>
    <div class="hero-kk">
    <div class="hero-kk-grid">
        <div class="hero-kk-text reveal">
            <p class="hero-kk-greet">Namaste <span class="wave">👋</span></p>
            <p class="hero-kk-tag">
                {{ $personal->current_role ?? 'Full Stack Developer in Nepal' }}
                @if($personal && $personal->years_experience) | {{ $personal->years_experience }}+ Years Experience @endif
            </p>
            <h1 class="hero-kk-title">
                I'm {{ $personal->brand_name ?? 'Nabaraj Acharya' }}, a<br>
                <span class="accent">Laravel &amp; SEO Specialist.</span>
            </h1>
            <p class="hero-kk-desc">
                {{ $personal->description ?? 'I build fast, secure, and scalable web applications for startups and businesses, while helping them rank and grow with technical SEO.' }}
            </p>
            <div class="flex flex-wrap gap-4 mt-8">
                <a href="{{ route('portfolio') }}" class="btn-primary" data-magnetic data-cursor="link">
                    View My Work
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
                <a href="{{ route('contact') }}" class="btn-outline" data-magnetic data-cursor="link">Hire Me</a>
            </div>
        </div>

        <div class="hero-kk-photo reveal">
            <div class="hero-kk-photo-frame">
                @if($personal && $personal->profile_photo)
                    <img src="{{ Storage::url($personal->profile_photo) }}" alt="{{ $personal->brand_name ?? 'Nabaraj Acharya' }} Full Stack Developer SEO Expert Nepal">
                @else
                    <div class="hero-kk-photo-placeholder">{{ Str::substr($personal->brand_name ?? 'NA', 0, 2) }}</div>
                @endif
            </div>
        </div>
    </div>

    @if($services->isNotEmpty())
    <div class="hero-kk-features reveal">
        @foreach($services->take(4) as $service)
        <div class="hero-feature-card">
            <span class="hero-feature-icon">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">{!! $iconSvgs[$pickFeatureIcon($service->service_name)] !!}</svg>
            </span>
            <h3>{{ $service->service_name }}</h3>
        </div>
        @endforeach
    </div>
    @endif
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  QUICK ANSWER (AEO / GEO)                                    --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
<section class="pt-2 pb-6 reveal">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        @php
            $quickAnswer = ($personal->brand_name ?? 'Nabaraj Acharya') . ' is a Full Stack Developer and SEO Specialist based in Lalitpur, Nepal, trading as TechNabu. He builds Laravel web applications and provides technical SEO services for businesses in Nepal and abroad, with ' . ($personal->years_experience ?? '3') . '+ years of experience and ' . ($personal->completed_projects ?? '30') . '+ completed projects.';
        @endphp
        @include('partials.services-quick-answer')
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  STATS                                                       --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($personal)
<section class="py-16 md:py-20 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="stats-kk-grid">
            <div class="stats-kk-big glass-card">
                <span class="stats-kk-num">{{ $personal->years_experience ?? 0 }}+</span>
                <h3>Years Of Experience</h3>
                <p>I've been building websites and web applications, helping clients create fast, reliable, and scalable platforms that support long-term business growth.</p>
            </div>
            <div class="stats-kk-side">
                @if($personal->completed_projects)
                <div class="stats-kk-small glass-card">
                    <span class="stats-kk-num">{{ $personal->completed_projects }}+</span>
                    <p>Projects Completed</p>
                </div>
                @endif
                @if($personal->happy_clients)
                <div class="stats-kk-small glass-card">
                    <span class="stats-kk-num">{{ $personal->happy_clients }}+</span>
                    <p>Happy Clients</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  PARTNERS                                                    --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($partners->isNotEmpty())
<section class="py-12 md:py-16 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <p class="text-center text-xs font-bold uppercase tracking-widest mb-8" style="color: var(--ink-faint);">Trusted by teams in Nepal &amp; Australia</p>
        <div class="partners-kk-grid">
            @foreach($partners as $partner)
            <div class="partners-kk-item">
                @if($partner->logo)
                    <img src="{{ asset('storage/'.$partner->logo) }}" alt="{{ $partner->name }}">
                @else
                    <span>{{ $partner->name }}</span>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  SERVICES                                                    --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($services->isNotEmpty())
<section class="py-16 md:py-24 reveal" style="background: var(--bg-soft);">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14">
            <p class="section-tag">Latest Services</p>
            <h2 class="kk-h2">What I Can Help You With</h2>
            <p class="kk-sub mx-auto">Here's a quick look at the services I offer, all focused on helping businesses build reliable, fast, and easy-to-use digital solutions.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($services->take(4) as $i => $service)
            <a href="{{ route('services.' . $service->slug) }}" class="service-kk-card glass-card block">
                <span class="service-kk-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}.</span>
                <h3>{{ $service->service_name }}</h3>
                <p>{{ Str::limit(strip_tags($service->description), 140) }}</p>
            </a>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('services') }}" class="btn-outline" data-magnetic data-cursor="link">All Services →</a>
        </div>
    </div>
</section>
@endif


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  FEATURED PROJECTS                                          --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($featured->isNotEmpty())
<section class="py-16 md:py-24 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14">
            <p class="section-tag">Latest Portfolio</p>
            <h2 class="kk-h2">A Look at Some of My Recent Work</h2>
            <p class="kk-sub mx-auto">Here are a few projects I've worked on. Each one reflects real client needs and the practical solutions I build to help their business run better.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($featured as $project)
            <a href="{{ route('portfolio.show', $project) }}" class="proj-kk-card" data-cursor="link">
                <div class="proj-kk-browser">
                    <span class="proj-kk-dot"></span><span class="proj-kk-dot"></span><span class="proj-kk-dot"></span>
                    <span class="proj-kk-url">{{ $project->project_url ? Str::of($project->project_url)->after('://')->rtrim('/') : Str::slug($project->title) }}</span>
                </div>
                <div class="proj-kk-img">
                    @if($project->image_url)
                        <img src="{{ asset('storage/'.$project->image_url) }}" alt="{{ $project->title }}" loading="lazy">
                    @else
                        <div class="proj-kk-placeholder">
                            <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                    @endif
                </div>
                <div class="proj-kk-body">
                    <div>
                        <h3>{{ $project->title }}</h3>
                        @if($project->skills->isNotEmpty())
                        <p class="proj-kk-tags">{{ $project->skills->take(5)->pluck('skill_name')->join(' , ') }}</p>
                        @endif
                    </div>
                    <span class="proj-kk-arrow">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17L17 7M17 7H8M17 7v9"/></svg>
                    </span>
                </div>
            </a>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('portfolio') }}" class="btn-outline" data-magnetic data-cursor="link">View All Work →</a>
        </div>
    </div>
</section>
@endif


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  EXPERIENCE TIMELINE                                        --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($experiences->isNotEmpty())
<section class="py-16 md:py-24 reveal" style="background: var(--bg-soft);">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14">
            <p class="section-tag">Career</p>
            <h2 class="kk-h2">Work Experience</h2>
        </div>

        <div class="flex flex-col gap-5">
            @foreach($experiences as $exp)
            <div class="exp-kk-card glass-card">
                <div class="exp-kk-date">{{ $exp->start_date->format('M Y') }} — {{ $exp->is_current ? 'Now' : ($exp->end_date ? $exp->end_date->format('M Y') : 'Now') }}</div>
                <div class="exp-kk-body">
                    <div class="flex items-center gap-3 flex-wrap mb-1.5">
                        <h3>{{ $exp->position }}</h3>
                        @if($exp->is_current)<span class="exp-kk-current">Current</span>@endif
                    </div>
                    <p class="exp-kk-company">
                        @if($exp->company_url)<a href="{{ $exp->company_url }}" target="_blank" rel="noopener noreferrer" class="hover:underline">{{ $exp->company_name }}</a>@else{{ $exp->company_name }}@endif
                        @if($exp->employment_type) · {{ $exp->employment_type }} @endif
                        @if($exp->location) · {{ $exp->location }} @endif
                    </p>
                    @if($exp->description)<p class="exp-kk-desc">{{ $exp->description }}</p>@endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  SKILLS                                                     --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($skills->isNotEmpty())
<section class="py-16 md:py-24 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14">
            <p class="section-tag">Tech Stack</p>
            <h2 class="kk-h2">Skills &amp; Technologies</h2>
        </div>

        @php
            $grouped = $skills->groupBy(fn($s) => $s->category ?: 'Development');
            $seoGroup = collect(['Technical SEO','On-Page SEO','Keyword Research','Content Strategy','Local SEO','Analytics','Core Web Vitals','Link Building']);
            $skillIconSlugs = [
                'php' => 'php', 'python' => 'python', 'java' => 'openjdk', 'javascript' => 'javascript',
                'github' => 'github', 'figma' => 'figma', 'laravel' => 'laravel', 'css' => 'css',
                'bootstrap' => 'bootstrap', 'html' => 'html5', 'tailwind css' => 'tailwindcss', 'filament' => 'filament',
            ];
            $skillIcon = fn ($name) => $skillIconSlugs[strtolower(trim($name))] ?? null;
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($grouped as $category => $catSkills)
            <div class="skill-kk-group glass-card">
                <h4>{{ str($category)->headline() }}</h4>
                <div class="flex flex-wrap gap-2.5">
                    @foreach($catSkills as $skill)
                    <span class="skill-badge">
                        @if($slug = $skillIcon($skill->skill_name))
                        <img src="https://cdn.simpleicons.org/{{ $slug }}/5d6168" class="skill-badge-icon" alt="" onerror="this.remove()">
                        @endif
                        {{ $skill->skill_name }}
                    </span>
                    @endforeach
                </div>
            </div>
            @endforeach

            <div class="skill-kk-group glass-card">
                <h4>SEO &amp; Digital Marketing</h4>
                <div class="flex flex-wrap gap-2.5">
                    @foreach($seoGroup as $s)
                    <span class="skill-badge">{{ $s }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  TESTIMONIALS                                               --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($testimonials->isNotEmpty())
<section class="py-16 md:py-24 reveal" style="background: var(--bg-soft);">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14">
            <p class="section-tag">Client Testimonials</p>
            <h2 class="kk-h2">What Clients Say About My Work</h2>
            <p class="kk-sub mx-auto">Honest words from the people I've worked with — sharing their real experience and results.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($testimonials as $t)
            <div class="testimonial-kk-card">
                <div class="flex items-center gap-1 mb-3">
                    @for($i = 0; $i < (int) $t->rating; $i++)
                    <svg class="w-4 h-4" style="color: var(--accent);" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.145 3.52a1 1 0 00.95.69h3.7c.969 0 1.371 1.24.588 1.81l-2.994 2.176a1 1 0 00-.364 1.118l1.144 3.52c.3.922-.755 1.688-1.539 1.118l-2.994-2.176a1 1 0 00-1.176 0l-2.994 2.176c-.784.57-1.838-.196-1.539-1.118l1.144-3.52a1 1 0 00-.364-1.118L2.666 8.947c-.783-.57-.38-1.81.588-1.81h3.7a1 1 0 00.95-.69l1.145-3.52z"/></svg>
                    @endfor
                </div>
                <h3 class="testimonial-kk-title">{{ $t->client_role ?: ($t->company_name ?: 'Client Feedback') }}</h3>
                <p class="testimonial-kk-msg">{{ $t->message }}</p>
                <p class="testimonial-kk-name">{{ $t->client_name }}@if($t->company_name) · {{ $t->company_name }}@endif</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  GALLERY                                                    --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($galleryItems->isNotEmpty())
<section class="py-16 md:py-24 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14">
            <p class="section-tag">Gallery</p>
            <h2 class="kk-h2">Visual Gallery</h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
            @foreach($galleryItems as $item)
            @php $hasLink = !empty($item->external_url); @endphp
            @if($hasLink)<a href="{{ $item->external_url }}" target="_blank" rel="noopener noreferrer" class="gallery-kk-item">@else<div class="gallery-kk-item">@endif
                <img src="{{ asset('storage/'.$item->image_path) }}" alt="{{ $item->title }}">
                <div class="gallery-kk-cap">
                    <p>{{ $item->title }}</p>
                    @if($item->category)<span>{{ $item->category }}</span>@endif
                </div>
            @if($hasLink)</a>@else</div>@endif
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('gallery.index') }}" class="btn-outline" data-magnetic data-cursor="link">Open Full Gallery →</a>
        </div>
    </div>
</section>
@endif


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  BLOG                                                       --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($blogs->isNotEmpty())
<section class="py-16 md:py-24 reveal" style="background: var(--bg-soft);">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14">
            <p class="section-tag">Latest Updates</p>
            <h2 class="kk-h2">Latest Articles</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($blogs as $blog)
            <a href="{{ route('blog.' . $blog['slug']) }}" class="blog-kk-card">
                <div class="blog-kk-img">
                    @if($blog['image'])
                    <img src="{{ asset('storage/'.$blog['image']) }}" alt="{{ $blog['title'] }}">
                    @else
                    <div class="blog-kk-placeholder">Blog</div>
                    @endif
                </div>
                <div class="p-6">
                    <div class="blog-kk-meta">
                        <span><svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>{{ $personal->brand_name ?? 'Admin' }}</span>
                        <span><svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>{{ $blog['date'] }}</span>
                    </div>
                    <h3 class="blog-kk-title">{{ $blog['title'] }}</h3>
                </div>
            </a>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('blog.index') }}" class="btn-outline" data-magnetic data-cursor="link">View All Articles →</a>
        </div>
    </div>
</section>
@endif


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  FAQ (AEO / GEO)                                             --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
<section class="py-16 md:py-24 reveal">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-10">
            <p class="section-tag">Common Questions</p>
            <h2 class="kk-h2">Frequently Asked Questions</h2>
        </div>
        @php
            $faqs = [
                ['Who is ' . ($personal->brand_name ?? 'Nabaraj Acharya') . '?', ($personal->brand_name ?? 'Nabaraj Acharya') . ' is a Full Stack Developer and SEO Specialist based in Lalitpur, Nepal, trading as TechNabu, with ' . ($personal->years_experience ?? '3') . '+ years of experience building Laravel web applications and growing search visibility for businesses.'],
                ['What services does TechNabu offer?', 'TechNabu offers web development, WordPress development, e-commerce development, API and app development, software engineering, website redesigns, domain and hosting setup, ongoing website support, and SEO & social media marketing.'],
                ['Where is Nabaraj Acharya based, and does he work with clients outside Nepal?', 'He is based in Lalitpur, Nepal, and works with clients across Nepal as well as international clients, including businesses in Australia.'],
                ['What technologies does he specialize in?', 'Laravel, PHP, MySQL, Tailwind CSS, and Alpine.js for development, alongside technical SEO, Google Search Console, and Google Analytics 4 for search growth.'],
                ['How much does it cost to hire a full stack developer in Nepal?', "It depends on project scope — a simple brochure site costs far less than a custom Laravel application. Pricing is quoted per project after understanding requirements; see the website cost guide on the blog for a detailed breakdown."],
                ['Does TechNabu provide SEO services as well as development?', 'Yes — technical SEO, on-page optimization, local SEO, and social media marketing are offered alongside development, since search visibility and a well-built site go hand in hand.'],
                ['How many projects has he completed?', ($personal->completed_projects ?? '30') . '+ projects completed for ' . ($personal->happy_clients ?? '10') . '+ clients, spanning business websites, e-commerce stores, custom web applications, and SEO engagements.'],
                ['How can I contact Nabaraj Acharya for a project?', 'Through the contact page on this site, or by email — every project starts with a free initial conversation to understand requirements before any quote is given.'],
                ['What makes TechNabu different from other developers in Nepal?', 'A combination of hands-on Laravel development and technical SEO expertise in one person — most sites are built without search visibility in mind, while every TechNabu build includes SEO fundamentals from day one.'],
            ];
        @endphp
        @include('partials.services-faq')
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  CTA / CONTACT                                               --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
<section class="py-16 md:py-24 reveal">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        <div class="cta-kk-banner">
            <p class="section-tag !justify-start">Get In Touch</p>
            <h2 class="kk-h2 !text-left">Let's Build Something Great Together</h2>
            <p class="kk-sub !text-left !mx-0 mb-8">If you've got an idea or need a hand with your website, feel free to reach out. I'm always happy to chat and help however I can.</p>
            <a href="{{ route('contact') }}" class="btn-primary" data-magnetic data-cursor="link">
                Send a Message
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<style>
/* ── Hero ── */
.hero-kk-wrap { position: relative; overflow: hidden; }
.hero-kk-pattern {
    position: absolute; inset: 0; pointer-events: none; z-index: 0;
    background-image: repeating-linear-gradient(45deg, rgba(223,29,53,0.07) 0, rgba(223,29,53,0.07) 1px, transparent 1px, transparent 14px);
    -webkit-mask-image: linear-gradient(120deg, #000 0%, #000 55%, transparent 85%);
    mask-image: linear-gradient(120deg, #000 0%, #000 55%, transparent 85%);
}
.hero-kk-blob {
    position: absolute; top: -10%; right: -10%; width: 50%; height: 70%; z-index: 0; pointer-events: none;
    background: radial-gradient(circle, rgba(223,29,53,0.07) 0%, transparent 70%);
    border-radius: 50%;
}
.hero-kk { position: relative; z-index: 1; max-width: 1220px; margin: 0 auto; padding: 120px 20px 50px; }
@media (min-width: 768px) { .hero-kk { padding: 150px 24px 60px; } }
.hero-kk-grid { display: grid; grid-template-columns: 1fr; gap: 40px; align-items: center; }
@media (min-width: 1024px) { .hero-kk-grid { grid-template-columns: 1.1fr 0.9fr; gap: 60px; } }
.hero-kk-greet { font-size: 1.1rem; font-weight: 700; margin-bottom: 10px; }
.hero-kk-tag { font-size: 0.85rem; font-weight: 600; color: var(--ink-dim); margin-bottom: 18px; }
.hero-kk-title { font-size: clamp(2rem, 5vw, 3.1rem); font-weight: 800; line-height: 1.18; letter-spacing: -0.01em; margin-bottom: 22px; }
.hero-kk-title .accent { color: var(--accent); }
.hero-kk-desc { color: var(--ink-dim); font-size: 1rem; line-height: 1.8; max-width: 560px; }
.hero-kk-photo-frame { position: relative; border-radius: 24px; overflow: hidden; aspect-ratio: 4/5; background: var(--bg-soft); border: 1px solid var(--line); }
.hero-kk-photo-frame img { width: 100%; height: 100%; object-fit: cover; }
.hero-kk-photo-placeholder { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 4rem; font-weight: 800; color: var(--accent); }

.hero-kk-features { display: grid; grid-template-columns: repeat(2, 1fr); gap: 18px; margin-top: 64px; }
@media (min-width: 768px) { .hero-kk-features { grid-template-columns: repeat(4, 1fr); } }
.hero-feature-card { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 16px; padding: 26px 20px; text-align: center; transition: all .3s ease; }
.hero-feature-card:hover { border-color: var(--accent); transform: translateY(-3px); }
.hero-feature-icon { display: inline-flex; align-items: center; justify-content: center; width: 52px; height: 52px; border-radius: 14px; background: var(--accent-soft); color: var(--accent); margin-bottom: 14px; }
.hero-feature-card h3 { font-size: 0.95rem; font-weight: 700; color: var(--ink); }

/* ── Stats ── */
.stats-kk-grid { display: grid; grid-template-columns: 1fr; gap: 20px; }
@media (min-width: 768px) { .stats-kk-grid { grid-template-columns: 1.3fr 1fr; } }
.stats-kk-big { padding: 36px; }
.stats-kk-big .stats-kk-num { font-size: 3.4rem; font-weight: 800; color: var(--ink); line-height: 1; display: block; margin-bottom: 8px; }
.stats-kk-big h3 { font-size: 1.4rem; font-weight: 700; margin-bottom: 12px; }
.stats-kk-big p { color: var(--ink-dim); font-size: 0.92rem; line-height: 1.7; max-width: 480px; }
.stats-kk-side { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
.stats-kk-small { padding: 28px 20px; text-align: center; display: flex; flex-direction: column; align-items: center; justify-content: center; }
.stats-kk-small .stats-kk-num { font-size: 2.2rem; font-weight: 800; color: var(--ink); display: block; margin-bottom: 6px; }
.stats-kk-small p { color: var(--ink-dim); font-size: 0.85rem; font-weight: 600; }

/* ── Partners ── */
.partners-kk-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }
@media (min-width: 640px) { .partners-kk-grid { grid-template-columns: repeat(4, 1fr); } }
.partners-kk-item { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 14px; padding: 16px; min-height: 64px; display: flex; align-items: center; justify-content: center; filter: grayscale(1) opacity(0.7); transition: filter .3s, opacity .3s, border-color .3s; }
.partners-kk-item:hover { filter: grayscale(0) opacity(1); border-color: var(--accent); }
.partners-kk-item img { max-height: 28px; max-width: 110px; object-fit: contain; }
.partners-kk-item span { font-weight: 700; font-size: 0.8rem; color: var(--ink); }

/* ── Services ── */
.service-kk-card { padding: 32px; }
.service-kk-num { font-size: 1.3rem; font-weight: 800; color: var(--accent); display: block; margin-bottom: 10px; }
.service-kk-card h3 { font-size: 1.2rem; font-weight: 700; margin-bottom: 10px; }
.service-kk-card p { color: var(--ink-dim); font-size: 0.9rem; line-height: 1.7; }

/* ── Projects ── */
.proj-kk-card { display: block; background: var(--bg); border: 1px solid var(--line); border-radius: 18px; overflow: hidden; transition: all .3s ease; box-shadow: 0 6px 20px rgba(20,22,26,0.05); }
.proj-kk-card:hover { transform: translateY(-4px); box-shadow: 0 16px 36px rgba(20,22,26,0.1); border-color: var(--accent); }
.proj-kk-browser { display: flex; align-items: center; gap: 6px; padding: 12px 16px; background: var(--bg-soft); border-bottom: 1px solid var(--line); }
.proj-kk-dot { width: 9px; height: 9px; border-radius: 50%; background: var(--line-strong); flex-shrink: 0; }
.proj-kk-dot:first-child { background: var(--accent); }
.proj-kk-url { margin-left: 10px; padding: 4px 14px; background: var(--bg); border: 1px solid var(--line); border-radius: 100px; font-size: 0.72rem; color: var(--ink-faint); flex: 1; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
.proj-kk-img { aspect-ratio: 16/10; overflow: hidden; background: var(--bg-soft); display: flex; align-items: center; justify-content: center; }
.proj-kk-img img { width: 100%; height: 100%; object-fit: contain; transition: transform .5s ease; }
.proj-kk-card:hover .proj-kk-img img { transform: scale(1.03); }
.proj-kk-placeholder { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: var(--ink-faint); }
.proj-kk-body { display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; padding: 22px 24px; }
.proj-kk-body h3 { font-size: 1.1rem; font-weight: 700; margin-bottom: 8px; }
.proj-kk-tags { color: var(--ink-dim); font-size: 0.82rem; line-height: 1.6; }
.proj-kk-arrow { width: 38px; height: 38px; border-radius: 50%; border: 1px solid var(--line); display: flex; align-items: center; justify-content: center; flex-shrink: 0; transition: all .3s ease; }
.proj-kk-card:hover .proj-kk-arrow { background: var(--accent); border-color: var(--accent); color: #fff; }

/* ── Skills ── */
.skill-kk-group { padding: 28px; }
.skill-kk-group h4 { font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: var(--ink-faint); margin-bottom: 16px; }
.skill-badge-icon { width: 14px; height: 14px; object-fit: contain; margin-right: 6px; flex-shrink: 0; }

/* ── Testimonials ── */
.testimonial-kk-card { background: var(--bg); border: 1px solid var(--line); border-radius: 18px; padding: 30px; }
.testimonial-kk-title { font-size: 1.15rem; font-weight: 700; margin-bottom: 12px; }
.testimonial-kk-msg { color: var(--ink-dim); font-size: 0.92rem; line-height: 1.75; margin-bottom: 18px; }
.testimonial-kk-name { font-weight: 700; font-size: 0.9rem; }

/* ── Gallery ── */
.gallery-kk-item { position: relative; display: block; aspect-ratio: 1/1; overflow: hidden; border-radius: 14px; background: var(--bg-soft); border: 1px solid var(--line); }
.gallery-kk-item img { width: 100%; height: 100%; object-fit: cover; transition: transform .5s ease; }
.gallery-kk-item:hover img { transform: scale(1.08); }
.gallery-kk-cap { position: absolute; inset: 0; display: flex; flex-direction: column; justify-content: flex-end; padding: 14px; background: linear-gradient(180deg, transparent 50%, rgba(0,0,0,.75)); opacity: 0; transition: opacity .3s ease; }
.gallery-kk-item:hover .gallery-kk-cap { opacity: 1; }
.gallery-kk-cap p { color: #fff; font-size: 0.82rem; font-weight: 700; }
.gallery-kk-cap span { color: var(--accent); font-size: 0.68rem; font-weight: 700; text-transform: uppercase; }

/* ── Blog ── */
.blog-kk-card { display: block; background: var(--bg); border: 1px solid var(--line); border-radius: 18px; overflow: hidden; transition: all .3s ease; }
.blog-kk-card:hover { transform: translateY(-4px); border-color: var(--accent); box-shadow: 0 14px 30px rgba(20,22,26,0.08); }
.blog-kk-img { aspect-ratio: 16/10; overflow: hidden; background: var(--bg-soft); }
.blog-kk-img img { width: 100%; height: 100%; object-fit: cover; transition: transform .5s ease; }
.blog-kk-card:hover .blog-kk-img img { transform: scale(1.05); }
.blog-kk-placeholder { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: var(--ink-faint); font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; font-size: 0.8rem; }
.blog-kk-meta { display: flex; gap: 16px; margin-bottom: 12px; }
.blog-kk-meta span { display: flex; align-items: center; gap: 5px; font-size: 0.75rem; color: var(--ink-faint); font-weight: 600; }
.blog-kk-title { font-size: 1.05rem; font-weight: 700; line-height: 1.4; }

/* ── CTA ── */
.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); }
@media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }
</style>
@endpush
