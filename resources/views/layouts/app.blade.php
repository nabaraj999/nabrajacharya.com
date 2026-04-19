<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Per-page SEO --}}
    <title>@yield('title', ($seo->meta_title ?? 'Nabaraj Acharya — Full Stack Developer Nepal | Laravel Developer Nepal'))</title>
    <meta name="description" content="@yield('description', ($seo->meta_description ?? 'Nabaraj Acharya is a Full Stack Developer in Nepal specializing in Laravel development, SEO, and modern web applications. Available for freelance and full-time projects.'))">
    <meta name="keywords" content="@yield('keywords', ($seo->meta_keywords ?? 'full stack developer nepal, laravel developer nepal, web developer nepal, nabaraj acharya, technabu'))">
    <meta name="author" content="{{ $personal->brand_name ?? 'Nabaraj Acharya' }}">
    <meta name="robots" content="{{ $seo->robots_directives ?? 'index, follow' }}">
    <meta name="language" content="English">
    <meta name="geo.region" content="NP-BA" />
    <meta name="geo.placename" content="Kathmandu, Nepal" />
    <meta name="geo.position" content="27.7172;85.3240" />
    <meta name="ICBM" content="27.7172, 85.3240" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="canonical" href="@yield('canonical', (url()->current()))" />

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('og_title', ($seo->og_title ?? 'Nabaraj Acharya — Full Stack Developer Nepal'))">
    <meta property="og:description" content="@yield('og_description', ($seo->og_description ?? 'Full Stack Developer & Laravel Expert in Nepal.'))">
    <meta property="og:image" content="{{ $personal && $personal->logo_url ? Storage::url($personal->logo_url) : '' }}">
    <meta property="og:site_name" content="TechNabu">
    <meta property="og:locale" content="en_US">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', ($seo->twitter_title ?? 'Nabaraj Acharya — Full Stack Developer Nepal'))">
    <meta name="twitter:description" content="@yield('og_description', ($seo->twitter_description ?? 'Full Stack Developer & Laravel Expert in Nepal.'))">

    {{-- Structured Data --}}
    @php
    $schema = [
        '@context' => 'https://schema.org',
        '@type'    => 'Person',
        'name'     => 'Nabaraj Acharya',
        'url'      => 'https://nabrajacharya.com.np',
        'jobTitle' => $personal->current_role ?? 'Full Stack Developer Nepal',
        'description' => 'Full Stack Developer Nepal specializing in Laravel development and SEO',
        'address'  => ['@type' => 'PostalAddress', 'addressCountry' => 'NP', 'addressLocality' => 'Kathmandu'],
        'sameAs'   => array_filter([
            $personal->facebook_url ?? '',
            $personal->linkedin_url ?? '',
            $personal->github_url ?? '',
        ]),
    ];
    if ($personal && $personal->current_company) {
        $schema['worksFor'] = [
            '@type' => 'Organization',
            'name'  => $personal->current_company,
            'url'   => $personal->current_company_url ?? '',
        ];
    }
    @endphp
    <script type="application/ld+json">{!! json_encode($schema) !!}</script>
    @yield('schema')

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6366f1',
                        secondary: '#06b6d4',
                        accent: '#a855f7',
                        dark: '#050816',
                        surface: '#0d1117',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Space Grotesk', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <style>
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Inter', sans-serif;
            background: #050816;
            color: #e2e8f0;
            overflow-x: hidden;
        }
        .glass-nav {
            background: rgba(5, 8, 22, 0.8);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(99, 102, 241, 0.12);
        }
        .nav-link {
            position: relative;
            color: #94a3b8;
            transition: color 0.3s;
            font-size: 0.875rem;
            font-weight: 500;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px; left: 0;
            width: 0; height: 2px;
            background: linear-gradient(90deg, #6366f1, #06b6d4);
            border-radius: 2px;
            transition: width 0.3s ease;
        }
        .nav-link:hover, .nav-link.active { color: #e2e8f0; }
        .nav-link:hover::after, .nav-link.active::after { width: 100%; }
        .gradient-text {
            background: linear-gradient(135deg, #6366f1 0%, #06b6d4 50%, #a855f7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .btn-primary {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 12px 28px;
            background: linear-gradient(135deg, #6366f1, #a855f7);
            color: white; border-radius: 12px;
            font-weight: 600; font-size: 0.9rem;
            transition: all 0.3s ease;
            position: relative; overflow: hidden;
        }
        .btn-primary::before {
            content: ''; position: absolute; inset: 0;
            background: linear-gradient(135deg, #818cf8, #c084fc);
            opacity: 0; transition: opacity 0.3s;
        }
        .btn-primary:hover::before { opacity: 1; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(99,102,241,0.4); }
        .btn-primary > * { position: relative; z-index: 1; }
        .btn-outline {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 11px 28px;
            border: 1.5px solid rgba(99,102,241,0.5);
            color: #818cf8; border-radius: 12px;
            font-weight: 600; font-size: 0.9rem;
            transition: all 0.3s ease;
            background: rgba(99,102,241,0.05);
        }
        .btn-outline:hover {
            background: rgba(99,102,241,0.15);
            border-color: #6366f1; color: #c7d2fe;
            transform: translateY(-2px);
        }
        .glass-card {
            background: rgba(13, 17, 23, 0.85);
            border: 1px solid rgba(99,102,241,0.12);
            border-radius: 16px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        .glass-card:hover {
            border-color: rgba(99,102,241,0.35);
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        }
        .section-tag {
            color: #6366f1; font-size: 0.75rem; font-weight: 700;
            letter-spacing: 0.15em; text-transform: uppercase;
            margin-bottom: 12px;
            display: flex; align-items: center; justify-content: center; gap: 8px;
        }
        .section-tag::before, .section-tag::after {
            content: ''; height: 1px; width: 40px;
            background: linear-gradient(90deg, transparent, #6366f1);
        }
        .section-tag::after { background: linear-gradient(90deg, #6366f1, transparent); }
        .reveal {
            opacity: 0; transform: translateY(40px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }
        .reveal.visible { opacity: 1; transform: translateY(0); }
        .skill-badge {
            display: inline-flex; align-items: center;
            padding: 4px 12px; border-radius: 100px;
            font-size: 0.7rem; font-weight: 600; letter-spacing: 0.04em;
            background: rgba(99,102,241,0.12);
            border: 1px solid rgba(99,102,241,0.3);
            color: #a5b4fc;
            transition: all 0.2s;
        }
        .skill-badge:hover {
            background: rgba(99,102,241,0.25);
            border-color: rgba(99,102,241,0.6);
        }
        .skill-bar-track {
            height: 6px; background: rgba(99,102,241,0.15);
            border-radius: 10px; overflow: hidden;
        }
        .skill-bar-fill {
            height: 100%; border-radius: 10px;
            background: linear-gradient(90deg, #6366f1, #06b6d4);
            width: 0%; transition: width 1.4s cubic-bezier(0.4,0,0.2,1);
            box-shadow: 0 0 8px rgba(99,102,241,0.5);
        }
        .form-input {
            width: 100%; padding: 14px 18px;
            background: rgba(22,27,39,0.8);
            border: 1px solid rgba(99,102,241,0.2);
            border-radius: 10px; color: #e2e8f0;
            font-size: 0.9rem; transition: all 0.3s; outline: none;
        }
        .form-input::placeholder { color: #475569; }
        .form-input:focus {
            border-color: rgba(99,102,241,0.6);
            background: rgba(99,102,241,0.05);
            box-shadow: 0 0 0 3px rgba(99,102,241,0.1);
        }
        .orb {
            position: fixed; border-radius: 50%;
            filter: blur(100px); opacity: 0.08; pointer-events: none; z-index: 0;
        }
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #050816; }
        ::-webkit-scrollbar-thumb { background: rgba(99,102,241,0.4); border-radius: 3px; }
        .mobile-menu { max-height: 0; overflow: hidden; opacity: 0; transition: all 0.3s ease; }
        .mobile-menu.open { max-height: 400px; opacity: 1; }
        @keyframes float { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-18px); } }
        @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
        .float { animation: float 6s ease-in-out infinite; }
        @keyframes zoomIn { from { transform: scale(0.85); opacity: 0; } to { transform: scale(1); opacity: 1; } }
        .animate-zoomIn { animation: zoomIn 0.4s cubic-bezier(0.34,1.56,0.64,1) forwards; }
        .page-hero {
            background: linear-gradient(135deg, rgba(99,102,241,0.08) 0%, rgba(6,182,212,0.05) 100%);
            border-bottom: 1px solid rgba(99,102,241,0.1);
        }
    </style>
</head>
<body>

{{-- Ambient orbs --}}
<div class="orb w-96 h-96 bg-indigo-600" style="top:-80px;left:-80px;"></div>
<div class="orb w-72 h-72 bg-cyan-500" style="top:50vh;right:-60px;"></div>
<div class="orb w-64 h-64 bg-purple-600" style="bottom:20vh;left:25%;"></div>

{{-- NAVIGATION --}}
<header class="fixed w-full glass-nav z-50">
    <nav class="max-w-6xl mx-auto px-6 py-4 relative z-10">
        <div class="flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-display font-bold gradient-text">TechNabu</a>

            <div class="hidden md:flex items-center space-x-7">
                <a href="{{ route('home') }}"
                   class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('about') }}"
                   class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                <a href="{{ route('services') }}"
                   class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
                <a href="{{ route('portfolio') }}"
                   class="nav-link {{ request()->routeIs('portfolio*') ? 'active' : '' }}">Portfolio</a>
                <a href="{{ route('contact') }}"
                   class="px-5 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-sm font-semibold rounded-lg hover:shadow-lg hover:shadow-indigo-500/25 transition-all hover:-translate-y-0.5 {{ request()->routeIs('contact') ? 'ring-2 ring-indigo-400' : '' }}">
                    Contact
                </a>
            </div>

            <button id="mobile-toggle" class="md:hidden p-2 text-slate-400 hover:text-white transition-colors relative z-10">
                <svg id="icon-open" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg id="icon-close" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div id="mobile-menu" class="mobile-menu md:hidden">
            <div class="flex flex-col space-y-1 pt-4 pb-2">
                @foreach(['home'=>'Home','about'=>'About','services'=>'Services','portfolio'=>'Portfolio','contact'=>'Contact'] as $route => $label)
                <a href="{{ route($route) }}"
                   class="mobile-nav-link px-4 py-3 text-sm font-medium rounded-lg transition-all
                          {{ request()->routeIs($route.'*') ? 'text-white bg-indigo-500/15 border border-indigo-500/20' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                    {{ $label }}
                </a>
                @endforeach
            </div>
        </div>
    </nav>
</header>

{{-- PAGE CONTENT --}}
<main class="relative z-10">
    @yield('content')
</main>

{{-- FOOTER --}}
<footer class="relative z-10 pt-16 pb-10 border-t border-slate-800/60">
    <div class="max-w-6xl mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-start gap-10">
            <div class="max-w-xs">
                <a href="{{ route('home') }}" class="text-xl font-display font-bold gradient-text block mb-3">TechNabu</a>
                <p class="text-slate-500 text-sm leading-relaxed mb-4">
                    Full Stack Developer Nepal — building modern web experiences with Laravel & beyond.
                </p>
                @if($personal)
                <div class="space-y-2 text-sm text-slate-500">
                    @if($personal->email)
                    <p class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-indigo-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        {{ $personal->email }}
                    </p>
                    @endif
                    @if($personal->location)
                    <p class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-indigo-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        {{ $personal->location }}
                    </p>
                    @endif
                </div>
                @endif
            </div>

            <div>
                <p class="text-xs text-slate-600 font-semibold uppercase tracking-widest mb-4">Pages</p>
                <div class="grid grid-cols-2 gap-x-10 gap-y-2">
                    @foreach(['home'=>'Home','about'=>'About','services'=>'Services','portfolio'=>'Portfolio','contact'=>'Contact'] as $route => $label)
                    <a href="{{ route($route) }}" class="text-sm text-slate-500 hover:text-indigo-400 transition-colors">{{ $label }}</a>
                    @endforeach
                </div>
            </div>

            <div>
                <p class="text-xs text-slate-600 font-semibold uppercase tracking-widest mb-4">Connect</p>
                <div class="flex gap-3">
                    @if($personal && $personal->github_url)
                    <a href="{{ $personal->github_url }}" target="_blank" rel="noopener noreferrer"
                       class="w-10 h-10 rounded-xl bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-400 hover:text-white hover:border-slate-500 transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/></svg>
                    </a>
                    @endif
                    @if($personal && $personal->linkedin_url)
                    <a href="{{ $personal->linkedin_url }}" target="_blank" rel="noopener noreferrer"
                       class="w-10 h-10 rounded-xl bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-400 hover:text-blue-400 hover:border-blue-500/50 transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                    @endif
                    @if($personal && $personal->facebook_url)
                    <a href="{{ $personal->facebook_url }}" target="_blank" rel="noopener noreferrer"
                       class="w-10 h-10 rounded-xl bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-400 hover:text-indigo-400 hover:border-indigo-500/50 transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/></svg>
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="mt-10 pt-6 border-t border-slate-800/60 flex flex-col md:flex-row justify-between items-center gap-3">
            <p class="text-slate-600 text-sm">© {{ date('Y') }} {{ $personal->brand_name ?? 'Nabaraj Acharya' }}. All rights reserved.</p>
            <p class="text-slate-700 text-xs">Full Stack Developer Nepal | Laravel Developer Nepal</p>
        </div>
    </div>
</footer>

{{-- POPUP --}}
<div id="popupModal" class="fixed inset-0 z-[9999] hidden items-center justify-center bg-black/70 backdrop-blur-md px-4">
    <div class="relative w-full max-w-md animate-zoomIn overflow-hidden rounded-2xl bg-surface border border-indigo-500/20 shadow-2xl">
        <button onclick="document.getElementById('popupModal').classList.add('hidden');document.getElementById('popupModal').classList.remove('flex')"
                class="absolute top-3 right-3 z-50 flex h-8 w-8 items-center justify-center rounded-full bg-slate-800 border border-slate-700 text-slate-400 hover:text-white hover:bg-red-600 hover:border-red-600 transition-all text-lg leading-none">×</button>
        <a id="popupLink" href="#" target="_blank" class="block">
            <img id="popupImage" src="" alt="Offer" class="w-full h-auto object-cover">
        </a>
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-5 text-center">
            <h3 id="popupTitle" class="mb-3 text-base font-display font-bold text-white">Special Offer!</h3>
            <a id="popupButton" href="#" target="_blank"
               class="inline-block rounded-full bg-white px-7 py-2 text-sm font-bold text-indigo-600 hover:scale-105 transition-transform">Claim Now</a>
        </div>
    </div>
</div>

@include('components.ticket')

<script>
    // Mobile nav
    const toggle = document.getElementById('mobile-toggle');
    const menu   = document.getElementById('mobile-menu');
    const iconO  = document.getElementById('icon-open');
    const iconC  = document.getElementById('icon-close');
    toggle.addEventListener('click', () => {
        menu.classList.toggle('open');
        iconO.classList.toggle('hidden');
        iconC.classList.toggle('hidden');
    });
    document.querySelectorAll('.mobile-nav-link').forEach(l => {
        l.addEventListener('click', () => {
            menu.classList.remove('open');
            iconO.classList.remove('hidden');
            iconC.classList.add('hidden');
        });
    });

    // Scroll reveal
    const ro = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                ro.unobserve(e.target);
                if (e.target.classList.contains('skills-section')) {
                    document.querySelectorAll('.skill-bar-fill').forEach(b => {
                        b.style.width = b.dataset.width;
                    });
                }
            }
        });
    }, { threshold: 0.1 });
    document.querySelectorAll('.reveal').forEach(el => ro.observe(el));

    // Popup
    document.addEventListener('DOMContentLoaded', () => {
        fetch('/api/popup').then(r => r.json()).then(data => {
            if (!data?.image) return;
            document.getElementById('popupImage').src = data.image;
            document.getElementById('popupTitle').textContent = data.title || 'Special Deal!';
            const url = data.url || '#';
            document.getElementById('popupLink').href = url;
            document.getElementById('popupButton').href = url;
            document.getElementById('popupButton').textContent = data.button_text || 'Claim Now';
            const m = document.getElementById('popupModal');
            m.classList.remove('hidden'); m.classList.add('flex');
        }).catch(() => {});
        document.getElementById('popupModal').addEventListener('click', e => {
            if (e.target === document.getElementById('popupModal')) {
                e.target.classList.add('hidden'); e.target.classList.remove('flex');
            }
        });
    });
</script>
@stack('scripts')
</body>
</html>
