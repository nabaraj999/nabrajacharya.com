@extends('layouts.app')

@php
    $defaultTitle = 'About Nabaraj Acharya — Full Stack Developer Nepal';
    $defaultDescription = 'About Nabaraj Acharya, a Full Stack Developer in Nepal and Web Developer in Nepal building Laravel, PHP, and SEO-driven websites for businesses in Nepal and beyond.';
    $defaultKeywords = 'full stack developer in nepal, web developer in nepal, full stack developer nepal, laravel developer nepal, php developer nepal, nabaraj acharya, website developer in nepal, seo friendly web developer nepal';
@endphp

@section('title', $defaultTitle)
@section('description', $defaultDescription)
@section('keywords', $defaultKeywords)
@section('canonical', route('about'))
@section('og_title', $defaultTitle)
@section('og_description', $defaultDescription)
@section('twitter_title', $defaultTitle)
@section('twitter_description', $defaultDescription)
@php $aboutImage = $personal->about_photo ?? $personal->logo_url ?? null; @endphp
@if($aboutImage)
@section('og_image', Storage::url($aboutImage))
@section('twitter_image', Storage::url($aboutImage))
@section('og_image_alt', ($personal->brand_name ?? 'Nabaraj Acharya') . ' — Full Stack Developer Nepal')
@endif

