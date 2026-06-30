<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&family=Rubik:wght@400;500;600;700&family=Dancing+Script:wght@600;700&display=swap" rel="stylesheet">
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
    <meta name="theme-color" content="#ffffff">
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
                        primary: '#df1d35',
                        secondary: '#14161a',
                        accent: '#df1d35',
                        dark: '#14161a',
                        surface: '#f4f4f6',
                    },
                    fontFamily: {
                        sans: ['Rubik', 'sans-serif'],
                        display: ['Rajdhani', 'sans-serif'],
                        mono: ['Rajdhani', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <style>
        :root {
            --bg: #ffffff;
            --bg-soft: #f4f4f6;
            --ink: #14161a;
            --ink-dim: #5d6168;
            --ink-faint: #9a9da3;
            --line: #e7e7ea;
            --line-strong: #d7d8db;
            --accent: #df1d35;
            --accent-dark: #b8152a;
            --accent-soft: rgba(223,29,53,0.08);
            --accent-ink: #ffffff;
        }
        * { box-sizing: border-box; }
        html { background: var(--bg); }
        body {
            font-family: 'Rubik', sans-serif;
            background: var(--bg);
            color: var(--ink);
            overflow-x: hidden;
            position: relative;
        }
        ::selection { background: var(--accent); color: #fff; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Rajdhani', sans-serif; font-weight: 700; }

        #scrollProgress {
            position: fixed; top: 0; left: 0; height: 3px; width: 0%;
            background: var(--accent); z-index: 70; transition: width .1s linear;
        }

        /* ── Nav ── */
        .site-nav {
            position: fixed; top: 0; left: 0; right: 0; z-index: 50;
            padding: 18px 0; transition: padding .3s ease, box-shadow .3s ease, background .3s ease;
            background: rgba(255,255,255,0.92);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--line);
        }
        .site-nav.scrolled { padding: 12px 0; box-shadow: 0 4px 24px rgba(20,22,26,0.06); }
        .nav-inner { max-width: 1220px; margin: 0 auto; padding: 0 20px; display: flex; align-items: center; justify-content: space-between; gap: 24px; }
        .nav-logo { display: flex; align-items: center; gap: 10px; flex-shrink: 0; }
        .nav-logo-mark {
            width: 38px; height: 38px; border-radius: 11px; background: var(--accent);
            color: #fff; font-weight: 800; font-size: 1rem; display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .nav-logo-text { font-family: 'Dancing Script', cursive; font-weight: 700; font-size: 1.7rem; color: var(--ink); letter-spacing: 0; }
        .nav-logo-text .accent { color: var(--accent); }
        .nav-links-desktop { display: none; align-items: center; gap: 26px; }
        @media (min-width: 1024px) { .nav-links-desktop { display: flex; } }
        .nav-link { font-family: 'Rajdhani', sans-serif; position: relative; color: var(--ink-dim); font-size: 1rem; font-weight: 600; transition: color 0.25s; padding-bottom: 3px; }
        .nav-link::after { content:''; position:absolute; bottom:0; left:0; width:0; height:2px; background:var(--accent); border-radius:2px; transition: width .3s ease; }
        .nav-link:hover, .nav-link.active { color: var(--ink); }
        .nav-link.active::after, .nav-link:hover::after { width: 100%; }

        .nav-link-dropdown { position: relative; }
        .nav-link-dropdown .nav-link { display: inline-flex; align-items: center; gap: 5px; }
        .nav-caret { transition: transform .25s ease; flex-shrink: 0; }
        .nav-link-dropdown:hover .nav-caret { transform: rotate(180deg); }
        .nav-dropdown-panel {
            position: absolute; top: 100%; left: 50%; transform: translateX(-50%);
            padding-top: 16px; width: 260px;
            opacity: 0; visibility: hidden; pointer-events: none;
            transition: opacity .2s ease, visibility .2s;
            z-index: 60;
        }
        .nav-link-dropdown:hover .nav-dropdown-panel,
        .nav-link-dropdown:focus-within .nav-dropdown-panel {
            opacity: 1; visibility: visible; pointer-events: auto;
        }
        .nav-dropdown-panel-inner {
            background: var(--bg); border: 1px solid var(--line);
            border-radius: 14px; box-shadow: 0 16px 40px rgba(20,22,26,0.12); padding: 8px;
            transform: translateY(-6px); transition: transform .2s ease;
        }
        .nav-link-dropdown:hover .nav-dropdown-panel-inner,
        .nav-link-dropdown:focus-within .nav-dropdown-panel-inner {
            transform: translateY(0);
        }
        .nav-dropdown-item {
            display: block; padding: 9px 14px; border-radius: 8px; font-size: 0.86rem;
            font-weight: 500; color: var(--ink-dim); transition: all .2s ease;
        }
        .nav-dropdown-item:hover { background: var(--bg-soft); color: var(--accent); }
        .nav-dropdown-viewall { color: var(--accent); font-weight: 700; border-top: 1px solid var(--line); margin-top: 4px; padding-top: 12px; }
        .nav-actions { display: flex; align-items: center; gap: 10px; flex-shrink: 0; }
        .nav-cta {
            display: none; align-items: center; gap: 8px; padding: 10px 22px; border-radius: 100px;
            font-family: 'Rajdhani', sans-serif; font-size: 0.95rem; font-weight: 700; color: #fff; background: var(--accent);
            transition: all 0.25s ease;
        }
        @media (min-width: 1024px) { .nav-cta { display: inline-flex; } }
        .nav-cta:hover { background: var(--accent-dark); transform: translateY(-1px); }

        .nav-social { display: none; align-items: center; gap: 8px; }
        @media (min-width: 640px) { .nav-social { display: flex; } }
        .nav-social a {
            width: 34px; height: 34px; border-radius: 50%; background: var(--bg-soft);
            display: flex; align-items: center; justify-content: center; color: var(--ink);
            transition: all 0.25s ease; flex-shrink: 0;
        }
        .nav-social a:hover { background: var(--accent); color: #fff; transform: translateY(-2px); }

        .nav-burger {
            display: flex; flex-direction: column; justify-content: center; align-items:center; gap: 4px;
            width: 40px; height: 40px; border-radius: 50%; background: var(--accent); flex-shrink: 0;
            position: relative; z-index: 60;
        }
        .nav-burger span { display: block; width: 16px; height: 2px; background: #fff; border-radius: 2px; transition: all .3s ease; }
        .nav-burger.is-open span:nth-child(1) { transform: translateY(3px) rotate(45deg); }
        .nav-burger.is-open span:nth-child(2) { transform: translateY(-3px) rotate(-45deg); }

        /* ── Mobile full-screen menu ── */
        .mobile-menu {
            position: fixed; inset: 0; z-index: 55; background: var(--bg);
            opacity: 0; visibility: hidden; transition: opacity .35s ease;
            display: flex; flex-direction: column; justify-content: center; padding: 32px;
        }
        .mobile-menu.open { opacity: 1; visibility: visible; }
        .mobile-nav-link {
            font-family: 'Rajdhani', sans-serif; font-size: 2.2rem; font-weight: 700; color: var(--ink);
            display: flex; align-items: baseline; gap: 14px; padding: 12px 0; border-bottom: 1px solid var(--line);
            opacity: 0; transform: translateY(14px); transition: opacity .4s ease, transform .4s ease, color .3s;
        }
        .mobile-menu.open .mobile-nav-link { opacity: 1; transform: translateY(0); }
        .mobile-nav-link .idx { font-size: 0.85rem; color: var(--ink-faint); font-weight: 600; }
        .mobile-nav-link.active, .mobile-nav-link:hover { color: var(--accent); }
        .mobile-menu-footer { margin-top: 28px; display: flex; gap: 20px; font-size: 0.8rem; color: var(--ink-dim); }

        .mobile-nav-group { border-bottom: 1px solid var(--line); }
        .mobile-nav-services-toggle { display: flex; align-items: center; gap: 14px; cursor: pointer; border-bottom: none; }
        .mobile-nav-services-toggle .nav-caret { transition: transform .3s ease; }
        .mobile-nav-services-toggle.is-open .nav-caret { transform: rotate(180deg); }
        .mobile-services-panel { max-height: 0; overflow: hidden; transition: max-height .35s ease; padding-left: 38px; }
        .mobile-services-panel.is-open { max-height: 480px; }
        .mobile-services-item {
            display: block; padding: 10px 0; font-family: 'Rubik', sans-serif; font-size: 1rem; font-weight: 500;
            color: var(--ink-dim); transition: color .2s ease;
        }
        .mobile-services-item:hover { color: var(--accent); }

        /* ── Shared components (used across pages) ── */
        .gradient-text { color: var(--accent); font-weight: 700; }
        .kk-h2 { font-family: 'Rajdhani', sans-serif; font-size: clamp(1.8rem, 4vw, 2.6rem); font-weight: 800; letter-spacing: -0.01em; margin-bottom: 14px; }
        .kk-sub { color: var(--ink-dim); font-size: 1rem; max-width: 580px; text-align: center; margin-left: auto; margin-right: auto; }
        .exp-kk-card { display: flex; flex-direction: column; gap: 10px; padding: 26px 28px; }
        @media (min-width: 768px) { .exp-kk-card { flex-direction: row; gap: 28px; } }
        .exp-kk-date { font-size: 0.82rem; font-weight: 700; color: var(--accent); flex-shrink: 0; width: 150px; }
        .exp-kk-body h3 { font-size: 1.1rem; font-weight: 700; }
        .exp-kk-company { font-size: 0.85rem; color: var(--ink-dim); margin-bottom: 8px; }
        .exp-kk-desc { font-size: 0.88rem; color: var(--ink-dim); line-height: 1.7; }
        .exp-kk-current { font-size: 0.62rem; font-weight: 700; padding: 3px 10px; border-radius: 100px; background: var(--accent-soft); color: var(--accent); text-transform: uppercase; }
        .section-tag {
            font-family: 'Rajdhani', sans-serif;
            color: var(--accent); font-size: 0.85rem; font-weight: 700;
            letter-spacing: 0.12em; text-transform: uppercase;
            margin-bottom: 12px; display: flex; align-items: center; justify-content: center; gap: 8px;
        }
        .btn-primary {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 14px 28px; background: var(--accent); color: #fff;
            border-radius: 100px; font-family: 'Rajdhani', sans-serif; font-weight: 700; font-size: 1rem;
            transition: all 0.25s ease; box-shadow: 0 8px 20px rgba(223,29,53,0.25);
        }
        .btn-primary:hover { background: var(--accent-dark); transform: translateY(-2px); }
        .btn-outline {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 13px 28px; border: 1.5px solid var(--line-strong); color: var(--ink);
            border-radius: 100px; font-family: 'Rajdhani', sans-serif; font-weight: 700; font-size: 1rem;
            transition: all 0.25s ease; background: transparent;
        }
        .btn-outline:hover { border-color: var(--accent); color: var(--accent); transform: translateY(-2px); }
        .glass-card {
            background: var(--bg-soft);
            border: 1px solid var(--line);
            border-radius: 18px;
            box-shadow: 4px 5px 0 0 var(--accent);
            transition: all 0.3s ease;
        }
        .glass-card:hover { transform: translate(-2px,-2px); box-shadow: 6px 7px 0 0 var(--accent); }
        .skill-badge {
            display: inline-flex; align-items: center;
            padding: 6px 14px; border-radius: 100px;
            font-size: 0.72rem; font-weight: 600;
            background: var(--bg-soft); border: 1px solid var(--line);
            color: var(--ink-dim); transition: all 0.2s;
        }
        .skill-badge:hover { border-color: var(--accent); color: var(--accent); background: var(--accent-soft); }
        .skill-badge-icon { width: 14px; height: 14px; object-fit: contain; margin-right: 6px; flex-shrink: 0; }
        .service-thumb { aspect-ratio: 16/10; overflow: hidden; background: var(--bg-soft); display: flex; align-items: center; justify-content: center; }
        .service-thumb img { width: 100%; height: 100%; object-fit: cover; transition: transform .5s ease; }
        .glass-card:hover .service-thumb img { transform: scale(1.04); }
        .service-thumb-placeholder { color: var(--ink-faint); }
        .service-hero-img { aspect-ratio: 21/9; overflow: hidden; }
        .service-hero-img img { width: 100%; height: 100%; object-fit: cover; }
        .quick-answer-box { background: var(--accent-soft); border-left: 4px solid var(--accent); border-radius: 4px 14px 14px 4px; padding: 20px 24px; }
        .quick-answer-label { font-family: 'Rajdhani', sans-serif; font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; color: var(--accent); margin-bottom: 8px; }
        .quick-answer-text { color: var(--ink); font-weight: 500; line-height: 1.7; font-size: 0.95rem; }
        .form-input {
            width: 100%; padding: 14px 18px;
            background: var(--bg-soft); border: 1px solid var(--line);
            border-radius: 12px; color: var(--ink);
            font-size: 0.9rem; transition: all 0.3s; outline: none;
        }
        .form-input::placeholder { color: var(--ink-faint); }
        .form-input:focus { border-color: var(--accent); box-shadow: 0 0 0 3px var(--accent-soft); }
        .page-hero { background: var(--bg-soft); border-bottom: 1px solid var(--line); }

        /* ── FAQ accordion ── */
        .faq-accordion { border: 1px solid var(--line); border-radius: 16px; overflow: hidden; }
        .faq-item { border-bottom: 1px solid var(--line); }
        .faq-item:last-child { border-bottom: none; }
        .faq-item:nth-child(even) { background: var(--bg-soft); }
        .faq-item:nth-child(odd) { background: var(--bg); }
        .faq-q-btn { width: 100%; display: flex; align-items: center; gap: 16px; padding: 18px 22px; text-align: left; cursor: pointer; background: none; border: none; font: inherit; }
        .faq-number { width: 30px; height: 30px; border-radius: 50%; background: var(--accent); color: #fff; font-weight: 700; font-size: 0.8rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-family: 'Rajdhani', sans-serif; }
        .faq-q-text { flex: 1; font-family: 'Rajdhani', sans-serif; font-weight: 700; font-size: 1rem; color: var(--ink); transition: color .2s ease; }
        .faq-item.is-open .faq-q-text { color: var(--accent); }
        .faq-chevron { flex-shrink: 0; transition: transform .25s ease; color: var(--ink-faint); }
        .faq-item.is-open .faq-chevron { transform: rotate(180deg); color: var(--accent); }
        .faq-a-wrap { max-height: 0; overflow: hidden; transition: max-height .35s ease; }
        .faq-item.is-open .faq-a-wrap { max-height: 600px; }
        .faq-a-inner { padding: 0 22px 20px 68px; color: var(--ink-dim); font-size: 0.92rem; line-height: 1.75; }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--bg-soft); }
        ::-webkit-scrollbar-thumb { background: var(--accent); border-radius: 3px; }

        .reveal { opacity: 0; transform: translateY(24px); transition: opacity 0.7s cubic-bezier(.16,1,.3,1), transform 0.7s cubic-bezier(.16,1,.3,1); }
        .reveal.visible { opacity: 1; transform: translateY(0); }

        @keyframes float { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-14px); } }
        .float { animation: float 6.5s ease-in-out infinite; }
        @keyframes zoomIn { from { transform: scale(0.92); opacity: 0; } to { transform: scale(1); opacity: 1; } }
        .animate-zoomIn { animation: zoomIn 0.4s cubic-bezier(0.34,1.56,0.64,1) forwards; }

        [data-magnetic] { will-change: transform; }
    </style>
    @stack('styles')
</head>
<body>

<div id="scrollProgress"></div>

{{-- NAVIGATION --}}
<header class="site-nav" id="siteNav">
    <div class="nav-inner">
        <a href="{{ route('home') }}" class="nav-logo" data-cursor="link">
            <span class="nav-logo-text">Tech<span class="accent">Nabu</span></span>
        </a>

        <nav class="nav-links-desktop">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
            <div class="nav-link-dropdown">
                <a href="{{ route('services') }}" class="nav-link {{ request()->routeIs('services*') ? 'active' : '' }}">
                    Services
                    <svg class="nav-caret" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                @if(isset($navServices) && $navServices->isNotEmpty())
                <div class="nav-dropdown-panel">
                    <div class="nav-dropdown-panel-inner">
                        @foreach($navServices as $s)
                        <a href="{{ route('services.' . $s->slug) }}" class="nav-dropdown-item">{{ $s->service_name }}</a>
                        @endforeach
                        <a href="{{ route('services') }}" class="nav-dropdown-item nav-dropdown-viewall">View All Services →</a>
                    </div>
                </div>
                @endif
            </div>
            <a href="{{ route('portfolio') }}" class="nav-link {{ request()->routeIs('portfolio*') ? 'active' : '' }}">Portfolio</a>
            <a href="{{ route('blog.index') }}" class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}">Blog</a>
            <a href="{{ route('gallery.index') }}" class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}">Gallery</a>
        </nav>

        <div class="nav-actions">
            @if($personal && ($personal->instagram_url || $personal->linkedin_url || $personal->github_url || $personal->facebook_url))
            <div class="nav-social">
                @if($personal->instagram_url)
                <a href="{{ $personal->instagram_url }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0 5.838a4 4 0 100 8 4 4 0 000-8zm0 6.6a2.6 2.6 0 110-5.2 2.6 2.6 0 010 5.2zm5.094-7.857a1.05 1.05 0 100-2.1 1.05 1.05 0 000 2.1z"/></svg>
                </a>
                @endif
                @if($personal->linkedin_url)
                <a href="{{ $personal->linkedin_url }}" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                </a>
                @endif
                @if($personal->github_url)
                <a href="{{ $personal->github_url }}" target="_blank" rel="noopener noreferrer" aria-label="GitHub">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/></svg>
                </a>
                @endif
                @if($personal->facebook_url)
                <a href="{{ $personal->facebook_url }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/></svg>
                </a>
                @endif
            </div>
            @endif
            <a href="{{ route('contact') }}" class="nav-cta" data-magnetic data-cursor="link">Let's Talk</a>
            <button id="mobile-toggle" class="nav-burger" aria-label="Toggle menu">
                <span></span><span></span>
            </button>
        </div>
    </div>
