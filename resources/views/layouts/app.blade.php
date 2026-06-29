<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300..900;1,9..144,300..900&family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Per-page SEO --}}
    <title>@yield('title', ($seo->meta_title ?? 'Nabaraj Acharya — Full Stack Developer Nepal | Laravel Developer Nepal'))</title>
    <meta name="description" content="@yield('description', ($seo->meta_description ?? 'Nabaraj Acharya is a Full Stack Developer and SEO Specialist in Nepal, providing Laravel development and search growth services for clients in Nepal, Khotang, and Lalitpur.'))">
    <meta name="keywords" content="@yield('keywords', ($seo->meta_keywords ?? 'full stack developer nepal, laravel developer nepal, seo specialist in nepal, seo specialist in khotang, seo specialist in lalitpur, seo specalist in nepal, seo specalist in khotang, seo specalist in lalitpur, web developer nepal, nabaraj acharya, technabu'))">
    <meta name="author" content="{{ $personal->brand_name ?? 'Nabaraj Acharya' }}">
    <meta name="robots" content="@yield('robots', ($seo->robots_directives ?? 'index, follow'))">
    <meta name="googlebot" content="@yield('robots', ($seo->robots_directives ?? 'index, follow'))">
    <meta name="bingbot" content="@yield('robots', ($seo->robots_directives ?? 'index, follow'))">
    <meta name="language" content="English">
    <meta name="application-name" content="TechNabu">
    <meta name="theme-color" content="#0a0a0a">
    <meta name="format-detection" content="telephone=no">
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <meta name="geo.region" content="NP-BA" />
    <meta name="geo.placename" content="Kathmandu, Nepal" />
    <meta name="geo.position" content="27.7172;85.3240" />
    <meta name="ICBM" content="27.7172, 85.3240" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="canonical" href="@yield('canonical', (url()->current()))" />

    {{-- Open Graph --}}
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="@yield('canonical', (url()->current()))">
    <meta property="og:title" content="@yield('og_title', ($seo->og_title ?? 'Nabaraj Acharya — Full Stack Developer Nepal'))">
    <meta property="og:description" content="@yield('og_description', ($seo->og_description ?? 'Full Stack Developer and SEO Specialist in Nepal, Khotang, and Lalitpur.'))">
    <meta property="og:image" content="@yield('og_image', ($personal && $personal->logo_url ? url(Storage::url($personal->logo_url)) : ''))">
    <meta property="og:image:alt" content="@yield('og_image_alt', 'TechNabu featured image')">
    <meta property="og:site_name" content="TechNabu">
    <meta property="og:locale" content="en_US">
    @yield('og_meta')

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', ($seo->twitter_title ?? 'Nabaraj Acharya — Full Stack Developer Nepal'))">
    <meta name="twitter:description" content="@yield('twitter_description', ($seo->twitter_description ?? 'Full Stack Developer and SEO Specialist in Nepal, Khotang, and Lalitpur.'))">
    <meta name="twitter:image" content="@yield('twitter_image', ($personal && $personal->logo_url ? url(Storage::url($personal->logo_url)) : ''))">
    <meta name="twitter:image:alt" content="@yield('og_image_alt', 'TechNabu featured image')">

    {{-- Structured Data --}}
    @php
    $schema = [
        '@context' => 'https://schema.org',
        '@type'    => 'Person',
        'name'     => 'Nabaraj Acharya',
        'url'      => 'https://nabrajacharya.com.np',
        'jobTitle' => $personal->current_role ?? 'Full Stack Developer Nepal',
        'description' => 'Full Stack Developer and SEO Specialist in Nepal, Khotang, and Lalitpur, specializing in Laravel development, PHP, and technical SEO.',
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
                        primary: '#ff5a36',
                        secondary: '#c8a35e',
                        accent: '#ff5a36',
                        dark: '#0a0a0a',
                        surface: '#131313',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Fraunces', 'serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    },
                }
            }
        }
    </script>

    <style>
        :root {
            --bg: #0a0a0a;
            --bg-2: #131313;
            --ink: #f3efe7;
            --ink-dim: #8e8a82;
            --ink-faint: #5c5950;
            --line: rgba(243,239,231,0.09);
            --line-strong: rgba(243,239,231,0.2);
            --accent: #ff5a36;
            --accent-soft: rgba(255,90,54,0.14);
            --accent-ink: #1a0b06;
            --gold: #c8a35e;
        }
        * { box-sizing: border-box; }
        html { background: var(--bg); }
        html.no-js, html.lenis { height: auto; }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--ink);
            overflow-x: hidden;
            position: relative;
        }
        ::selection { background: var(--accent); color: var(--accent-ink); }

        /* ── Grain overlay ── */
        .grain {
            position: fixed; inset: -200px; z-index: 1; pointer-events: none;
            opacity: 0.045; mix-blend-mode: overlay;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='180' height='180'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
            animation: grainShift 1.1s steps(4) infinite;
        }
        @keyframes grainShift {
            0%   { transform: translate(0,0); }
            25%  { transform: translate(-3%,2%); }
            50%  { transform: translate(2%,-3%); }
            75%  { transform: translate(-2%,-2%); }
            100% { transform: translate(0,0); }
        }

        /* ── Cursor glow (additive, never replaces native cursor) ── */
        .cursor-glow, .cursor-ring {
            position: fixed; top: 0; left: 0; pointer-events: none; z-index: 60;
            transform: translate(-50%, -50%); will-change: transform;
        }
        .cursor-glow {
            width: 360px; height: 360px; border-radius: 50%;
            background: radial-gradient(circle, var(--accent-soft) 0%, transparent 70%);
            opacity: 0; transition: opacity .4s ease;
        }
        .cursor-ring {
            width: 30px; height: 30px; border-radius: 50%;
            border: 1px solid var(--line-strong);
            opacity: 0; transition: opacity .3s ease, width .3s ease, height .3s ease, background .3s ease, border-color .3s ease;
        }
        .cursor-ring.is-active { width: 56px; height: 56px; background: var(--accent-soft); border-color: var(--accent); }
        @media (pointer: fine) {
            .cursor-glow.is-visible, .cursor-ring.is-visible { opacity: 1; }
        }

        /* ── Scroll progress ── */
        #scrollProgress {
            position: fixed; top: 0; left: 0; height: 2px; width: 0%;
            background: var(--accent); z-index: 70; transition: width .1s linear;
        }

        html { scroll-behavior: auto; }

        /* ── Nav ── */
        .site-nav {
            position: fixed; top: 0; left: 0; right: 0; z-index: 50;
            padding: 22px 0; transition: padding .4s ease, background .4s ease, border-color .4s ease;
            border-bottom: 1px solid transparent;
        }
        .site-nav.scrolled {
            padding: 14px 0; background: rgba(10,10,10,0.82);
            backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--line);
        }
        .nav-inner {
            max-width: 1180px; margin: 0 auto; padding: 0 20px;
            display: flex; align-items: center; justify-content: space-between;
        }
        .nav-logo { display: flex; align-items: baseline; gap: 7px; }
        .nav-logo-mark {
            font-family: 'Fraunces', serif; font-style: italic; font-weight: 600;
            font-size: 1.6rem; color: var(--accent); line-height: 1;
        }
        .nav-logo-text {
            font-family: 'JetBrains Mono', monospace; font-size: 0.72rem; font-weight: 500;
            letter-spacing: 0.1em; text-transform: uppercase; color: var(--ink-dim);
        }
        .nav-links-desktop { display: none; align-items: center; gap: 30px; }
        @media (min-width: 1024px) { .nav-links-desktop { display: flex; } }
        .nav-link {
            position: relative; display: inline-flex; align-items: baseline; gap: 6px;
            color: var(--ink-dim); font-size: 0.85rem; font-weight: 500;
            transition: color 0.3s; padding-bottom: 4px;
        }
        .nav-link .idx { font-family: 'JetBrains Mono', monospace; font-size: 0.62rem; color: var(--ink-faint); }
        .nav-link::after {
            content: ''; position: absolute; bottom: 0; left: 0;
            width: 0; height: 1px; background: var(--accent);
            transition: width 0.35s cubic-bezier(.4,0,.2,1);
        }
        .nav-link:hover, .nav-link.active { color: var(--ink); }
        .nav-link:hover::after, .nav-link.active::after { width: 100%; }
        .nav-cta {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 9px 20px; border: 1px solid var(--line-strong); border-radius: 100px;
            font-size: 0.8rem; font-weight: 600; color: var(--ink);
            transition: all 0.3s ease;
        }
        .nav-cta:hover { background: var(--accent); border-color: var(--accent); color: var(--accent-ink); }

        .nav-burger {
            display: flex; flex-direction: column; justify-content: center; gap: 5px;
            width: 36px; height: 36px; position: relative; z-index: 60;
        }
        @media (min-width: 1024px) { .nav-burger { display: none; } }
        .nav-burger span { display: block; width: 22px; height: 1px; background: var(--ink); transition: all .3s ease; }
        .nav-burger.is-open span:nth-child(1) { transform: translateY(3px) rotate(45deg); }
        .nav-burger.is-open span:nth-child(2) { transform: translateY(-3px) rotate(-45deg); }

        /* ── Mobile full-screen menu ── */
        .mobile-menu {
            position: fixed; inset: 0; z-index: 55;
            background: var(--bg); opacity: 0; visibility: hidden;
            transition: opacity .4s ease; display: flex; flex-direction: column;
            justify-content: center; padding: 32px;
        }
        .mobile-menu.open { opacity: 1; visibility: visible; }
        .mobile-nav-link {
            font-family: 'Fraunces', serif; font-size: 2.2rem; font-weight: 500;
            color: var(--ink); display: flex; align-items: baseline; gap: 14px;
            padding: 12px 0; border-bottom: 1px solid var(--line);
            opacity: 0; transform: translateY(14px);
            transition: opacity .4s ease, transform .4s ease, color .3s;
        }
        .mobile-menu.open .mobile-nav-link { opacity: 1; transform: translateY(0); }
        .mobile-nav-link .idx { font-family: 'JetBrains Mono', monospace; font-size: 0.85rem; color: var(--ink-faint); }
        .mobile-nav-link.active, .mobile-nav-link:hover { color: var(--accent); }
        .mobile-menu-footer { margin-top: 28px; display: flex; gap: 20px; font-family: 'JetBrains Mono', monospace; font-size: 0.75rem; color: var(--ink-dim); }

        /* ── Shared components (used across pages) ── */
        .gradient-text { color: var(--accent); font-family: 'Fraunces', serif; font-style: italic; font-weight: 500; }
        .section-tag {
            font-family: 'JetBrains Mono', monospace;
            color: var(--ink-dim); font-size: 0.72rem; font-weight: 500;
            letter-spacing: 0.18em; text-transform: uppercase;
            margin-bottom: 14px; display: flex; align-items: center; justify-content: center; gap: 12px;
        }
        .section-tag::before { content: '—'; color: var(--accent); }
        .btn-primary {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 13px 26px; background: var(--ink); color: var(--accent-ink);
            border-radius: 100px; font-weight: 600; font-size: 0.88rem;
            transition: all 0.3s ease; position: relative;
        }
        .btn-primary:hover { background: var(--accent); color: var(--accent-ink); transform: translateY(-2px); }
        .btn-outline {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 12px 26px; border: 1px solid var(--line-strong); color: var(--ink);
            border-radius: 100px; font-weight: 600; font-size: 0.88rem;
            transition: all 0.3s ease; background: transparent;
        }
        .btn-outline:hover { border-color: var(--accent); color: var(--accent); transform: translateY(-2px); }
        .glass-card {
            background: var(--bg-2);
            border: 1px solid var(--line);
            border-radius: 14px;
            transition: all 0.35s ease;
        }
        .glass-card:hover { border-color: var(--line-strong); transform: translateY(-3px); }
        .skill-badge {
            display: inline-flex; align-items: center;
            padding: 5px 13px; border-radius: 100px;
            font-size: 0.7rem; font-weight: 500; letter-spacing: 0.03em;
            background: transparent; border: 1px solid var(--line);
            color: var(--ink-dim); transition: all 0.2s;
        }
        .skill-badge:hover { border-color: var(--accent); color: var(--accent); }
        .form-input {
            width: 100%; padding: 14px 18px;
            background: var(--bg-2); border: 1px solid var(--line);
            border-radius: 10px; color: var(--ink);
            font-size: 0.9rem; transition: all 0.3s; outline: none;
        }
        .form-input::placeholder { color: var(--ink-faint); }
        .form-input:focus { border-color: var(--accent); box-shadow: 0 0 0 3px var(--accent-soft); }
        .page-hero { border-bottom: 1px solid var(--line); }

        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: var(--bg); }
        ::-webkit-scrollbar-thumb { background: var(--accent); border-radius: 3px; opacity: .5; }

        .reveal {
            opacity: 0; transform: translateY(28px); filter: blur(6px);
            transition: opacity 0.9s cubic-bezier(.16,1,.3,1), transform 0.9s cubic-bezier(.16,1,.3,1), filter 0.9s cubic-bezier(.16,1,.3,1);
        }
        .reveal.visible { opacity: 1; transform: translateY(0); filter: blur(0); }

        @keyframes float { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-16px); } }
        .float { animation: float 6.5s ease-in-out infinite; }
        @keyframes zoomIn { from { transform: scale(0.92); opacity: 0; } to { transform: scale(1); opacity: 1; } }
        .animate-zoomIn { animation: zoomIn 0.4s cubic-bezier(0.34,1.56,0.64,1) forwards; }

        [data-magnetic] { will-change: transform; }
    </style>
    @stack('styles')