@section('schema')
@php
$aboutSchema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'AboutPage',
    'name'        => 'About Nabaraj Acharya — Full Stack Developer in Nepal',
    'description' => $defaultDescription,
    'url'         => route('about'),
    'mainEntity'  => [
        '@type'    => 'Person',
        'name'     => 'Nabaraj Acharya',
        'jobTitle' => 'Full Stack Developer in Nepal',
        'description' => 'Web Developer in Nepal focused on Laravel, PHP, modern websites, and technical SEO.',
        'url'      => 'https://nabrajacharya.com.np',
        'knowsAbout' => ['Laravel development', 'PHP development', 'full stack development', 'web development', 'technical SEO'],
    ],
];
if ($personal && $personal->current_company) {
    $aboutSchema['mainEntity']['worksFor'] = ['@type' => 'Organization', 'name' => $personal->current_company, 'url' => $personal->current_company_url ?? ''];
}
$breadcrumbSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'About', 'item' => route('about')],
    ],
];
@endphp
<script type="application/ld+json">{!! json_encode($aboutSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')

{{-- Page Hero --}}
<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">
            Full Stack <span class="gradient-text">Developer in Nepal</span>
        </h1>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">About</span>
        </p>
    </div>
</section>

{{-- Quick Answer (AEO / GEO) --}}
<section class="pt-10 reveal">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        @php
            $quickAnswer = ($personal->brand_name ?? 'Nabaraj Acharya') . ' combines hands-on Laravel development with technical SEO — a deliberate combination, since a well-built site that nobody can find on Google still isn\'t doing its job. He works full-stack rather than handing off design, development, and search visibility to three different people.';
        @endphp
        @include('partials.services-quick-answer')
    </div>
</section>

{{-- About Content --}}
<section class="py-12 md:py-16 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row items-start gap-8 md:gap-14">

            {{-- Photo + current role card --}}
            <div class="md:w-2/5 flex flex-col items-center gap-6">
                <div class="hero-kk-photo-frame w-full" style="aspect-ratio: 4/5;">
                    @if($personal && $personal->about_photo)
                        <img src="{{ Storage::url($personal->about_photo) }}"
                             alt="{{ $personal->brand_name ?? 'Nabaraj Acharya' }} — Full Stack Developer & SEO Expert Nepal">
                    @elseif($personal && $personal->logo_url)
                        <img src="{{ Storage::url($personal->logo_url) }}"
                             alt="{{ $personal->brand_name ?? 'Nabaraj Acharya' }} — Full Stack Developer & SEO Expert Nepal">
                    @else
                        <div class="hero-kk-photo-placeholder">{{ Str::substr($personal->brand_name ?? 'NA', 0, 2) }}</div>
                    @endif
                </div>

                {{-- Current employment card --}}
                @if($personal && $personal->current_company)
                <div class="w-full glass-card p-5">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-2 h-2 rounded-full flex-shrink-0" style="background: #22c55e;"></span>
                        <span class="text-xs font-bold uppercase tracking-wider" style="color: #16a34a;">Currently Employed</span>
                    </div>
                    <p class="font-semibold text-sm mb-1" style="color: var(--ink);">{{ $personal->current_role }}</p>
                    @if($personal->current_company_url)
                        <a href="{{ $personal->current_company_url }}" target="_blank" rel="noopener noreferrer"
                           class="text-sm hover:underline" style="color: var(--accent);">{{ $personal->current_company }} ↗</a>
                    @else
                        <p class="text-sm" style="color: var(--ink-dim);">{{ $personal->current_company }}</p>
                    @endif
                    @if($personal->current_role_start)
                        <p class="text-xs mt-1" style="color: var(--ink-faint);">Since {{ \Carbon\Carbon::parse($personal->current_role_start)->format('F Y') }}</p>
                    @endif
                </div>
                @endif

                {{-- Stats --}}
                @if($personal)
                <div class="w-full grid grid-cols-3 gap-3">
                    <div class="text-center p-3 glass-card">
                        <div class="text-2xl font-display font-bold" style="color: var(--ink);">{{ $personal->years_experience ?? 0 }}+</div>
                        <div class="text-xs mt-0.5" style="color: var(--ink-faint);">Years</div>
                    </div>
                    <div class="text-center p-3 glass-card">
                        <div class="text-2xl font-display font-bold" style="color: var(--ink);">{{ $personal->completed_projects ?? 0 }}+</div>
                        <div class="text-xs mt-0.5" style="color: var(--ink-faint);">Projects</div>
                    </div>
                    <div class="text-center p-3 glass-card">
                        <div class="text-2xl font-display font-bold" style="color: var(--ink);">{{ $personal->happy_clients ?? 0 }}+</div>
                        <div class="text-xs mt-0.5" style="color: var(--ink-faint);">Clients</div>
                    </div>
                </div>
                @endif
            </div>

            {{-- Bio + skills --}}
            <div class="md:w-3/5">
                <h2 class="font-display text-2xl font-bold mb-5" style="color: var(--ink);">Hi, I'm <span class="gradient-text">{{ $personal->brand_name ?? 'Nabaraj Acharya' }}</span>, a Web Developer in Nepal</h2>
                <div class="leading-relaxed text-base prose max-w-none mb-10" style="color: var(--ink-dim);">
                    {!! $personal->about_description ?? '<p>I am a Full Stack Developer in Nepal focused on building scalable Laravel applications, custom business websites, and search-friendly digital platforms. As a web developer in Nepal, I help brands launch fast, modern, and conversion-focused experiences for users in Nepal and international markets.</p>' !!}
                </div>

                <h2 class="font-display text-2xl font-bold mb-6" style="color: var(--ink);">What Sets Me Apart</h2>
                <div class="flex flex-col gap-4 mb-12">
                    @foreach([
                        ['Full-Stack + SEO in One', 'I don\'t just build websites — I make sure they can actually be found on Google once they\'re live.'],
                        ['Laravel-Focused', 'Laravel and PHP are my core stack, so the code I write is clean, structured, and easy to maintain.'],
                        ['Nepal-Based, Remote-Friendly', 'I work with clients across Nepal and abroad, communicating clearly across time zones.'],
                    ] as [$title, $desc])
                    <div class="flex gap-4">
                        <span class="flex-shrink-0 w-8 h-8 rounded-full flex items-center justify-center" style="background: var(--accent-soft); color: var(--accent);">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <div>
                            <h3 class="font-display text-base font-bold mb-1" style="color: var(--ink);">{{ $title }}</h3>
                            <p class="text-sm leading-relaxed" style="color: var(--ink-dim);">{{ $desc }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Skills --}}
                @if($skills->isNotEmpty())
                <div>
                    <h3 class="font-display text-2xl font-bold mb-6" style="color: var(--ink);">Technical Skills</h3>

                    @php
                        $groupedSkills = $skills->groupBy(fn($s) => $s->category ?: 'other');
                        $aboutSkillIcons = [
                            'php' => 'php', 'python' => 'python', 'java' => 'openjdk', 'javascript' => 'javascript',
                            'github' => 'github', 'figma' => 'figma', 'laravel' => 'laravel', 'css' => 'css',
                            'bootstrap' => 'bootstrap', 'html' => 'html5', 'tailwind css' => 'tailwindcss', 'filament' => 'filament',
                        ];
                        $aboutSkillIcon = fn ($name) => $aboutSkillIcons[strtolower(trim($name))] ?? null;
                    @endphp

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($groupedSkills as $category => $catSkills)
                        <div class="glass-card p-5">
                            <h4 class="text-xs font-bold uppercase tracking-widest mb-4 flex items-center gap-2" style="color: var(--ink-faint);">
                                {{ str($category)->headline() }}
                                <span class="h-px flex-1" style="background: var(--line);"></span>
                            </h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($catSkills as $skill)
                                <span class="skill-badge">
                                    @if($slug = $aboutSkillIcon($skill->skill_name))
                                    <img src="https://cdn.simpleicons.org/{{ $slug }}/5d6168" class="skill-badge-icon" alt="" onerror="this.remove()">
                                    @endif
                                    {{ $skill->skill_name }}
                                </span>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>


{{-- Work Experience Timeline --}}
@if($experiences->isNotEmpty())
<section class="py-12 md:py-16 reveal" style="background: var(--bg-soft);">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
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


{{-- Certifications & Gallery --}}
@if($certifications->isNotEmpty())
<section class="py-12 md:py-16 reveal overflow-hidden">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14">
            <p class="section-tag">Gallery</p>
            <h2 class="kk-h2">Certifications &amp; Achievements</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($certifications as $cert)
            <div class="cert-kk-card glass-card cursor-pointer"
                 onclick="openCertLightbox('{{ asset('storage/'.$cert->image) }}', '{{ $cert->title }}', '{{ $cert->issuer }}')">
                <div class="cert-kk-img">
                    @if($cert->image)
                        <img src="{{ asset('storage/'.$cert->image) }}" alt="{{ $cert->title }}">
                    @else
                        <svg class="w-14 h-14" style="color: var(--ink-faint);" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                    @endif
                </div>
                <div class="p-5">
                    <span class="text-xs font-bold uppercase tracking-widest" style="color: var(--accent);">{{ $cert->issuer }}</span>
                    <h3 class="font-display text-base font-bold mt-1.5 mb-1" style="color: var(--ink);">{{ $cert->title }}</h3>
                    <span class="text-xs" style="color: var(--ink-faint);">{{ $cert->issue_date->format('M Y') }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Lightbox Modal --}}