</header>

<div id="mobile-menu" class="mobile-menu">
    @foreach(['home'=>['Home','01'],'about'=>['About','02']] as $route => $meta)
    <a href="{{ route($route) }}" class="mobile-nav-link {{ request()->routeIs($route.'*') ? 'active' : '' }}">
        <span class="idx">{{ $meta[1] }}</span>{{ $meta[0] }}
    </a>
    @endforeach

    <div class="mobile-nav-group">
        <div class="mobile-nav-link mobile-nav-services-toggle {{ request()->routeIs('services*') ? 'active' : '' }}" id="mobileServicesToggle">
            <span class="idx">03</span>Services
            <svg class="nav-caret ml-auto" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </div>
        @if(isset($navServices) && $navServices->isNotEmpty())
        <div class="mobile-services-panel" id="mobileServicesPanel">
            <a href="{{ route('services') }}" class="mobile-services-item">All Services</a>
            @foreach($navServices as $s)
            <a href="{{ route('services.' . $s->slug) }}" class="mobile-services-item">{{ $s->service_name }}</a>
            @endforeach
        </div>
        @endif
    </div>

    <a href="{{ route('portfolio') }}" class="mobile-nav-link {{ request()->routeIs('portfolio*') ? 'active' : '' }}"><span class="idx">04</span>Portfolio</a>
    <a href="{{ route('blog.index') }}" class="mobile-nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}"><span class="idx">05</span>Blog</a>
    <a href="{{ route('gallery.index') }}" class="mobile-nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}"><span class="idx">06</span>Gallery</a>
    <a href="{{ route('contact') }}" class="mobile-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"><span class="idx">07</span>Contact</a>
    <div class="mobile-menu-footer">
        @if($personal && $personal->email)<span>{{ $personal->email }}</span>@endif
        @if($personal && $personal->location)<span>{{ $personal->location }}</span>@endif
    </div>
    @if($personal && ($personal->instagram_url || $personal->linkedin_url || $personal->github_url || $personal->facebook_url))
    <div class="nav-social" style="display:flex; margin-top:16px;">
        @if($personal->instagram_url)<a href="{{ $personal->instagram_url }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0 5.838a4 4 0 100 8 4 4 0 000-8zm0 6.6a2.6 2.6 0 110-5.2 2.6 2.6 0 010 5.2zm5.094-7.857a1.05 1.05 0 100-2.1 1.05 1.05 0 000 2.1z"/></svg></a>@endif
        @if($personal->linkedin_url)<a href="{{ $personal->linkedin_url }}" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></a>@endif
        @if($personal->github_url)<a href="{{ $personal->github_url }}" target="_blank" rel="noopener noreferrer" aria-label="GitHub"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/></svg></a>@endif
        @if($personal->facebook_url)<a href="{{ $personal->facebook_url }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/></svg></a>@endif
    </div>
    @endif