</head>
<body>

<div class="grain"></div>
<div id="scrollProgress"></div>
<div class="cursor-glow" id="cursorGlow"></div>
<div class="cursor-ring" id="cursorRing"></div>

{{-- NAVIGATION --}}
<header class="site-nav" id="siteNav">
    <div class="nav-inner">
        <a href="{{ route('home') }}" class="nav-logo" data-magnetic data-cursor="link">
            <span class="nav-logo-mark">N.</span><span class="nav-logo-text">Acharya</span>
        </a>

        <nav class="nav-links-desktop">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"><span class="idx">01</span>Home</a>
            <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"><span class="idx">02</span>About</a>
            <a href="{{ route('services') }}" class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}"><span class="idx">03</span>Services</a>
            <a href="{{ route('portfolio') }}" class="nav-link {{ request()->routeIs('portfolio*') ? 'active' : '' }}"><span class="idx">04</span>Work</a>
            <a href="{{ route('blog.index') }}" class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}"><span class="idx">05</span>Blog</a>
            <a href="{{ route('gallery.index') }}" class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}"><span class="idx">06</span>Gallery</a>
            <a href="{{ route('contact') }}" class="nav-cta" data-magnetic data-cursor="link">Let's Talk</a>
        </nav>

        <button id="mobile-toggle" class="nav-burger" aria-label="Toggle menu">
            <span></span><span></span>
        </button>
    </div>
