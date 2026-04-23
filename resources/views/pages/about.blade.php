@extends('layouts.app')

@section('title', $seo->meta_title ?? 'About Nabaraj Acharya — Full Stack Developer & SEO Specialist in Nepal')
@section('description', $seo->meta_description ?? 'Learn about Nabaraj Acharya, a Full Stack Developer and SEO Specialist in Nepal, with service focus in Khotang and Lalitpur.')
@section('keywords', $seo->meta_keywords ?? 'full stack developer nepal, laravel developer nepal, about nabaraj acharya, seo specialist in nepal, seo specialist in khotang, seo specialist in lalitpur, seo specalist in khotang, seo specalist in lalitpur')

@section('schema')
@php
$aboutSchema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'AboutPage',
    'name'        => 'About Nabaraj Acharya — Full Stack Developer and SEO Specialist in Nepal',
    'url'         => route('about'),
    'mainEntity'  => [
        '@type'    => 'Person',
        'name'     => 'Nabaraj Acharya',
        'jobTitle' => 'Full Stack Developer & SEO Expert',
        'url'      => 'https://nabrajacharya.com.np',
        'worksFor' => ['@type' => 'Organization', 'name' => $personal->current_company ?? 'TechAble Australia'],
    ],
];
@endphp
<script type="application/ld+json">{!! json_encode($aboutSchema) !!}</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Existing scripts...
    });

    // Certification Lightbox
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
@stack('scripts')
@endsection

@section('content')

{{-- Page Hero --}}
<section class="page-hero pt-24 pb-10 md:pt-32 md:pb-16 relative">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 text-center">
        <div class="section-tag">About</div>
        <h1 class="font-display text-4xl md:text-5xl font-bold mt-2 mb-4">
            Full Stack Developer & <span class="gradient-text">SEO Specialist in Nepal</span>
        </h1>
        <p class="text-slate-400 text-lg max-w-2xl mx-auto">
            Building high-performance Laravel applications and driving organic growth — based in Nepal, working globally.
        </p>
    </div>
</section>


