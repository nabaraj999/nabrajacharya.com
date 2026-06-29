@extends('layouts.app')

@section('title', $seo->meta_title ?? 'Nabaraj Acharya — Full Stack Developer & SEO Specialist in Nepal | Laravel Developer')
@section('description', $seo->meta_description ?? 'Nabaraj Acharya is a Full Stack Developer and SEO Specialist in Nepal, helping brands grow with Laravel and technical SEO across Nepal, Khotang, and Lalitpur.')
@section('keywords', $seo->meta_keywords ?? 'full stack developer nepal, laravel developer nepal, seo specialist in nepal, seo specialist in khotang, seo specialist in lalitpur, seo specalist in khotang, seo specalist in lalitpur')
@section('canonical', route('home'))

@section('schema')
@php
    $homeSchema = ['@context'=>'https://schema.org','@type'=>'WebSite','name'=>'Nabaraj Acharya — Full Stack Developer & SEO Specialist in Nepal','url'=>'https://nabrajacharya.com.np','description'=>'Portfolio of Nabaraj Acharya, Full Stack Developer and SEO Specialist in Nepal, Khotang, and Lalitpur'];
    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($homeSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')

@php
    $fullName = $personal->brand_name ?? 'Nabaraj Acharya';
    $nameParts = explode(' ', $fullName, 2);
    $firstName = $nameParts[0] ?? $fullName;
    $lastName = $nameParts[1] ?? '';
@endphp

{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  HERO                                                        --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
<section class="hero-ed">
    <div class="hero-ed-top">
        <span class="hero-status">
            <span class="dot"></span>
            @if($personal && $personal->current_company)
                {{ $personal->current_role ?? 'Full-Stack Developer' }} @ {{ $personal->current_company }}
            @else
                Available for new projects
            @endif
        </span>
        <span class="hero-scroll-hint">Scroll <span class="arrow">↓</span></span>
    </div>

    <h1 class="hero-ed-name">
        <span class="line-mask"><span class="line-inner" style="animation-delay:.05s">{{ $firstName }}</span></span>
        @if($lastName)
        <span class="line-mask"><span class="line-inner accent" style="animation-delay:.18s">{{ $lastName }}.</span></span>
        @endif
    </h1>

    <div class="hero-ed-bottom">
        <div class="hero-ed-photo">
            <div class="hero-photo-frame">
                @if($personal && $personal->profile_photo)
                    <img src="{{ Storage::url($personal->profile_photo) }}" alt="{{ $fullName }} — Full Stack Developer & SEO Expert Nepal">
                @else
                    <div class="hero-photo-placeholder">{{ Str::substr($firstName, 0, 1) }}{{ $lastName ? Str::substr($lastName, 0, 1) : '' }}</div>
                @endif
            </div>
            <p class="hero-photo-cap">{{ $fullName }} — {{ $personal->location ?? 'Kathmandu, NP' }}</p>
        </div>

        <div class="hero-ed-info">
            <div class="hero-ed-role">
                <span>Full-Stack Development</span>
                <span class="role-sep">/</span>
                <span class="accent">SEO Strategy</span>
            </div>
            <p class="hero-ed-sub">
                {{ $personal->description ?? 'SEO Specialist in Nepal focused on Khotang and Lalitpur markets, building high-performance Laravel apps and driving sustainable organic growth.' }}
            </p>
            <div class="hero-ed-ctas">
                <a href="{{ route('portfolio') }}" class="btn-primary" data-magnetic data-cursor="link">
                    View My Work
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
                <a href="{{ route('contact') }}" class="btn-outline" data-magnetic data-cursor="link">Hire Me</a>
            </div>
        </div>

        @if($personal)
        <div class="hero-ed-stats">
            <div class="stat-item">
                <span class="stat-num" data-count="{{ $personal->years_experience ?? 0 }}">0</span>
                <span class="stat-label">Years Experience</span>
            </div>
            <div class="stat-item">
                <span class="stat-num" data-count="{{ $personal->completed_projects ?? 0 }}">0</span>
                <span class="stat-label">Projects Delivered</span>
            </div>
            <div class="stat-item">
                <span class="stat-num" data-count="{{ $personal->happy_clients ?? 0 }}">0</span>
                <span class="stat-label">Happy Clients</span>
            </div>
        </div>
        @endif
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  EXPERTISE                                                   --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
<section class="py-20 md:py-32 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="section-tag">What I Do</div>
        <h2 class="ed-h2 text-center mb-16">Two disciplines. <span class="gradient-text">One craft.</span></h2>

        <div class="expertise-ed-grid">
            <div class="expertise-ed-col">
                <span class="expertise-ed-num">01</span>
                <h3 class="expertise-ed-title">Full-Stack Development</h3>
                <p class="expertise-ed-desc">Building robust, scalable web applications from database to UI — with clean code and performance in mind.</p>
                <div class="flex flex-wrap gap-2 mb-8">
                    @foreach(['Laravel', 'PHP', 'MySQL', 'Vue.js', 'REST API', 'Tailwind CSS', 'JavaScript', 'Git'] as $s)
                    <span class="skill-badge">{{ $s }}</span>
                    @endforeach
                </div>
                <a href="{{ route('portfolio') }}" class="ed-link" data-magnetic data-cursor="link">View Projects →</a>
            </div>

            <div class="expertise-ed-divider"></div>

            <div class="expertise-ed-col">
                <span class="expertise-ed-num accent">02</span>
                <h3 class="expertise-ed-title">SEO &amp; Digital Growth</h3>
                <p class="expertise-ed-desc">Driving organic traffic and search rankings with technical SEO, content strategy, and data-driven optimisation.</p>
                <div class="flex flex-wrap gap-2 mb-8">
                    @foreach(['Technical SEO', 'On-Page SEO', 'Keyword Research', 'Content Strategy', 'Link Building', 'Local SEO', 'Analytics', 'Core Web Vitals'] as $s)
                    <span class="skill-badge">{{ $s }}</span>
                    @endforeach
                </div>
                <a href="{{ route('services') }}" class="ed-link" data-magnetic data-cursor="link">View Services →</a>
            </div>
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  CURRENT EMPLOYMENT                                         --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($personal && $personal->current_company)
<section class="reveal" style="border-top:1px solid var(--line);">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="employment-ed-bar">
            <div class="employment-ed-label">
                <span class="dot"></span>
                <span>Currently At</span>
            </div>
            <div class="employment-ed-mid">
                <h3 class="employment-ed-company">{{ $personal->current_company }}</h3>
                <span class="employment-ed-role">
                    {{ $personal->current_role }}
                    @if($personal->current_role_start)
                        · since {{ \Carbon\Carbon::parse($personal->current_role_start)->format('M Y') }}
                    @endif
                </span>
            </div>
            @if($personal->current_company_url)
            <a href="{{ $personal->current_company_url }}" target="_blank" rel="noopener noreferrer" class="ed-link flex-shrink-0" data-magnetic data-cursor="link">
                Visit ↗
            </a>
            @endif
        </div>
    </div>
</section>
@endif


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  EXPERIENCE TIMELINE                                        --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($experiences->isNotEmpty())
<section class="py-20 md:py-28 reveal">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        <div class="section-tag">Career</div>
        <h2 class="ed-h2 text-center mb-14">Work <span class="gradient-text">experience.</span></h2>

        <div class="timeline-ed">
            @foreach($experiences as $exp)
            <div class="timeline-ed-row">
                <div class="timeline-ed-date">
                    {{ $exp->start_date->format('M Y') }} — {{ $exp->is_current ? 'Now' : ($exp->end_date ? $exp->end_date->format('M Y') : 'Now') }}
                </div>
                <div class="timeline-ed-body">
                    <div class="flex items-center gap-3 flex-wrap mb-1.5">
                        <h3 class="timeline-ed-pos">{{ $exp->position }}</h3>
                        @if($exp->is_current)<span class="ed-pill-current">Current</span>@endif
                    </div>
                    <p class="timeline-ed-company">
                        @if($exp->company_url)
                        <a href="{{ $exp->company_url }}" target="_blank" rel="noopener noreferrer" class="hover:underline">{{ $exp->company_name }}</a>
                        @else
                        {{ $exp->company_name }}
                        @endif
                        @if($exp->employment_type) · {{ $exp->employment_type }} @endif
                        @if($exp->location) · {{ $exp->location }} @endif
                    </p>
                    @if($exp->description)
                    <p class="timeline-ed-desc">{{ $exp->description }}</p>
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
<section class="py-16 md:py-20 reveal" style="border-top:1px solid var(--line); border-bottom:1px solid var(--line);">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <p class="font-mono text-xs uppercase tracking-widest text-center mb-10" style="color:var(--ink-faint);">Trusted by teams in Nepal &amp; Australia</p>
        <div class="partners-ed-grid">
            @foreach($partners as $partner)
            <div class="partners-ed-item">
                @if($partner->logo)
                    <img src="{{ asset('storage/'.$partner->logo) }}" alt="{{ $partner->name }}" class="partners-ed-logo">
                @else
                    <span class="partners-ed-name">{{ $partner->name }}</span>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  FEATURED PROJECTS                                          --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($featured->isNotEmpty())
<section class="py-20 md:py-28 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
            <div>
                <div class="section-tag !justify-start">Selected Work</div>
                <h2 class="ed-h2">Featured <span class="gradient-text">projects.</span></h2>
            </div>
            <a href="{{ route('portfolio') }}" class="ed-link flex-shrink-0" data-magnetic data-cursor="link">View all work →</a>
        </div>

        <div class="work-ed-list" id="workList">
            @foreach($featured as $index => $project)
            <a href="{{ route('portfolio.show', $project) }}" class="work-ed-row" data-cursor="link"
               data-img="{{ $project->image_url ? asset('storage/'.$project->image_url) : '' }}">
                <span class="work-ed-num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                <span class="work-ed-title">{{ $project->title }}</span>
                <span class="work-ed-tags">
                    @foreach($project->skills->take(3) as $skill)<span>{{ $skill->skill_name }}</span>@endforeach
                </span>
                <span class="work-ed-arrow">↗</span>
            </a>
            @endforeach
        </div>
    </div>

    <div class="work-ed-preview" id="workPreview"><img id="workPreviewImg" src="" alt=""></div>
</section>
@endif


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  BLOG                                                       --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($blogs->isNotEmpty())
<section class="py-20 md:py-28 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
            <div>
                <div class="section-tag !justify-start">Blog</div>
                <h2 class="ed-h2">Latest <span class="gradient-text">articles.</span></h2>
            </div>
            <a href="{{ route('blog.index') }}" class="ed-link flex-shrink-0" data-magnetic data-cursor="link">View all articles →</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-px" style="background:var(--line);">
            @foreach($blogs as $blog)
            <a href="{{ route('blog.show', $blog->slug) }}" class="blog-ed-card">
                <div class="blog-ed-img">
                    @if($blog->featured_image)
                    <img src="{{ asset('storage/'.$blog->featured_image) }}" alt="{{ $blog->title }}">
                    @else
                    <div class="blog-ed-img-placeholder">Blog</div>
                    @endif
                </div>
                <div class="p-6 md:p-7">
                    <p class="blog-ed-meta">{{ $blog->published_at?->format('M d, Y') }} · {{ $blog->reading_time }} min read</p>
                    <h3 class="blog-ed-title">{{ $blog->title }}</h3>
                    <p class="blog-ed-excerpt">{{ Str::limit($blog->excerpt ?: strip_tags($blog->content), 110) }}</p>
                    <span class="ed-link">Read article →</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  GALLERY                                                    --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($galleryItems->isNotEmpty())
<section class="py-20 md:py-28 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="section-tag">Gallery</div>
        <h2 class="ed-h2 text-center mb-4">Visual <span class="gradient-text">gallery.</span></h2>
        <p class="text-center mb-12" style="color:var(--ink-dim);">Recent visuals from projects, branding, campaigns, and production work.</p>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-px mb-10" style="background:var(--line);">
            @foreach($galleryItems as $item)
            @php $hasLink = !empty($item->external_url); @endphp
            @if($hasLink)<a href="{{ $item->external_url }}" target="_blank" rel="noopener noreferrer" class="gallery-ed-item">@else<div class="gallery-ed-item">@endif
                <img src="{{ asset('storage/'.$item->image_path) }}" alt="{{ $item->title }}">
                <div class="gallery-ed-cap">
                    <p>{{ $item->title }}</p>
                    @if($item->category)<span>{{ $item->category }}</span>@endif
                </div>
            @if($hasLink)</a>@else</div>@endif
            @endforeach
        </div>

        <div class="text-center">
            <a href="{{ route('gallery.index') }}" class="ed-link" data-magnetic data-cursor="link">Open full gallery →</a>
        </div>
    </div>
</section>
@endif


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  TESTIMONIALS                                               --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($testimonials->isNotEmpty())
<section class="py-20 md:py-28 reveal" style="border-top:1px solid var(--line);">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="section-tag">Testimonials</div>
        <h2 class="ed-h2 text-center mb-14">Client <span class="gradient-text">feedback.</span></h2>

        <div class="testimonial-marquee">
            <div class="testimonial-marquee-track">
                @foreach($testimonials->concat($testimonials) as $t)
                <article class="testimonial-ed-card">
                    <span class="testimonial-ed-quote">"</span>
                    <p class="testimonial-ed-msg">{{ Str::limit($t->message, 200) }}</p>
                    <div class="testimonial-ed-foot">
                        @if($t->client_photo)
                        <img src="{{ asset('storage/'.$t->client_photo) }}" alt="{{ $t->client_name }}">
                        @else
                        <div class="testimonial-ed-avatar">{{ Str::upper(Str::substr($t->client_name, 0, 2)) }}</div>
                        @endif
                        <div>
                            <p class="testimonial-ed-name">{{ $t->client_name }}</p>
                            <p class="testimonial-ed-role">{{ $t->client_role ?: 'Client' }}{{ $t->company_name ? ' · '.$t->company_name : '' }}</p>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  SKILLS                                                     --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($skills->isNotEmpty())
<section class="py-20 md:py-28 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="section-tag">Tech Stack</div>
        <h2 class="ed-h2 text-center mb-14">Skills &amp; <span class="gradient-text">technologies.</span></h2>

        @php
            $grouped = $skills->groupBy(fn($s) => $s->category ?: 'Development');
            $seoGroup = collect(['Technical SEO','On-Page SEO','Keyword Research','Content Strategy','Local SEO','Analytics','Core Web Vitals','Link Building']);
        @endphp

        <div class="skills-ed-groups">
            @foreach($grouped as $category => $catSkills)
            <div class="skills-ed-group">
                <h4 class="skills-ed-cat">{{ str($category)->headline() }}</h4>
                <div class="flex flex-wrap gap-2.5">
                    @foreach($catSkills as $skill)
                    <span class="skill-badge" style="opacity:{{ 0.55 + ($skill->proficiency / 100) * 0.45 }}">{{ $skill->skill_name }}</span>
                    @endforeach
                </div>
            </div>
            @endforeach

            <div class="skills-ed-group">
                <h4 class="skills-ed-cat accent">SEO &amp; Digital Marketing</h4>
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
{{--  SERVICES                                                   --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
@if($services->isNotEmpty())
<section class="py-20 md:py-28 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
            <div>
                <div class="section-tag !justify-start">Services</div>
                <h2 class="ed-h2">What I <span class="gradient-text">offer.</span></h2>
            </div>
            <a href="{{ route('services') }}" class="ed-link flex-shrink-0" data-magnetic data-cursor="link">All services →</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-px" style="background:var(--line);">
            @foreach($services as $i => $service)
            <div class="service-ed-card">
                <span class="service-ed-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                <h3 class="service-ed-title">{{ $service->service_name }}</h3>
                <p class="service-ed-desc">{{ Str::limit(strip_tags($service->description), 110) }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


{{-- ═══════════════════════════════════════════════════════════ --}}
{{--  CTA                                                        --}}
{{-- ═══════════════════════════════════════════════════════════ --}}
<section class="py-24 md:py-36 reveal">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <p class="font-mono text-xs uppercase tracking-widest mb-6" style="color:var(--ink-faint);">Ready when you are</p>
        <h2 class="cta-ed-h">Let's build something <span class="gradient-text">extraordinary.</span></h2>
        <p class="mt-6 mb-10 max-w-xl mx-auto" style="color:var(--ink-dim);">
            Whether you need a high-performance Laravel app or a top-ranking SEO strategy — I'm your developer.
        </p>
        <div class="flex flex-wrap gap-4 justify-center">
            <a href="{{ route('contact') }}" class="btn-primary text-base px-8 py-4" data-magnetic data-cursor="link">
                Start a Project
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
            <a href="{{ route('portfolio') }}" class="btn-outline text-base px-8 py-4" data-magnetic data-cursor="link">View Portfolio</a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<style>
/* ── Hero ── */
.hero-ed { max-width: 1180px; margin: 0 auto; padding: 130px 20px 70px; position: relative; }
@media (min-width: 768px) { .hero-ed { padding: 160px 24px 90px; } }

.hero-ed-top {
    display: flex; justify-content: space-between; align-items: center;
    margin-bottom: 44px; font-family: 'JetBrains Mono', monospace;
    font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--ink-dim);
}
.hero-status { display: flex; align-items: center; gap: 9px; }
.hero-status .dot {
    width: 6px; height: 6px; border-radius: 50%; background: #3ddc84; flex-shrink: 0;
    box-shadow: 0 0 0 0 rgba(61,220,132,.5); animation: livePulse 2s ease infinite;
}
@keyframes livePulse { 0% { box-shadow: 0 0 0 0 rgba(61,220,132,.5); } 70% { box-shadow: 0 0 0 7px rgba(61,220,132,0); } 100% { box-shadow: 0 0 0 0 rgba(61,220,132,0); } }
.hero-scroll-hint { display: none; }
@media (min-width: 640px) { .hero-scroll-hint { display: inline-flex; align-items: center; gap: 6px; } }
.hero-scroll-hint .arrow { display: inline-block; animation: bounceArrow 1.8s ease-in-out infinite; }
@keyframes bounceArrow { 0%,100% { transform: translateY(0); } 50% { transform: translateY(4px); } }

.hero-ed-name {
    font-family: 'Fraunces', serif; font-weight: 500; line-height: 0.92;
    letter-spacing: -0.02em; font-size: clamp(3.2rem, 11vw, 8rem); margin-bottom: 48px;
}
.line-mask { display: block; overflow: hidden; }
.line-inner { display: block; transform: translateY(110%); opacity: 0; animation: lineUp 1s cubic-bezier(.16,1,.3,1) forwards; }
.line-inner.accent { font-style: italic; color: var(--accent); }
@keyframes lineUp { to { transform: translateY(0); opacity: 1; } }

.hero-ed-bottom { display: grid; grid-template-columns: 1fr; gap: 36px; }
@media (min-width: 1024px) { .hero-ed-bottom { grid-template-columns: 260px 1fr 200px; gap: 48px; align-items: end; } }

.hero-photo-frame {
    position: relative; border: 1px solid var(--line-strong); border-radius: 6px;
    overflow: hidden; aspect-ratio: 4/5; background: var(--bg-2);
}
.hero-photo-frame img { width: 100%; height: 100%; object-fit: cover; filter: grayscale(1) contrast(1.05) brightness(.95); transition: filter .6s ease; }
.hero-photo-frame:hover img { filter: grayscale(0) contrast(1.05); }
.hero-photo-frame::after { content:''; position:absolute; inset:0; background: linear-gradient(180deg, transparent 55%, rgba(10,10,10,.55)); pointer-events: none; }
.hero-photo-placeholder { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-family: 'Fraunces', serif; font-style: italic; font-size: 3rem; color: var(--accent); }
.hero-photo-cap { font-family: 'JetBrains Mono', monospace; font-size: 0.66rem; letter-spacing: 0.05em; color: var(--ink-faint); margin-top: 10px; text-transform: uppercase; }

.hero-ed-role { display: flex; align-items: center; gap: 12px; font-family: 'JetBrains Mono', monospace; font-size: 0.82rem; text-transform: uppercase; letter-spacing: 0.06em; color: var(--ink); margin-bottom: 18px; flex-wrap: wrap; }
.hero-ed-role .accent { color: var(--accent); }
.role-sep { color: var(--ink-faint); }
.hero-ed-sub { color: var(--ink-dim); font-size: 1rem; line-height: 1.75; max-width: 480px; margin-bottom: 28px; }
.hero-ed-ctas { display: flex; flex-wrap: wrap; gap: 14px; }

.hero-ed-stats { display: flex; flex-direction: row; gap: 28px; border-top: 1px solid var(--line); padding-top: 20px; }
@media (min-width: 1024px) { .hero-ed-stats { flex-direction: column; gap: 20px; border-top: none; border-left: 1px solid var(--line); padding-top: 0; padding-left: 26px; } }
.stat-item { display: flex; flex-direction: column; }
.stat-num { font-family: 'Fraunces', serif; font-style: italic; font-size: 2rem; color: var(--ink); line-height: 1; }
.stat-label { font-family: 'JetBrains Mono', monospace; font-size: 0.6rem; text-transform: uppercase; letter-spacing: 0.07em; color: var(--ink-faint); margin-top: 6px; }

/* ── Shared editorial helpers ── */
.ed-h2 { font-family: 'Fraunces', serif; font-weight: 500; font-size: clamp(2rem, 5vw, 3.4rem); line-height: 1.12; color: var(--ink); }
.ed-link { display: inline-flex; align-items: center; gap: 8px; font-size: 0.85rem; font-weight: 600; color: var(--ink-dim); transition: color 0.3s; }
.ed-link:hover { color: var(--accent); }

/* ── Expertise ── */
.expertise-ed-grid { display: grid; grid-template-columns: 1fr; gap: 48px; }
@media (min-width: 768px) { .expertise-ed-grid { grid-template-columns: 1fr 1px 1fr; gap: 0; } }
.expertise-ed-col { padding: 0; }
@media (min-width: 768px) { .expertise-ed-col { padding: 0 52px; } .expertise-ed-col:first-child { padding-left: 0; } .expertise-ed-col:last-child { padding-right: 0; } }
.expertise-ed-divider { width: 1px; background: var(--line); display: none; }
@media (min-width: 768px) { .expertise-ed-divider { display: block; } }
.expertise-ed-num { font-family: 'JetBrains Mono', monospace; font-size: 2.6rem; font-weight: 600; color: var(--line-strong); display: block; margin-bottom: 8px; }
.expertise-ed-num.accent { color: var(--accent-soft); }
.expertise-ed-title { font-family: 'Fraunces', serif; font-size: 1.5rem; font-weight: 500; color: var(--ink); margin-bottom: 14px; }
.expertise-ed-desc { color: var(--ink-dim); font-size: 0.92rem; line-height: 1.7; margin-bottom: 22px; }

/* ── Employment bar ── */
.employment-ed-bar { display: flex; flex-direction: column; gap: 14px; padding: 28px 0; }
@media (min-width: 768px) { .employment-ed-bar { flex-direction: row; align-items: center; gap: 32px; } }
.employment-ed-label { display: flex; align-items: center; gap: 8px; font-family: 'JetBrains Mono', monospace; font-size: 0.68rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--ink-faint); flex-shrink: 0; }
.employment-ed-label .dot { width: 6px; height: 6px; border-radius: 50%; background: #3ddc84; }
.employment-ed-mid { flex: 1; display: flex; flex-wrap: wrap; align-items: baseline; gap: 10px; }
.employment-ed-company { font-family: 'Fraunces', serif; font-size: 1.2rem; color: var(--ink); }
.employment-ed-role { font-size: 0.84rem; color: var(--ink-dim); }

/* ── Timeline ── */
.timeline-ed-row { display: grid; grid-template-columns: 1fr; gap: 8px; padding: 28px 0; border-bottom: 1px solid var(--line); }
.timeline-ed-row:first-child { border-top: 1px solid var(--line); }
@media (min-width: 768px) { .timeline-ed-row { grid-template-columns: 150px 1fr; gap: 32px; } }
.timeline-ed-date { font-family: 'JetBrains Mono', monospace; font-size: 0.76rem; color: var(--ink-faint); padding-top: 3px; }
.timeline-ed-pos { font-family: 'Fraunces', serif; font-size: 1.25rem; color: var(--ink); }
.timeline-ed-company { font-size: 0.84rem; color: var(--ink-dim); margin-bottom: 8px; }
.timeline-ed-desc { font-size: 0.86rem; color: var(--ink-dim); line-height: 1.7; max-width: 560px; }
.ed-pill-current { font-family: 'JetBrains Mono', monospace; font-size: 0.6rem; padding: 2px 9px; border: 1px solid var(--accent); color: var(--accent); border-radius: 100px; text-transform: uppercase; letter-spacing: 0.05em; }

/* ── Partners ── */
.partners-ed-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 18px; }
@media (min-width: 640px) { .partners-ed-grid { grid-template-columns: repeat(4, 1fr); } }
.partners-ed-item { background: #fff; border-radius: 8px; padding: 16px 22px; min-height: 64px; display: flex; align-items: center; justify-content: center; filter: grayscale(1) opacity(0.75); transition: filter .3s, opacity .3s; }
.partners-ed-item:hover { filter: grayscale(0) opacity(1); }
.partners-ed-logo { max-height: 28px; max-width: 110px; object-fit: contain; }
.partners-ed-name { font-weight: 700; font-size: 0.78rem; color: #111; }

/* ── Work list ── */
.work-ed-list { border-top: 1px solid var(--line); }
.work-ed-row { display: flex; align-items: center; gap: 22px; padding: 24px 4px; border-bottom: 1px solid var(--line); transition: padding .35s ease; position: relative; }
.work-ed-row:hover { padding-left: 16px; }
.work-ed-row:hover .work-ed-title { color: var(--accent); }
.work-ed-num { font-family: 'JetBrains Mono', monospace; font-size: 0.74rem; color: var(--ink-faint); width: 26px; flex-shrink: 0; }
.work-ed-title { font-family: 'Fraunces', serif; font-size: clamp(1.25rem, 3vw, 2rem); color: var(--ink); flex: 1; transition: color .3s; }
.work-ed-tags { display: none; gap: 10px; font-family: 'JetBrains Mono', monospace; font-size: 0.66rem; color: var(--ink-faint); text-transform: uppercase; letter-spacing: 0.04em; }
@media (min-width: 768px) { .work-ed-tags { display: flex; } }
.work-ed-arrow { font-size: 1.15rem; color: var(--ink-faint); transition: transform .3s, color .3s; flex-shrink: 0; }
.work-ed-row:hover .work-ed-arrow { color: var(--accent); transform: translate(3px, -3px); }
.work-ed-preview { position: fixed; top: 0; left: 0; width: 230px; height: 290px; pointer-events: none; z-index: 55; opacity: 0; border-radius: 8px; overflow: hidden; transition: opacity .3s ease; border: 1px solid var(--line-strong); transform: translate(-9999px,-9999px); }
.work-ed-preview.is-active { opacity: 1; }
.work-ed-preview img { width: 100%; height: 100%; object-fit: cover; }

/* ── Blog cards ── */
.blog-ed-card { display: block; transition: background .3s ease; }
.blog-ed-card:hover { background: var(--bg-2); }
.blog-ed-img { aspect-ratio: 16/10; overflow: hidden; background: var(--bg-2); }
.blog-ed-img img { width: 100%; height: 100%; object-fit: cover; filter: grayscale(.35); transition: filter .4s ease, transform .6s ease; }
.blog-ed-card:hover .blog-ed-img img { filter: grayscale(0); transform: scale(1.04); }
.blog-ed-img-placeholder { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-family: 'JetBrains Mono', monospace; text-transform: uppercase; letter-spacing: 0.1em; font-size: 0.75rem; color: var(--ink-faint); }
.blog-ed-meta { font-family: 'JetBrains Mono', monospace; font-size: 0.66rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--ink-faint); margin-bottom: 12px; }
.blog-ed-title { font-family: 'Fraunces', serif; font-size: 1.18rem; color: var(--ink); margin-bottom: 10px; line-height: 1.3; }
.blog-ed-excerpt { font-size: 0.85rem; color: var(--ink-dim); line-height: 1.65; margin-bottom: 18px; }

/* ── Gallery ── */
.gallery-ed-item { position: relative; display: block; aspect-ratio: 1/1; overflow: hidden; background: var(--bg-2); }
.gallery-ed-item img { width: 100%; height: 100%; object-fit: cover; filter: grayscale(.5); transition: filter .4s ease, transform .5s ease; }
.gallery-ed-item:hover img { filter: grayscale(0); transform: scale(1.06); }
.gallery-ed-cap { position: absolute; inset: 0; display: flex; flex-direction: column; justify-content: flex-end; padding: 14px; background: linear-gradient(180deg, transparent 50%, rgba(10,10,10,.85)); opacity: 0; transition: opacity .3s ease; }
.gallery-ed-item:hover .gallery-ed-cap { opacity: 1; }
.gallery-ed-cap p { color: var(--ink); font-size: 0.82rem; font-weight: 600; line-height: 1.2; }
.gallery-ed-cap span { color: var(--accent); font-family: 'JetBrains Mono', monospace; font-size: 0.62rem; text-transform: uppercase; letter-spacing: 0.05em; }

/* ── Testimonials ── */
.testimonial-marquee { position: relative; overflow: hidden; mask-image: linear-gradient(to right, transparent, #000 7%, #000 93%, transparent); -webkit-mask-image: linear-gradient(to right, transparent, #000 7%, #000 93%, transparent); }
.testimonial-marquee-track { display: flex; gap: 1.25rem; width: max-content; animation: testimonialScroll 42s linear infinite; }
.testimonial-marquee:hover .testimonial-marquee-track { animation-play-state: paused; }
@keyframes testimonialScroll { from { transform: translateX(0); } to { transform: translateX(-50%); } }
@media (prefers-reduced-motion: reduce) { .testimonial-marquee { overflow-x: auto; mask-image: none; -webkit-mask-image: none; } .testimonial-marquee-track { animation: none; } }
.testimonial-ed-card { width: min(84vw, 21rem); flex-shrink: 0; border: 1px solid var(--line); border-radius: 12px; padding: 28px; background: var(--bg-2); transition: border-color .3s; }
.testimonial-ed-card:hover { border-color: var(--line-strong); }
.testimonial-ed-quote { font-family: 'Fraunces', serif; font-style: italic; font-size: 2.6rem; color: var(--accent); line-height: 1; display: block; margin-bottom: 6px; }
.testimonial-ed-msg { color: var(--ink-dim); line-height: 1.65; font-size: 0.9rem; margin-bottom: 22px; min-height: 90px; }
.testimonial-ed-foot { display: flex; align-items: center; gap: 12px; padding-top: 16px; border-top: 1px solid var(--line); }
.testimonial-ed-foot img { width: 38px; height: 38px; border-radius: 50%; object-fit: cover; }
.testimonial-ed-avatar { width: 38px; height: 38px; border-radius: 50%; background: var(--accent-soft); color: var(--accent); display: flex; align-items: center; justify-content: center; font-size: 0.7rem; font-weight: 700; }
.testimonial-ed-name { font-weight: 600; color: var(--ink); font-size: 0.88rem; }
.testimonial-ed-role { font-size: 0.78rem; color: var(--ink-faint); }

/* ── Skills ── */
.skills-ed-groups { display: grid; grid-template-columns: 1fr; gap: 36px; }
@media (min-width: 768px) { .skills-ed-groups { grid-template-columns: 1fr 1fr; gap: 48px 60px; } }
.skills-ed-cat { font-family: 'JetBrains Mono', monospace; font-size: 0.66rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em; color: var(--ink-faint); margin-bottom: 16px; display: flex; align-items: center; gap: 12px; }
.skills-ed-cat::after { content: ''; flex: 1; height: 1px; background: var(--line); }
.skills-ed-cat.accent { color: var(--accent); }

/* ── Services ── */
.service-ed-card { padding: 34px 30px; background: var(--bg); transition: background .3s ease; }
.service-ed-card:hover { background: var(--bg-2); }
.service-ed-num { font-family: 'JetBrains Mono', monospace; color: var(--ink-faint); font-size: 0.78rem; }
.service-ed-title { font-family: 'Fraunces', serif; font-size: 1.25rem; margin: 16px 0 10px; color: var(--ink); }
.service-ed-desc { font-size: 0.87rem; color: var(--ink-dim); line-height: 1.7; }

/* ── CTA ── */
.cta-ed-h { font-family: 'Fraunces', serif; font-weight: 500; font-size: clamp(2.3rem, 6vw, 4.2rem); line-height: 1.08; color: var(--ink); }
</style>

<script>
// Stat counters
const counterObs = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        entry.target.querySelectorAll('.stat-num').forEach(el => {
            const target = parseInt(el.dataset.count) || 0;
            let cur = 0;
            const step = Math.max(target / 50, 0.1);
            const t = setInterval(() => {
                cur += step;
                if (cur >= target) { cur = target; clearInterval(t); }
                el.textContent = Math.floor(cur);
            }, 30);
        });
        counterObs.unobserve(entry.target);
    });
}, { threshold: 0.5 });
document.querySelectorAll('.hero-ed-stats').forEach(el => counterObs.observe(el));

// Work list — cursor-follow image preview
(function () {
    const list = document.getElementById('workList');
    const preview = document.getElementById('workPreview');
    const previewImg = document.getElementById('workPreviewImg');
    if (!list || !preview) return;
    if (!window.matchMedia('(pointer: fine)').matches) return;

    let moveX, moveY;
    if (window.gsap) {
        moveX = gsap.quickTo(preview, 'x', { duration: 0.5, ease: 'power3' });
        moveY = gsap.quickTo(preview, 'y', { duration: 0.5, ease: 'power3' });
    }

    list.querySelectorAll('.work-ed-row').forEach(row => {
        row.addEventListener('mouseenter', () => {
            const img = row.dataset.img;
            if (!img) return;
            previewImg.src = img;
            preview.classList.add('is-active');
        });
        row.addEventListener('mouseleave', () => preview.classList.remove('is-active'));
    });

    window.addEventListener('mousemove', e => {
        const x = e.clientX + 26, y = e.clientY - 145;
        if (moveX) { moveX(x); moveY(y); }
        else { preview.style.transform = `translate(${x}px, ${y}px)`; }
    });
})();
</script>
@endpush