</header>

<div id="mobile-menu" class="mobile-menu">
    @foreach(['home'=>['Home','01'],'about'=>['About','02'],'services'=>['Services','03'],'portfolio'=>['Work','04']] as $route => $meta)
    <a href="{{ route($route) }}" class="mobile-nav-link {{ request()->routeIs($route.'*') ? 'active' : '' }}">
        <span class="idx">{{ $meta[1] }}</span>{{ $meta[0] }}
    </a>
    @endforeach
    <a href="{{ route('blog.index') }}" class="mobile-nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}"><span class="idx">05</span>Blog</a>
    <a href="{{ route('gallery.index') }}" class="mobile-nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}"><span class="idx">06</span>Gallery</a>
    <a href="{{ route('contact') }}" class="mobile-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"><span class="idx">07</span>Contact</a>
    <div class="mobile-menu-footer">
        @if($personal && $personal->email)<span>{{ $personal->email }}</span>@endif
        @if($personal && $personal->location)<span>{{ $personal->location }}</span>@endif
    </div>
</div>

{{-- PAGE CONTENT --}}
<main class="relative z-10">
    @yield('content')
</main>

{{-- FOOTER --}}
<footer class="relative z-10 border-t border-white/5" style="background: var(--bg-2);">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-16 md:py-20">

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-14 md:mb-20 pb-10 border-b" style="border-color: var(--line);">
            <div>
                <p class="font-mono text-xs uppercase tracking-widest mb-3" style="color: var(--ink-faint);">Currently</p>
                <h2 class="font-display text-3xl md:text-5xl" style="color: var(--ink);">
                    Open for select <span class="gradient-text">projects</span>.
                </h2>
            </div>
            @if($personal && $personal->email)
            <a href="mailto:{{ $personal->email }}" class="btn-outline flex-shrink-0" data-magnetic data-cursor="link">
                {{ $personal->email }}
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17L17 7M17 7H8M17 7v9"/></svg>
            </a>
            @endif
        </div>

        <div class="flex flex-col md:flex-row justify-between items-start gap-10 mb-14">
            <div class="max-w-xs">
                <a href="{{ route('home') }}" class="nav-logo mb-4 inline-flex">
                    <span class="nav-logo-mark">N.</span><span class="nav-logo-text">Acharya</span>
                </a>
                <p class="text-sm leading-relaxed" style="color: var(--ink-dim);">
                    Full Stack Developer &amp; SEO Specialist building modern, fast, search-ready web experiences from Nepal.
                </p>
            </div>

            <div>
                <p class="font-mono text-[11px] uppercase tracking-widest mb-4" style="color: var(--ink-faint);">Pages</p>
                <div class="grid grid-cols-2 gap-x-10 gap-y-2.5">
                    @foreach(['home'=>'Home','about'=>'About','services'=>'Services','portfolio'=>'Work','contact'=>'Contact'] as $route => $label)
                    <a href="{{ route($route) }}" class="text-sm transition-colors" style="color: var(--ink-dim);" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='var(--ink-dim)'">{{ $label }}</a>
                    @endforeach
                    <a href="{{ route('blog.index') }}" class="text-sm transition-colors" style="color: var(--ink-dim);" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='var(--ink-dim)'">Blog</a>
                    <a href="{{ route('gallery.index') }}" class="text-sm transition-colors" style="color: var(--ink-dim);" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='var(--ink-dim)'">Gallery</a>
                </div>
            </div>

            <div>
                <p class="font-mono text-[11px] uppercase tracking-widest mb-4" style="color: var(--ink-faint);">Connect</p>
                <div class="flex flex-col gap-2.5">
                    @if($personal && $personal->github_url)
                    <a href="{{ $personal->github_url }}" target="_blank" rel="noopener noreferrer" class="text-sm inline-flex items-center gap-1.5 transition-colors" style="color: var(--ink-dim);" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='var(--ink-dim)'">GitHub <span class="text-xs">↗</span></a>
                    @endif
                    @if($personal && $personal->linkedin_url)
                    <a href="{{ $personal->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="text-sm inline-flex items-center gap-1.5 transition-colors" style="color: var(--ink-dim);" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='var(--ink-dim)'">LinkedIn <span class="text-xs">↗</span></a>
                    @endif
                    @if($personal && $personal->facebook_url)
                    <a href="{{ $personal->facebook_url }}" target="_blank" rel="noopener noreferrer" class="text-sm inline-flex items-center gap-1.5 transition-colors" style="color: var(--ink-dim);" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='var(--ink-dim)'">Facebook <span class="text-xs">↗</span></a>
                    @endif
                </div>
            </div>
        </div>

        <div class="pt-6 border-t flex flex-col md:flex-row justify-between items-center gap-3" style="border-color: var(--line);">
            <p class="font-mono text-xs" style="color: var(--ink-faint);">© {{ date('Y') }} {{ $personal->brand_name ?? 'Nabaraj Acharya' }}. All rights reserved.</p>
            <p class="font-mono text-xs" style="color: var(--ink-faint);">Full Stack Developer · SEO Specialist · Nepal</p>
        </div>
    </div>
