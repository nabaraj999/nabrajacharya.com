<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('storage/icon/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>{{ $seo->meta_title ?? 'Nabaraj Acharya - Full-Stack Developer' }}</title>
    <meta name="description" content="{{ $seo->meta_description ?? 'Professional web developer in Nepal with expertise in creating stunning, functional websites and engaging content for local businesses.' }}">
    <meta name="keywords" content="{{ $seo->meta_keywords ?? 'web developer, full-stack, Laravel, Nepal, portfolio' }}">
    <meta name="author" content="{{ $personal->brand_name ?? 'Nabaraj Acharya' }}">
    <meta name="robots" content="{{ $seo->robots_directives ?? 'index, follow' }}">
    <meta name="language" content="English">
    <meta name="revisit-after" content="7 days">
    <link rel="canonical" href="{{ $seo->canonical_url ?? 'https://nabrajacharya.com.np' }}" />
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://nabrajacharya.com.np">
    <meta property="og:title" content="{{ $seo->og_title ?? 'Nabaraj Acharya Portfolio' }}">
    <meta property="og:description" content="{{ $seo->og_description ?? 'Professional web developer in Nepal.' }}">
    <meta property="og:image" content="{{ Storage::url($personal->logo_url) }}">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="{{ $seo->twitter_title ?? 'Nabaraj Acharya | Web Developer' }}">
    <meta name="geo.region" content="NP-BA" />
    <meta name="geo.placename" content="Kathmandu" />

    <script type="application/ld+json">
        {!! $seo->structured_data_json ?? '{
            "@context": "https://schema.org",
            "@type": "Person",
            "name": "Nabaraj Acharya",
            "url": "https://nabrajacharya.com.np",
            "jobTitle": "Full-Stack Developer",
            "worksFor": { "@type": "Organization", "name": "TechNabu" }
        }' !!}
    </script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6366f1',
                        secondary: '#06b6d4',
                        accent: '#a855f7',
                        dark: '#050816',
                        card: '#0d1117',
                        surface: '#161b27',
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

        /* Noise texture overlay */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
        }

        /* Glow orbs */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.15;
            pointer-events: none;
        }

        /* Glassmorphism nav */
        .glass-nav {
            background: rgba(5, 8, 22, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(99, 102, 241, 0.15);
        }

        /* Nav link active/hover */
        .nav-link {
            position: relative;
            color: #94a3b8;
            transition: color 0.3s;
            font-size: 0.875rem;
            font-weight: 500;
            letter-spacing: 0.02em;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #6366f1, #06b6d4);
            border-radius: 2px;
            transition: width 0.3s ease;
        }
        .nav-link:hover { color: #e2e8f0; }
        .nav-link:hover::after { width: 100%; }

        /* Hero gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #6366f1 0%, #06b6d4 50%, #a855f7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Pill badge */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 14px;
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }
        .badge-primary {
            background: rgba(99, 102, 241, 0.15);
            border: 1px solid rgba(99, 102, 241, 0.4);
            color: #818cf8;
        }

        /* Buttons */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
            background: linear-gradient(135deg, #6366f1, #a855f7);
            color: white;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .btn-primary::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #818cf8, #c084fc);
            opacity: 0;
            transition: opacity 0.3s;
        }
        .btn-primary:hover::before { opacity: 1; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(99, 102, 241, 0.4); }
        .btn-primary span { position: relative; z-index: 1; }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 28px;
            border: 1.5px solid rgba(99, 102, 241, 0.5);
            color: #818cf8;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            background: rgba(99, 102, 241, 0.05);
        }
        .btn-outline:hover {
            background: rgba(99, 102, 241, 0.15);
            border-color: #6366f1;
            color: #c7d2fe;
            transform: translateY(-2px);
        }

        /* Profile ring */
        .profile-ring {
            position: relative;
            display: inline-block;
        }
        .profile-ring::before {
            content: '';
            position: absolute;
            inset: -4px;
            border-radius: 50%;
            background: linear-gradient(135deg, #6366f1, #06b6d4, #a855f7, #6366f1);
            background-size: 300% 300%;
            animation: gradientSpin 4s linear infinite;
            z-index: -1;
        }
        @keyframes gradientSpin {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Floating animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .float { animation: float 6s ease-in-out infinite; }

        /* Section reveal */
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }
        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Glass card */
        .glass-card {
            background: rgba(13, 17, 23, 0.8);
            border: 1px solid rgba(99, 102, 241, 0.12);
            border-radius: 16px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        .glass-card:hover {
            border-color: rgba(99, 102, 241, 0.35);
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(99,102,241,0.1);
        }

        /* Stat card */
        .stat-card {
            background: rgba(22, 27, 39, 0.9);
            border: 1px solid rgba(99, 102, 241, 0.15);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s;
        }
        .stat-card:hover {
            border-color: rgba(99, 102, 241, 0.4);
            background: rgba(99, 102, 241, 0.08);
        }

        /* Section heading */
        .section-tag {
            color: #6366f1;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .section-tag::before, .section-tag::after {
            content: '';
            height: 1px;
            width: 40px;
            background: linear-gradient(90deg, transparent, #6366f1);
        }
        .section-tag::after {
            background: linear-gradient(90deg, #6366f1, transparent);
        }

        /* Service card */
        .service-card {
            background: rgba(13, 17, 23, 0.9);
            border: 1px solid rgba(99, 102, 241, 0.12);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s ease;
            position: relative;
        }
        .service-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(99,102,241,0.08), rgba(168,85,247,0.05));
            opacity: 0;
            transition: opacity 0.4s;
        }
        .service-card:hover::before { opacity: 1; }
        .service-card:hover {
            border-color: rgba(99, 102, 241, 0.4);
            transform: translateY(-6px);
            box-shadow: 0 24px 48px rgba(0,0,0,0.5), 0 0 30px rgba(99,102,241,0.1);
        }

        /* Service overlay */
        .service-overlay {
            position: absolute;
            inset: 0;
            background: rgba(5, 8, 22, 0.92);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 24px;
            opacity: 0;
            transition: opacity 0.35s ease;
            backdrop-filter: blur(4px);
        }
        .service-card:hover .service-overlay { opacity: 1; }

        /* Project card */
        .project-card {
            background: rgba(13, 17, 23, 0.9);
            border: 1px solid rgba(99, 102, 241, 0.12);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s ease;
        }
        .project-card:hover {
            border-color: rgba(6, 182, 212, 0.4);
            transform: translateY(-6px);
            box-shadow: 0 24px 48px rgba(0,0,0,0.5), 0 0 30px rgba(6,182,212,0.1);
        }
        .project-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(5,8,22,0.98) 40%, rgba(5,8,22,0.4) 100%);
            opacity: 0;
            transition: opacity 0.35s ease;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 24px;
        }
        .project-card:hover .project-overlay { opacity: 1; }

        /* Timeline */
        .timeline-track {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, #6366f1, #06b6d4);
            border-radius: 2px;
        }
        .timeline-dot {
            position: absolute;
            left: -5px;
            top: 24px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: linear-gradient(135deg, #6366f1, #06b6d4);
            box-shadow: 0 0 12px rgba(99,102,241,0.6);
        }

        /* Skill item */
        .skill-item {
            background: rgba(22, 27, 39, 0.8);
            border: 1px solid rgba(99, 102, 241, 0.12);
            border-radius: 12px;
            padding: 16px 20px;
            transition: all 0.3s;
        }
        .skill-item:hover {
            border-color: rgba(99, 102, 241, 0.35);
            background: rgba(99, 102, 241, 0.07);
        }
        .skill-bar-track {
            height: 6px;
            background: rgba(99,102,241,0.15);
            border-radius: 10px;
            overflow: hidden;
        }
        .skill-bar-fill {
            height: 100%;
            border-radius: 10px;
            background: linear-gradient(90deg, #6366f1, #06b6d4);
            width: 0%;
            transition: width 1.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 0 8px rgba(99,102,241,0.5);
        }

        /* Form inputs */
        .form-input {
            width: 100%;
            padding: 14px 18px;
            background: rgba(22, 27, 39, 0.8);
            border: 1px solid rgba(99, 102, 241, 0.2);
            border-radius: 10px;
            color: #e2e8f0;
            font-size: 0.9rem;
            transition: all 0.3s;
            outline: none;
        }
        .form-input::placeholder { color: #475569; }
        .form-input:focus {
            border-color: rgba(99, 102, 241, 0.6);
            background: rgba(99, 102, 241, 0.05);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        /* Footer */
        .footer-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(99,102,241,0.4), transparent);
            margin: 0 0 32px;
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #050816; }
        ::-webkit-scrollbar-thumb { background: rgba(99,102,241,0.4); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(99,102,241,0.7); }

        /* Mobile menu */
        .mobile-menu {
            transition: all 0.3s ease;
            max-height: 0;
            overflow: hidden;
            opacity: 0;
        }
        .mobile-menu.open {
            max-height: 400px;
            opacity: 1;
        }

        /* Typing cursor */
        .typing-cursor::after {
            content: '|';
            animation: blink 1s step-end infinite;
            color: #6366f1;
        }
        @keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: 0; } }

        /* Popup */
        @keyframes zoomIn {
            from { transform: scale(0.85); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        .animate-zoomIn { animation: zoomIn 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) forwards; }
    </style>
</head>

<body>

    <!-- Ambient background orbs -->
    <div class="orb w-96 h-96 bg-indigo-600" style="top: -100px; left: -100px;"></div>
    <div class="orb w-80 h-80 bg-cyan-500" style="top: 40vh; right: -80px;"></div>
    <div class="orb w-72 h-72 bg-purple-600" style="top: 80vh; left: 30%;"></div>

    <!-- NAVIGATION -->
    <header class="fixed w-full glass-nav z-50">
        <nav class="max-w-6xl mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <a href="#home" class="text-xl font-display font-bold gradient-text">
                    TechNabu
                </a>

                <!-- Desktop Nav -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="nav-link">Home</a>
                    <a href="#about" class="nav-link">About</a>
                    <a href="#services" class="nav-link">Services</a>
                    <a href="#projects" class="nav-link">Projects</a>
                    <a href="#education" class="nav-link">Education</a>
                    <a href="#skills" class="nav-link">Skills</a>
                    <a href="#contact"
                        class="px-5 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-sm font-semibold rounded-lg hover:shadow-lg hover:shadow-indigo-500/30 transition-all duration-300 hover:-translate-y-0.5">
                        Contact
                    </a>
                </div>

                <!-- Mobile toggle -->
                <button id="mobile-toggle" class="md:hidden p-2 text-slate-400 hover:text-white transition-colors">
                    <svg id="icon-open" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg id="icon-close" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="mobile-menu md:hidden">
                <div class="flex flex-col space-y-1 pt-4 pb-2">
                    @foreach(['home'=>'Home','about'=>'About','services'=>'Services','projects'=>'Projects','education'=>'Education','skills'=>'Skills','contact'=>'Contact'] as $id => $label)
                    <a href="#{{ $id }}" class="mobile-nav-link px-4 py-3 text-slate-300 hover:text-white hover:bg-indigo-500/10 rounded-lg transition-all text-sm font-medium">
                        {{ $label }}
                    </a>
                    @endforeach
                </div>
            </div>
        </nav>
    </header>


    <!-- HERO SECTION -->
    <section id="home" class="relative min-h-screen flex items-center pt-20 overflow-hidden">
        <!-- Grid pattern -->
        <div class="absolute inset-0 opacity-[0.03]"
            style="background-image: linear-gradient(rgba(99,102,241,1) 1px, transparent 1px), linear-gradient(90deg, rgba(99,102,241,1) 1px, transparent 1px); background-size: 50px 50px;">
        </div>

        <div class="relative max-w-6xl mx-auto px-6 py-20 w-full">
            <div class="flex flex-col-reverse md:flex-row items-center gap-16">

                <!-- Text -->
                <div class="flex-1 text-center md:text-left">
                    <div class="badge badge-primary mb-6">
                        <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                        Available for work
                    </div>

                    <h1 class="font-display text-5xl md:text-6xl lg:text-7xl font-bold leading-tight mb-4">
                        Hi, I'm<br>
                        <span class="gradient-text">{{ $personal->brand_name ?? 'Nabaraj Acharya' }}</span>
                    </h1>

                    <h2 class="text-xl md:text-2xl text-slate-400 font-medium mb-6">
                        <span id="typed-text" class="typing-cursor text-cyan-400"></span>
                    </h2>

                    <p class="text-slate-400 text-lg leading-relaxed mb-10 max-w-xl">
                        {{ $personal->description ?? 'I craft high-performance web applications that help businesses thrive in the digital landscape.' }}
                    </p>

                    <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                        <a href="#projects" class="btn-primary">
                            <span>View My Work</span>
                            <svg class="w-4 h-4 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                        <a href="#contact" class="btn-outline">
                            Let's Talk
                        </a>
                    </div>
                </div>

                <!-- Photo -->
                <div class="flex-shrink-0 float">
                    @if ($personal && $personal->profile_photo)
                        <div class="profile-ring">
                            <img src="{{ Storage::url($personal->profile_photo) }}" alt="Profile Photo"
                                class="w-64 h-64 md:w-80 md:h-80 rounded-full object-cover relative z-10">
                        </div>
                    @else
                        <div class="profile-ring">
                            <div class="w-64 h-64 md:w-80 md:h-80 rounded-full bg-gradient-to-br from-indigo-600 via-purple-600 to-cyan-500 flex items-center justify-center relative z-10">
                                <span class="text-white text-5xl font-display font-bold">NA</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Scroll hint -->
            <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-40">
                <span class="text-xs text-slate-500 tracking-widest uppercase">Scroll</span>
                <div class="w-px h-10 bg-gradient-to-b from-indigo-500 to-transparent animate-pulse"></div>
            </div>
        </div>
    </section>


    <!-- ABOUT SECTION -->
    <section id="about" class="py-24 relative reveal">
        <div class="max-w-6xl mx-auto px-6">
            <div class="section-tag">About Me</div>
            <h2 class="font-display text-3xl md:text-4xl font-bold text-center mb-16">
                Who I <span class="gradient-text">Am</span>
            </h2>

            <div class="flex flex-col md:flex-row items-center gap-12">
                <!-- Photo -->
                <div class="md:w-2/5 flex justify-center">
                    <div class="relative">
                        <div class="w-64 h-64 md:w-72 md:h-72 rounded-2xl overflow-hidden border border-indigo-500/20 shadow-2xl shadow-indigo-500/10">
                            @if ($personal && $personal->logo_url)
                                <img src="{{ Storage::url($personal->logo_url) }}" alt="About Photo" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-indigo-900 to-purple-900 flex items-center justify-center">
                                    <span class="text-slate-400">No Photo</span>
                                </div>
                            @endif
                        </div>
                        <!-- Decorative corners -->
                        <div class="absolute -top-3 -left-3 w-6 h-6 border-t-2 border-l-2 border-indigo-500 rounded-tl-lg"></div>
                        <div class="absolute -top-3 -right-3 w-6 h-6 border-t-2 border-r-2 border-cyan-500 rounded-tr-lg"></div>
                        <div class="absolute -bottom-3 -left-3 w-6 h-6 border-b-2 border-l-2 border-cyan-500 rounded-bl-lg"></div>
                        <div class="absolute -bottom-3 -right-3 w-6 h-6 border-b-2 border-r-2 border-indigo-500 rounded-br-lg"></div>
                    </div>
                </div>

                <!-- Content -->
                <div class="md:w-3/5">
                    <div class="prose text-slate-300 leading-relaxed mb-8 text-base">
                        {!! $personal->about_description ?? 'Passionate developer building modern web experiences.' !!}
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div class="stat-card">
                            <div class="text-3xl font-display font-bold gradient-text mb-1">{{ $personal->years_experience ?? 0 }}+</div>
                            <div class="text-slate-500 text-sm">Years Exp.</div>
                        </div>
                        <div class="stat-card">
                            <div class="text-3xl font-display font-bold gradient-text mb-1">{{ $personal->completed_projects ?? 0 }}+</div>
                            <div class="text-slate-500 text-sm">Projects</div>
                        </div>
                        <div class="stat-card">
                            <div class="text-3xl font-display font-bold gradient-text mb-1">{{ $personal->happy_clients ?? 0 }}+</div>
                            <div class="text-slate-500 text-sm">Happy Clients</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- SERVICES SECTION -->
    <section id="services" class="py-24 relative reveal">
        <div class="max-w-6xl mx-auto px-6">
            <div class="section-tag">What I Do</div>
            <h2 class="font-display text-3xl md:text-4xl font-bold text-center mb-4">
                My <span class="gradient-text">Services</span>
            </h2>
            <p class="text-center text-slate-400 mb-16 max-w-xl mx-auto">I bring your digital ideas to life with quality craftsmanship and precision.</p>

            @if ($services->isEmpty())
                <p class="text-center text-slate-500">No services available at the moment.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($services as $service)
                        <div class="service-card group">
                            <div class="h-48 overflow-hidden"
                                style="background-image: url('{{ $service->photo ? asset('storage/' . $service->photo) : '' }}'); background-size: cover; background-position: center; background-color: #161b27;">
                                @if (!$service->photo)
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-indigo-500/40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6 relative">
                                <h3 class="font-display text-lg font-semibold text-white">{{ $service->service_name }}</h3>
                                <p class="text-slate-400 text-sm mt-2 line-clamp-2">{{ strip_tags($service->description) }}</p>
                            </div>
                            <div class="service-overlay rounded-2xl">
                                <p class="text-slate-200 text-sm text-center leading-relaxed">{!! $service->description !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>


    <!-- PROJECTS SECTION -->
    <section id="projects" class="py-24 relative reveal">
        <div class="max-w-6xl mx-auto px-6">
            <div class="section-tag">Portfolio</div>
            <h2 class="font-display text-3xl md:text-4xl font-bold text-center mb-4">
                Featured <span class="gradient-text">Projects</span>
            </h2>
            <p class="text-center text-slate-400 mb-16 max-w-xl mx-auto">A selection of projects that showcase my technical expertise and creative approach.</p>

            @if ($projects->isEmpty())
                <p class="text-center text-slate-500">No projects available at the moment.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($projects as $project)
                        <div class="project-card group relative">
                            <div class="h-52 overflow-hidden"
                                style="background-image: url('{{ $project->image_url ? asset('storage/' . $project->image_url) : '' }}'); background-size: cover; background-position: center; background-color: #161b27;">
                                @if (!$project->image_url)
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="h-14 w-14 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="project-overlay">
                                <div class="mb-3">
                                    <h3 class="font-display text-lg font-bold text-white mb-2">{{ $project->title }}</h3>
                                    <p class="text-slate-300 text-sm leading-relaxed line-clamp-3">{!! strip_tags($project->description) !!}</p>
                                </div>
                                @if ($project->project_url)
                                    <a href="{{ $project->project_url }}" target="_blank"
                                        class="inline-flex items-center gap-2 mt-2 px-4 py-2 bg-cyan-500/20 border border-cyan-500/40 text-cyan-400 text-sm font-semibold rounded-lg hover:bg-cyan-500/30 transition-colors w-fit">
                                        View Live
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                            <!-- Title always visible at bottom -->
                            <div class="p-5">
                                <h3 class="font-display font-semibold text-white">{{ $project->title }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>


    <!-- EDUCATION SECTION -->
    <section id="education" class="py-24 relative reveal">
        <div class="max-w-6xl mx-auto px-6">
            <div class="section-tag">Background</div>
            <h2 class="font-display text-3xl md:text-4xl font-bold text-center mb-16">
                Education & <span class="gradient-text">Experience</span>
            </h2>

            @if ($education->isEmpty())
                <p class="text-center text-slate-500">No education records available.</p>
            @else
                <div class="max-w-3xl mx-auto">
                    <div class="relative pl-10">
                        <div class="timeline-track"></div>
                        @foreach ($education as $index => $edu)
                            <div class="relative mb-10 last:mb-0">
                                <div class="timeline-dot"></div>
                                <div class="glass-card p-6 flex items-start gap-4">
                                    @if ($edu->image_url)
                                        <img src="{{ Storage::url($edu->image_url) }}" alt="{{ $edu->degree }}"
                                            class="w-12 h-12 rounded-xl object-cover flex-shrink-0 border border-indigo-500/20">
                                    @endif
                                    <div class="flex-1 min-w-0">
                                        <div class="inline-flex items-center gap-2 text-xs font-semibold text-indigo-400 mb-2 bg-indigo-500/10 px-3 py-1 rounded-full">
                                            {{ $edu->start_year }} — {{ $edu->end_year ?? ($edu->status === 'in_progress' ? 'Present' : '') }}
                                        </div>
                                        <h3 class="font-display text-lg font-bold text-white mb-1">{{ $edu->degree }}</h3>
                                        <p class="text-cyan-400 text-sm font-medium mb-2">{{ $edu->institution }}</p>
                                        @if ($edu->description)
                                            <p class="text-slate-400 text-sm leading-relaxed">{{ $edu->description }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>


    <!-- SKILLS SECTION -->
    <section id="skills" class="py-24 relative reveal">
        <div class="max-w-6xl mx-auto px-6">
            <div class="section-tag">Expertise</div>
            <h2 class="font-display text-3xl md:text-4xl font-bold text-center mb-16">
                My <span class="gradient-text">Skills</span>
            </h2>

            @if ($skills->isEmpty())
                <p class="text-center text-slate-500">No skills listed yet.</p>
            @else
                <div class="max-w-3xl mx-auto space-y-4">
                    @foreach ($skills as $skill)
                        <div class="skill-item">
                            <div class="flex justify-between items-center mb-3">
                                <span class="font-semibold text-white text-sm">{{ $skill->skill_name }}</span>
                                <span class="text-xs font-bold text-indigo-400 bg-indigo-500/10 px-2.5 py-1 rounded-full">{{ $skill->proficiency }}%</span>
                            </div>
                            <div class="skill-bar-track">
                                <div class="skill-bar-fill" data-width="{{ $skill->proficiency }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>


    <!-- CONTACT SECTION -->
    <section id="contact" class="py-24 relative reveal">
        <div class="max-w-6xl mx-auto px-6">
            <div class="section-tag">Get In Touch</div>
            <h2 class="font-display text-3xl md:text-4xl font-bold text-center mb-4">
                Let's <span class="gradient-text">Work Together</span>
            </h2>
            <p class="text-center text-slate-400 mb-16 max-w-xl mx-auto">Have a project in mind? Let's discuss and bring your ideas to life.</p>

            <div class="max-w-2xl mx-auto glass-card p-8 md:p-10">
                @if (session('success'))
                    <div class="bg-green-500/15 border border-green-500/30 text-green-400 p-4 rounded-xl mb-6 text-center text-sm font-medium">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Your Name</label>
                            <input type="text" name="name" class="form-input" placeholder="John Doe" value="{{ old('name') }}">
                            @error('name')
                                <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Your Email</label>
                            <input type="email" name="email" class="form-input" placeholder="john@example.com" value="{{ old('email') }}">
                            @error('email')
                                <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Your Message</label>
                        <textarea name="message" rows="5" class="form-input resize-none" placeholder="Hi, I'd love to work with you on...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn-primary w-full justify-center text-base py-3.5">
                        <span>Send Message</span>
                        <svg class="w-4 h-4 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </section>


    <!-- FOOTER -->
    <footer class="pt-16 pb-10 relative">
        <div class="max-w-6xl mx-auto px-6">
            <div class="footer-divider"></div>

            <div class="flex flex-col md:flex-row justify-between items-start gap-8">
                <!-- Brand -->
                <div>
                    <a href="#home" class="text-xl font-display font-bold gradient-text block mb-3">TechNabu</a>
                    @if ($personal)
                        <div class="space-y-1.5 text-sm text-slate-500">
                            @if ($personal->email)
                                <p class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    {{ $personal->email }}
                                </p>
                            @endif
                            @if ($personal->phone_number)
                                <p class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                    {{ $personal->phone_number }}
                                </p>
                            @endif
                            @if ($personal->location)
                                <p class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    {{ $personal->location }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                <!-- Nav links -->
                <div class="hidden md:block">
                    <p class="text-xs text-slate-600 font-semibold uppercase tracking-widest mb-4">Navigation</p>
                    <div class="grid grid-cols-2 gap-x-10 gap-y-2">
                        @foreach(['home'=>'Home','about'=>'About','services'=>'Services','projects'=>'Projects','education'=>'Education','skills'=>'Skills','contact'=>'Contact'] as $id => $label)
                        <a href="#{{ $id }}" class="text-sm text-slate-500 hover:text-indigo-400 transition-colors">{{ $label }}</a>
                        @endforeach
                    </div>
                </div>

                <!-- Social links -->
                <div>
                    <p class="text-xs text-slate-600 font-semibold uppercase tracking-widest mb-4">Connect</p>
                    <div class="flex gap-3">
                        @if ($personal && $personal->facebook_url)
                            <a href="{{ $personal->facebook_url }}" target="_blank"
                                class="w-10 h-10 rounded-xl bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-400 hover:text-indigo-400 hover:border-indigo-500/50 transition-all">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/></svg>
                            </a>
                        @endif
                        @if ($personal && $personal->instagram_url)
                            <a href="{{ $personal->instagram_url }}" target="_blank"
                                class="w-10 h-10 rounded-xl bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-400 hover:text-pink-400 hover:border-pink-500/50 transition-all">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                            </a>
                        @endif
                        @if ($personal && $personal->github_url)
                            <a href="{{ $personal->github_url }}" target="_blank"
                                class="w-10 h-10 rounded-xl bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-400 hover:text-white hover:border-slate-500 transition-all">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/></svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-10 pt-6 border-t border-slate-800/60 text-center">
                <p class="text-slate-600 text-sm">
                    © {{ date('Y') }} {{ $personal->brand_name ?? 'Nabaraj Acharya' }}. Crafted with passion.
                </p>
            </div>
        </div>
    </footer>


    <!-- POPUP MODAL -->
    <div id="popupModal" class="fixed inset-0 z-[9999] hidden items-center justify-center bg-black/70 backdrop-blur-md px-4">
        <div class="relative w-full max-w-md animate-zoomIn overflow-hidden rounded-2xl bg-card border border-indigo-500/20 shadow-2xl shadow-indigo-500/10">
            <button onclick="document.getElementById('popupModal').classList.add('hidden'); document.getElementById('popupModal').classList.remove('flex')"
                    class="absolute top-3 right-3 z-50 flex h-8 w-8 items-center justify-center rounded-full bg-slate-800 border border-slate-700 text-slate-400 hover:text-white hover:bg-red-600 hover:border-red-600 transition-all text-lg">
                ×
            </button>
            <a id="popupLink" href="#" target="_blank" class="block">
                <img id="popupImage" src="" alt="Offer" class="w-full h-auto object-cover">
            </a>
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-6 text-center">
                <h3 id="popupTitle" class="mb-3 text-lg font-display font-bold text-white">Special Offer!</h3>
                <a id="popupButton" href="#" target="_blank"
                    class="inline-block rounded-full bg-white px-8 py-2.5 text-sm font-bold text-indigo-600 shadow-lg transition-all hover:scale-105 hover:bg-indigo-50">
                    Claim Now
                </a>
            </div>
        </div>
    </div>


    <script>
        // ── Typing animation ──────────────────────────────────────────────
        const roles = ['Full-Stack Developer', 'Laravel Expert', 'UI/UX Enthusiast', 'Problem Solver'];
        let roleIndex = 0, charIndex = 0, isDeleting = false;
        const typedEl = document.getElementById('typed-text');

        function type() {
            const current = roles[roleIndex];
            typedEl.textContent = isDeleting ? current.slice(0, charIndex--) : current.slice(0, charIndex++);
            if (!isDeleting && charIndex > current.length) {
                setTimeout(() => { isDeleting = true; type(); }, 1800);
                return;
            }
            if (isDeleting && charIndex < 0) {
                isDeleting = false;
                roleIndex = (roleIndex + 1) % roles.length;
            }
            setTimeout(type, isDeleting ? 50 : 90);
        }
        type();

        // ── Scroll reveal ─────────────────────────────────────────────────
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    revealObserver.unobserve(entry.target);

                    if (entry.target.id === 'skills') {
                        document.querySelectorAll('.skill-bar-fill').forEach(bar => {
                            bar.style.width = bar.dataset.width;
                        });
                    }
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

        // ── Mobile menu ───────────────────────────────────────────────────
        const toggle = document.getElementById('mobile-toggle');
        const menu = document.getElementById('mobile-menu');
        const iconOpen = document.getElementById('icon-open');
        const iconClose = document.getElementById('icon-close');

        toggle.addEventListener('click', () => {
            menu.classList.toggle('open');
            iconOpen.classList.toggle('hidden');
            iconClose.classList.toggle('hidden');
        });

        document.querySelectorAll('.mobile-nav-link').forEach(link => {
            link.addEventListener('click', () => {
                menu.classList.remove('open');
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
            });
        });

        // ── Popup ─────────────────────────────────────────────────────────
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('popupModal');
            fetch('/api/popup')
                .then(r => r.json())
                .then(data => {
                    if (!data?.image) return;
                    document.getElementById('popupImage').src = data.image;
                    document.getElementById('popupTitle').textContent = data.title || 'Special Deal!';
                    const url = data.url || '#';
                    document.getElementById('popupLink').href = url;
                    document.getElementById('popupButton').href = url;
                    document.getElementById('popupButton').textContent = data.button_text || 'Claim Now';
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                })
                .catch(() => {});

            modal.addEventListener('click', e => {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }
            });
        });

        // ── Active nav highlight on scroll ───────────────────────────────
        const navLinks = document.querySelectorAll('.nav-link');
        const sections = document.querySelectorAll('section[id]');

        const navObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    navLinks.forEach(link => {
                        link.style.color = link.getAttribute('href') === '#' + entry.target.id ? '#e2e8f0' : '';
                    });
                }
            });
        }, { threshold: 0.5 });

        sections.forEach(s => navObserver.observe(s));
    </script>
</body>
</html>