<div id="certLightbox" class="fixed inset-0 z-[10000] hidden items-center justify-center bg-black/90 backdrop-blur-md px-4 py-10" onclick="closeCertLightbox()">
    <div class="relative w-full max-w-4xl max-h-full flex flex-col items-center animate-zoomIn" onclick="event.stopPropagation()">
        <button onclick="closeCertLightbox()" class="absolute -top-12 right-0 text-white hover:text-red-300 transition-colors flex items-center gap-2 font-semibold">
            <span>Close</span> <span class="text-2xl">×</span>
        </button>
        <div class="w-full overflow-auto rounded-xl shadow-2xl" style="background: var(--bg);">
            <img id="lightboxImage" src="" alt="Certificate" class="w-full h-auto max-h-[80vh] object-contain mx-auto">
        </div>
        <div class="mt-6 text-center">
            <h3 id="lightboxTitle" class="text-xl font-display font-bold text-white mb-1"></h3>
            <p id="lightboxIssuer" class="font-semibold" style="color: var(--accent);"></p>
        </div>
    </div>
</div>
<script>
    function openCertLightbox(imgUrl, title, issuer) {
        document.getElementById('lightboxImage').src = imgUrl;
        document.getElementById('lightboxTitle').textContent = title;
        document.getElementById('lightboxIssuer').textContent = issuer;
        const modal = document.getElementById('certLightbox');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
    function closeCertLightbox() {
        const modal = document.getElementById('certLightbox');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
</script>
@endif


{{-- Education Timeline --}}
@if($education->isNotEmpty())
<section class="py-12 md:py-16 reveal" style="background: var(--bg-soft);">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-14">
            <p class="section-tag">Background</p>
            <h2 class="kk-h2">Education &amp; Academic Background</h2>
        </div>

        <div class="flex flex-col gap-5">
            @foreach($education as $edu)
            <div class="exp-kk-card glass-card">
                <div class="exp-kk-date">{{ $edu->start_year }} — {{ $edu->end_year ?? ($edu->status === 'in_progress' ? 'Present' : '') }}</div>
                <div class="exp-kk-body">
                    <div class="flex items-center gap-3 mb-1.5">
                        @if($edu->image_url)
                        <img src="{{ Storage::url($edu->image_url) }}" alt="{{ $edu->institution }}" class="w-8 h-8 rounded-lg object-cover flex-shrink-0" style="border:1px solid var(--line);">
                        @endif
                        <h3>{{ $edu->degree }}</h3>
                    </div>
                    <p class="exp-kk-company">{{ $edu->institution }}</p>
                    @if($edu->description)<p class="exp-kk-desc">{{ $edu->description }}</p>@endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


{{-- FAQ (AEO / GEO) --}}
<section class="py-12 md:py-16 reveal">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-10">
            <p class="section-tag">Common Questions</p>
            <h2 class="kk-h2">About Nabaraj Acharya</h2>
        </div>
        @php
            $faqs = [
                ['How many years of experience does he have?', ($personal->years_experience ?? '3') . '+ years of professional experience, with ' . ($personal->completed_projects ?? '30') . '+ completed projects for ' . ($personal->happy_clients ?? '10') . '+ clients.'],
                ['Why does he combine web development with SEO instead of focusing on just one?', "Most developers stop once a site is live, and most SEO specialists never touch code — that gap is exactly where sites quietly underperform. Handling both means search visibility gets built in from the architecture stage, not bolted on after launch."],
                ['Is he available for freelance or contract work?', 'Yes — freelance projects, consulting, and ongoing support engagements are all available; see the contact page to discuss a project.'],
                ['Does he work solo, or does he have a team?', "He works as an independent practice under the TechNabu name, which means you talk directly to the person doing the work rather than going through account managers or junior staff."],
                ['What size of business does he typically work with?', 'Mostly small to mid-sized businesses, startups, and individual professionals — the kind of clients who need senior-level attention but don\'t need (or want to pay for) a full agency.'],
                ['What\'s the best way to start working with him?', "Reach out through the contact page with a rough description of what you're trying to build or fix — a free initial conversation comes before any quote, so there's no pressure in just asking."],
                ['Does he take on small or one-off jobs, or only large projects?', "Both — a single fix, a small redesign, and a full custom application are all in scope. Project size mainly determines timeline and price, not whether the work gets taken on."],
            ];
        @endphp
        @include('partials.services-faq')
    </div>
</section>

{{-- CTA --}}
<section class="py-12 md:py-20 reveal">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <div class="cta-kk-banner text-center">
            <p class="section-tag !justify-center">Let's talk</p>
            <h2 class="font-display text-2xl md:text-4xl font-bold mb-4" style="color: var(--ink);">
                Want to work with a <span class="gradient-text">Full Stack Developer in Nepal?</span>
            </h2>
            <p class="mb-8 max-w-lg mx-auto" style="color: var(--ink-dim);">Let's discuss your project and see how I can help you build something great.</p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="{{ route('contact') }}" class="btn-primary" data-magnetic data-cursor="link"><span>Contact Me</span></a>
                <a href="{{ route('portfolio') }}" class="btn-outline" data-magnetic data-cursor="link">View Portfolio</a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); }
@media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }
.cert-kk-card { overflow: hidden; transition: all .3s ease; }
.cert-kk-card:hover { transform: translateY(-3px); }
.cert-kk-img { aspect-ratio: 4/3; display: flex; align-items: center; justify-content: center; background: var(--bg-soft); overflow: hidden; }
.cert-kk-img img { width: 100%; height: 100%; object-fit: contain; padding: 12px; transition: transform .5s ease; }
.cert-kk-card:hover .cert-kk-img img { transform: scale(1.05); }
</style>
@endpush