</footer>

{{-- POPUP --}}
<div id="popupModal" class="fixed inset-0 z-[9999] hidden items-center justify-center bg-black/80 backdrop-blur-md px-4">
    <div class="relative w-full max-w-md animate-zoomIn overflow-hidden rounded-2xl border" style="background: var(--bg-2); border-color: var(--line-strong);">
        <button onclick="document.getElementById('popupModal').classList.add('hidden');document.getElementById('popupModal').classList.remove('flex')"
                class="absolute top-3 right-3 z-50 flex h-8 w-8 items-center justify-center rounded-full border text-lg leading-none transition-colors"
                style="background: var(--bg); border-color: var(--line-strong); color: var(--ink-dim);">×</button>
        <a id="popupLink" href="#" target="_blank" class="block">
            <img id="popupImage" src="" alt="Offer" class="w-full h-auto object-cover">
        </a>
        <div class="p-5 text-center border-t" style="border-color: var(--line);">
            <h3 id="popupTitle" class="mb-3 text-base font-display" style="color: var(--ink);">Special Offer!</h3>
            <a id="popupButton" href="#" target="_blank" class="btn-primary">Claim Now</a>
        </div>
    </div>
</div>

@include('components.ticket')

<script src="https://cdn.jsdelivr.net/npm/lenis@1/dist/lenis.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/ScrollTrigger.min.js"></script>