{{-- About Content --}}
<section class="py-10 md:py-16 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row items-start gap-8 md:gap-14">

            {{-- Photo + current role card --}}
            <div class="md:w-2/5 flex flex-col items-center gap-6">
                <div class="relative">
                    <div class="w-64 md:w-72 h-64 md:h-72 rounded-2xl overflow-hidden border border-indigo-500/20 shadow-xl shadow-indigo-500/10">
                        @if($personal && $personal->about_photo)
                            <img src="{{ Storage::url($personal->about_photo) }}"
                                 alt="{{ $personal->brand_name ?? 'Nabaraj Acharya' }} — Full Stack Developer & SEO Expert Nepal"
                                 class="w-full h-full object-cover">
                        @elseif($personal && $personal->profile_photo)
                            <img src="{{ Storage::url($personal->profile_photo) }}"
                                 alt="{{ $personal->brand_name ?? 'Nabaraj Acharya' }} — Full Stack Developer & SEO Expert Nepal"
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-indigo-900 to-purple-900 flex items-center justify-center">
                                <span class="text-slate-400 text-4xl font-display font-bold">NA</span>
                            </div>
                        @endif
                    </div>
                    <div class="absolute -top-2 -left-2 w-5 h-5 border-t-2 border-l-2 border-indigo-500 rounded-tl"></div>
                    <div class="absolute -top-2 -right-2 w-5 h-5 border-t-2 border-r-2 border-cyan-500 rounded-tr"></div>
                    <div class="absolute -bottom-2 -left-2 w-5 h-5 border-b-2 border-l-2 border-cyan-500 rounded-bl"></div>
                    <div class="absolute -bottom-2 -right-2 w-5 h-5 border-b-2 border-r-2 border-indigo-500 rounded-br"></div>
                </div>

                {{-- Current employment card --}}
                @if($personal && $personal->current_company)
                <div class="w-full rounded-xl bg-emerald-500/8 border border-emerald-500/20 p-5">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse flex-shrink-0"></span>
                        <span class="text-xs font-semibold text-emerald-400 uppercase tracking-wider">Currently Employed</span>
                    </div>
                    <p class="text-white font-semibold text-sm mb-1">{{ $personal->current_role }}</p>
                    @if($personal->current_company_url)
                        <a href="{{ $personal->current_company_url }}" target="_blank" rel="noopener noreferrer"
                           class="text-cyan-400 text-sm hover:text-cyan-300 transition-colors">{{ $personal->current_company }} ↗</a>
                    @else
                        <p class="text-slate-400 text-sm">{{ $personal->current_company }}</p>
                    @endif
                    @if($personal->current_role_start)
                        <p class="text-slate-500 text-xs mt-1">Since {{ \Carbon\Carbon::parse($personal->current_role_start)->format('F Y') }}</p>
                    @endif
                </div>
                @endif

                {{-- Stats --}}
                @if($personal)
                <div class="w-full grid grid-cols-3 gap-3">
                    <div class="text-center p-3 rounded-xl bg-slate-900/50 border border-slate-800">
                        <div class="text-2xl font-display font-bold gradient-text">{{ $personal->years_experience ?? 0 }}+</div>
                        <div class="text-slate-500 text-xs mt-0.5">Years</div>
                    </div>
                    <div class="text-center p-3 rounded-xl bg-slate-900/50 border border-slate-800">
                        <div class="text-2xl font-display font-bold gradient-text">{{ $personal->completed_projects ?? 0 }}+</div>
                        <div class="text-slate-500 text-xs mt-0.5">Projects</div>
                    </div>
                    <div class="text-center p-3 rounded-xl bg-slate-900/50 border border-slate-800">
                        <div class="text-2xl font-display font-bold gradient-text">{{ $personal->happy_clients ?? 0 }}+</div>
                        <div class="text-slate-500 text-xs mt-0.5">Clients</div>
                    </div>
                </div>
                @endif
            </div>

            {{-- Bio + skills --}}
            <div class="md:w-3/5">
                <h2 class="font-display text-2xl font-bold text-white mb-5">Hi, I'm <span class="gradient-text">{{ $personal->brand_name ?? 'Nabaraj Acharya' }}</span></h2>
                <div class="text-slate-300 leading-relaxed text-base prose prose-invert max-w-none mb-10">
                    {!! $personal->about_description ?? '<p>Passionate Full Stack Developer & SEO Expert based in Nepal. I specialize in building scalable Laravel applications and crafting data-driven SEO strategies that drive real organic growth for businesses across Nepal and Australia.</p>' !!}
                </div>

                {{-- Skills --}}
                @if($skills->isNotEmpty())
                <div class="mt-8 md:mt-12">
                    <h3 class="font-display font-semibold text-white mb-4 md:mb-6">Technical Skills</h3>
                    
                    @php
                        $groupedSkills = $skills->groupBy(fn($s) => $s->category ?: 'other');
                    @endphp

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 skills-section">
                        @foreach($groupedSkills as $category => $catSkills)
                        <div class="p-5 rounded-xl bg-slate-900/40 border border-white/5">
                            <h4 class="text-[10px] font-bold uppercase tracking-widest text-slate-500 mb-4 flex items-center gap-2">
                                {{ str($category)->headline() }}
                                <span class="h-px flex-1 bg-slate-800"></span>
                            </h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($catSkills as $skill)
                                <div class="px-3 py-1.5 rounded-lg bg-slate-800/50 border border-slate-700/50 flex items-center gap-2">
                                    <span class="text-xs font-medium text-slate-300">{{ $skill->skill_name }}</span>
                                    <span class="text-[9px] text-indigo-400 font-bold">{{ $skill->proficiency }}%</span>
                                </div>
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
<section class="py-10 md:py-16 reveal">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <div class="section-tag">Career</div>
        <h2 class="font-display text-3xl md:text-4xl font-bold text-center mb-10 md:mb-16">
            Work <span class="gradient-text">Experience</span>
        </h2>

        <div class="relative pl-8 sm:pl-10">
            <div class="absolute left-0 top-0 bottom-0 w-0.5 bg-gradient-to-b from-indigo-500 via-cyan-500 to-transparent rounded-full"></div>

            @foreach($experiences as $exp)
            <div class="relative mb-6 last:mb-0">
                {{-- Timeline dot --}}
                <div class="absolute -left-[33px] sm:-left-[45px] top-5 flex items-center justify-center">
                    @if($exp->is_current)
                    <span class="relative flex h-4 w-4">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-40"></span>
                        <span class="relative inline-flex rounded-full h-4 w-4 bg-emerald-500 border-2 border-emerald-300"></span>
                    </span>
                    @else
                    <span class="w-3.5 h-3.5 rounded-full bg-gradient-to-br from-indigo-500 to-cyan-500 shadow-md shadow-indigo-500/50"></span>
                    @endif
                </div>

                <div class="glass-card p-6">
                    <div class="flex flex-col sm:flex-row sm:items-start gap-4">
                        {{-- Logo --}}
                        @if($exp->company_logo)
                        <img src="{{ asset('storage/'.$exp->company_logo) }}" alt="{{ $exp->company_name }}"
                             class="w-12 h-12 rounded-xl object-contain border border-white/10 bg-white/5 p-1.5 flex-shrink-0">
                        @else
                        <div class="w-12 h-12 rounded-xl bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                        @endif

                        <div class="flex-1">
                            {{-- Date badge --}}
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold {{ $exp->is_current ? 'text-emerald-400 bg-emerald-500/10 border-emerald-500/25' : 'text-indigo-400 bg-indigo-500/10 border-indigo-500/25' }} border px-3 py-1 rounded-full mb-3">
                                {{ $exp->start_date->format('M Y') }} — {{ $exp->is_current ? 'Present' : ($exp->end_date ? $exp->end_date->format('M Y') : 'Present') }}
                                @if($exp->is_current)
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                @endif
                            </span>

                            <h3 class="font-display text-lg font-bold text-white mb-1">{{ $exp->position }}</h3>

                            <div class="flex flex-wrap items-center gap-2 mb-3">
                                @if($exp->company_url)
                                <a href="{{ $exp->company_url }}" target="_blank" rel="noopener noreferrer"
                                   class="text-cyan-400 text-sm font-semibold hover:text-cyan-300 transition-colors">{{ $exp->company_name }} ↗</a>
                                @else
                                <span class="text-cyan-400 text-sm font-semibold">{{ $exp->company_name }}</span>
                                @endif

                                @if($exp->employment_type)
                                <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-slate-800 border border-slate-700 text-slate-400">{{ $exp->employment_type }}</span>
                                @endif

                                @if($exp->location)
                                <span class="text-xs text-slate-500 flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                    {{ $exp->location }}
                                </span>
                                @endif
                            </div>

                            @if($exp->description)
                            <p class="text-slate-400 text-sm leading-relaxed">{{ $exp->description }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


{{-- Certifications & Gallery --}}
@if($certifications->isNotEmpty())
<section class="py-10 md:py-16 reveal overflow-hidden">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="section-tag">Gallery</div>
        <h2 class="font-display text-3xl md:text-4xl font-bold text-center mb-10 md:mb-16">
            Certifications & <span class="gradient-text">Achievements</span>
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($certifications as $cert)
            <div class="certification-card group relative h-72 rounded-2xl overflow-hidden glass-card cursor-pointer" 
                 onclick="openCertLightbox('{{ asset('storage/'.$cert->image) }}', '{{ $cert->title }}', '{{ $cert->issuer }}')">
                {{-- Background Image --}}
                @if($cert->image)
                <div class="absolute inset-0 bg-slate-900 flex items-center justify-center p-4">
                    <img src="{{ asset('storage/'.$cert->image) }}" alt="{{ $cert->title }}" 
                         class="max-w-full max-h-full object-contain transition-transform duration-700 group-hover:scale-110">
                </div>
                @else
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-900/40 to-slate-900 flex items-center justify-center">
                    <svg class="w-16 h-16 text-indigo-500/20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                </div>
                @endif

                {{-- Overlay --}}
                <div class="absolute inset-0 bg-gradient-to-t from-dark via-dark/40 to-transparent opacity-80 transition-opacity group-hover:opacity-90"></div>

                {{-- Content --}}
                <div class="absolute inset-0 p-6 flex flex-col justify-end transform transition-transform duration-300 group-hover:-translate-y-2">
                    <span class="text-xs font-bold text-indigo-400 uppercase tracking-widest mb-2">{{ $cert->issuer }}</span>
                    <h3 class="text-lg font-display font-bold text-white mb-3">{{ $cert->title }}</h3>
                    
                    <div class="flex items-center justify-between opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="text-xs text-slate-400">{{ $cert->issue_date->format('M Y') }}</span>
                        <div class="flex gap-2">
                             @if($cert->credential_url)
                             <a href="{{ $cert->credential_url }}" target="_blank" onclick="event.stopPropagation()" class="p-2 rounded-lg bg-indigo-500/20 text-indigo-400 hover:bg-indigo-500 hover:text-white transition-all">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                             </a>
                             @endif
                             <div class="p-2 rounded-lg bg-white/10 text-white hover:bg-white/20 transition-all">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Lightbox Modal --}}