</div>

{{-- PAGE CONTENT --}}
<main class="relative z-10">
    @yield('content')
</main>

{{-- FOOTER --}}
<footer class="relative z-10" style="background: var(--bg-soft); border-top:1px solid var(--line);">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-16 md:py-20">

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-14 pb-10 border-b" style="border-color: var(--line);">
            <div>
                <p class="section-tag !justify-start">Currently</p>
                <h2 class="font-display text-3xl md:text-5xl font-bold" style="color: var(--ink);">
                    Open for select <span class="gradient-text">projects.</span>
                </h2>
            </div>
            @if($personal && $personal->email)
            <a href="mailto:{{ $personal->email }}" class="btn-primary flex-shrink-0" data-magnetic data-cursor="link">
                {{ $personal->email }}
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17L17 7M17 7H8M17 7v9"/></svg>
            </a>
            @endif
        </div>

        <div class="flex flex-col md:flex-row justify-between items-start gap-10 mb-14">
            <div class="max-w-xs">
                <a href="{{ route('home') }}" class="nav-logo mb-4 inline-flex">
                    <span class="nav-logo-text">Tech<span class="accent">Nabu</span></span>
                </a>
                <p class="text-sm leading-relaxed" style="color: var(--ink-dim);">
                    Full Stack Developer &amp; SEO Specialist building modern, fast, search-ready web experiences from Nepal.
                </p>
            </div>

            <div>
                <p class="text-xs font-bold uppercase tracking-widest mb-4" style="color: var(--ink-faint);">Pages</p>
                <div class="grid grid-cols-2 gap-x-10 gap-y-2.5">
                    @foreach(['home'=>'Home','about'=>'About','services'=>'Services','portfolio'=>'Work','contact'=>'Contact'] as $route => $label)
                    <a href="{{ route($route) }}" class="text-sm font-medium transition-colors" style="color: var(--ink-dim);" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='var(--ink-dim)'">{{ $label }}</a>
                    @endforeach
                    <a href="{{ route('blog.index') }}" class="text-sm font-medium transition-colors" style="color: var(--ink-dim);" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='var(--ink-dim)'">Blog</a>
                    <a href="{{ route('gallery.index') }}" class="text-sm font-medium transition-colors" style="color: var(--ink-dim);" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='var(--ink-dim)'">Gallery</a>
                </div>
            </div>

            <div>
                <p class="text-xs font-bold uppercase tracking-widest mb-4" style="color: var(--ink-faint);">Connect</p>
                <div class="flex gap-3">
                    @if($personal && $personal->github_url)
                    <a href="{{ $personal->github_url }}" target="_blank" rel="noopener noreferrer"
                       class="w-10 h-10 rounded-full flex items-center justify-center transition-all" style="background:var(--bg); border:1px solid var(--line); color:var(--ink-dim);"
                       onmouseover="this.style.color='var(--accent)';this.style.borderColor='var(--accent)'" onmouseout="this.style.color='var(--ink-dim)';this.style.borderColor='var(--line)'">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/></svg>
                    </a>
                    @endif
                    @if($personal && $personal->linkedin_url)
                    <a href="{{ $personal->linkedin_url }}" target="_blank" rel="noopener noreferrer"
                       class="w-10 h-10 rounded-full flex items-center justify-center transition-all" style="background:var(--bg); border:1px solid var(--line); color:var(--ink-dim);"
                       onmouseover="this.style.color='var(--accent)';this.style.borderColor='var(--accent)'" onmouseout="this.style.color='var(--ink-dim)';this.style.borderColor='var(--line)'">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                    @endif
                    @if($personal && $personal->facebook_url)
                    <a href="{{ $personal->facebook_url }}" target="_blank" rel="noopener noreferrer"
                       class="w-10 h-10 rounded-full flex items-center justify-center transition-all" style="background:var(--bg); border:1px solid var(--line); color:var(--ink-dim);"
                       onmouseover="this.style.color='var(--accent)';this.style.borderColor='var(--accent)'" onmouseout="this.style.color='var(--ink-dim)';this.style.borderColor='var(--line)'">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/></svg>
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="pt-6 border-t flex flex-col md:flex-row justify-between items-center gap-3" style="border-color: var(--line);">
            <p class="text-sm" style="color: var(--ink-faint);">© {{ date('Y') }} {{ $personal->brand_name ?? 'Nabaraj Acharya' }}. All rights reserved.</p>
            <p class="text-sm" style="color: var(--ink-faint);">Full Stack Developer · SEO Specialist · Nepal</p>
        </div>
    </div>