<script>
    // ── Smooth scroll (Lenis + GSAP ticker bridge) ──
    let __lenis = null;
    if (window.Lenis) {
        __lenis = new Lenis({ lerp: 0.11, smoothWheel: true });
        if (window.gsap && window.ScrollTrigger) {
            gsap.registerPlugin(ScrollTrigger);
            __lenis.on('scroll', ScrollTrigger.update);
            gsap.ticker.add((time) => __lenis.raf(time * 1000));
            gsap.ticker.lagSmoothing(0);
        } else {
            const raf = (time) => { __lenis.raf(time); requestAnimationFrame(raf); };
            requestAnimationFrame(raf);
        }
    }

    // ── Mobile nav ──
    const toggle = document.getElementById('mobile-toggle');
    const menu   = document.getElementById('mobile-menu');
    toggle.addEventListener('click', () => {
        const isOpen = menu.classList.toggle('open');
        toggle.classList.toggle('is-open', isOpen);
        document.body.style.overflow = isOpen ? 'hidden' : '';
    });
    document.querySelectorAll('.mobile-nav-link').forEach(l => {
        l.addEventListener('click', () => {
            menu.classList.remove('open');
            toggle.classList.remove('is-open');
            document.body.style.overflow = '';
        });
    });

    // ── Nav scroll state + scroll progress ──
    const siteNav = document.getElementById('siteNav');
    const progress = document.getElementById('scrollProgress');
    const onScroll = () => {
        const y = window.scrollY;
        siteNav.classList.toggle('scrolled', y > 30);
        const max = document.documentElement.scrollHeight - window.innerHeight;
        progress.style.width = (max > 0 ? Math.min(100, (y / max) * 100) : 0) + '%';
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    // ── Scroll reveal ──
    const ro = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                ro.unobserve(e.target);
                if (e.target.classList.contains('skills-section')) {
                    document.querySelectorAll('.skill-bar-fill').forEach(b => { b.style.width = b.dataset.width; });
                }
            }
        });
    }, { threshold: 0.1 });
    document.querySelectorAll('.reveal').forEach(el => ro.observe(el));

    // ── Custom cursor glow (additive, desktop only) ──
    if (window.matchMedia('(pointer: fine)').matches) {
        const glow = document.getElementById('cursorGlow');
        const ring = document.getElementById('cursorRing');
        let mx = -999, my = -999, gx = -999, gy = -999;
        let shown = false;
        window.addEventListener('mousemove', e => {
            mx = e.clientX; my = e.clientY;
            if (!shown) { shown = true; glow.classList.add('is-visible'); ring.classList.add('is-visible'); }
            ring.style.transform = `translate(${mx}px, ${my}px) translate(-50%,-50%)`;
        });
        const tick = () => {
            gx += (mx - gx) * 0.08; gy += (my - gy) * 0.08;
            glow.style.transform = `translate(${gx}px, ${gy}px) translate(-50%,-50%)`;
            requestAnimationFrame(tick);
        };
        tick();
        document.querySelectorAll('a, button, [data-cursor="link"]').forEach(el => {
            el.addEventListener('mouseenter', () => ring.classList.add('is-active'));
            el.addEventListener('mouseleave', () => ring.classList.remove('is-active'));
        });
    }

    // ── Magnetic buttons ──
    document.querySelectorAll('[data-magnetic]').forEach(el => {
        el.addEventListener('mousemove', e => {
            const r = el.getBoundingClientRect();
            const x = (e.clientX - r.left - r.width / 2) * 0.25;
            const y = (e.clientY - r.top - r.height / 2) * 0.25;
            el.style.transform = `translate(${x}px, ${y}px)`;
        });
        el.addEventListener('mouseleave', () => { el.style.transform = 'translate(0,0)'; });
    });

    // ── Popup ──
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