<div id="certLightbox" class="fixed inset-0 z-[10000] hidden items-center justify-center bg-black/95 backdrop-blur-md px-4 py-10" onclick="closeCertLightbox()">
    <div class="relative w-full max-w-5xl max-h-full flex flex-col items-center animate-zoomIn" onclick="event.stopPropagation()">
        <button onclick="closeCertLightbox()" class="absolute -top-12 right-0 text-white hover:text-indigo-400 transition-colors flex items-center gap-2 font-semibold">
            <span>Close</span> <span class="text-2xl">×</span>
        </button>
        
        <div class="w-full overflow-auto rounded-xl border border-white/10 shadow-2xl bg-slate-900/50">
            <img id="lightboxImage" src="" alt="Certificate" class="w-full h-auto max-h-[80vh] object-contain mx-auto">
        </div>
        
        <div class="mt-6 text-center">
            <h3 id="lightboxTitle" class="text-xl font-display font-bold text-white mb-1"></h3>
            <p id="lightboxIssuer" class="text-indigo-400 font-semibold"></p>
        </div>
    </div>
</div>
@endif


{{-- Education Timeline --}}
@if($education->isNotEmpty())
<section class="py-10 md:py-16 reveal">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <div class="section-tag">Background</div>
        <h2 class="font-display text-3xl md:text-4xl font-bold text-center mb-10 md:mb-16">
            Education & <span class="gradient-text">Academic Background</span>
        </h2>

        <div class="relative pl-8 sm:pl-10">
            <div class="absolute left-0 top-0 bottom-0 w-0.5 bg-gradient-to-b from-amber-500 via-orange-500 to-transparent rounded-full"></div>
            @foreach($education as $edu)
            <div class="relative mb-10 last:mb-0">
                <div class="absolute -left-[9px] top-6 w-3 h-3 rounded-full bg-gradient-to-br from-amber-500 to-orange-500 shadow-lg shadow-amber-500/50"></div>
                <div class="glass-card p-6 flex items-start gap-4">
                    @if($edu->image_url)
                        <img src="{{ Storage::url($edu->image_url) }}" alt="{{ $edu->institution }}"
                             class="w-12 h-12 rounded-xl object-cover flex-shrink-0 border border-amber-500/20">
                    @endif
                    <div class="flex-1">
                        <span class="inline-flex text-xs font-semibold text-amber-400 bg-amber-500/10 border border-amber-500/20 px-3 py-1 rounded-full mb-2">
                            {{ $edu->start_year }} — {{ $edu->end_year ?? ($edu->status === 'in_progress' ? 'Present' : '') }}
                        </span>
                        <h3 class="font-display text-lg font-bold text-white mb-1">{{ $edu->degree }}</h3>
                        <p class="text-amber-400 text-sm font-medium mb-2">{{ $edu->institution }}</p>
                        @if($edu->description)
                            <p class="text-slate-400 text-sm leading-relaxed">{{ $edu->description }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


{{-- CTA --}}
<section class="py-12 md:py-16 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 text-center">
        <h2 class="font-display text-3xl font-bold mb-4">Want to work with a <span class="gradient-text">Full Stack Developer in Nepal?</span></h2>
        <p class="text-slate-400 mb-8 max-w-lg mx-auto">Let's discuss your project and see how I can help you build something great.</p>
        <div class="flex flex-wrap gap-4 justify-center">
            <a href="{{ route('contact') }}" class="btn-primary"><span>Contact Me</span></a>
            <a href="{{ route('portfolio') }}" class="btn-outline">View Portfolio</a>
        </div>
    </div>
</section>

@endsection