</footer>

{{-- POPUP --}}
<div id="popupModal" class="fixed inset-0 z-[9999] hidden items-center justify-center bg-black/60 backdrop-blur-md px-4">
    <div class="relative w-full max-w-md animate-zoomIn overflow-hidden rounded-2xl border" style="background: var(--bg); border-color: var(--line);">
        <button onclick="document.getElementById('popupModal').classList.add('hidden');document.getElementById('popupModal').classList.remove('flex')"
                class="absolute top-3 right-3 z-50 flex h-8 w-8 items-center justify-center rounded-full border text-lg leading-none transition-colors"
                style="background: var(--bg-soft); border-color: var(--line); color: var(--ink-dim);">×</button>
        <a id="popupLink" href="#" target="_blank" class="block">
            <img id="popupImage" src="" alt="Offer" class="w-full h-auto object-cover">
        </a>
        <div class="p-5 text-center border-t" style="border-color: var(--line);">
            <h3 id="popupTitle" class="mb-3 text-base font-display font-bold" style="color: var(--ink);">Special Offer!</h3>
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
    document.querySelectorAll('.mobile-nav-link:not(.mobile-nav-services-toggle), .mobile-services-item').forEach(l => {
        l.addEventListener('click', () => {
            menu.classList.remove('open');
            toggle.classList.remove('is-open');
            document.body.style.overflow = '';
        });
    });

    // ── Mobile services submenu ──
    const servicesToggle = document.getElementById('mobileServicesToggle');
    const servicesPanel = document.getElementById('mobileServicesPanel');
    if (servicesToggle && servicesPanel) {
        servicesToggle.addEventListener('click', () => {
            servicesToggle.classList.toggle('is-open');
            servicesPanel.classList.toggle('is-open');
        });
    }

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
    }, { threshold: 0, rootMargin: '0px 0px -10% 0px' });
    document.querySelectorAll('.reveal').forEach(el => ro.observe(el));

    // ── FAQ accordion ──
    document.querySelectorAll('.faq-accordion').forEach(acc => {
        acc.querySelectorAll('.faq-q-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const item = btn.closest('.faq-item');
                const wasOpen = item.classList.contains('is-open');
                acc.querySelectorAll('.faq-item').forEach(i => i.classList.remove('is-open'));
                if (!wasOpen) item.classList.add('is-open');
            });
        });
    });

    // ── Magnetic buttons ──
    document.querySelectorAll('[data-magnetic]').forEach(el => {
        el.addEventListener('mousemove', e => {
            const r = el.getBoundingClientRect();
            const x = (e.clientX - r.left - r.width / 2) * 0.2;
            const y = (e.clientY - r.top - r.height / 2) * 0.2;
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
