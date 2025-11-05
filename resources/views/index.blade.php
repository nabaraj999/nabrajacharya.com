<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('storage/icon/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700;900&display=swap" rel="stylesheet">

    <title>{{ $seo->meta_title ?? 'Nabaraj Acharya - Full-Stack Developer' }}</title>
    <meta name="description"
        content="{{ $seo->meta_description ?? 'Professional web developer in Nepal with expertise in creating stunning, functional websites and engaging content for local businesses.' }}">
    <meta name="keywords" content="{{ $seo->meta_keywords ?? 'web developer, full-stack, Laravel, Nepal, portfolio' }}">
    <meta name="author" content="{{ $personal->brand_name ?? 'Nabaraj Acharya' }}">
    <meta name="robots" content="{{ $seo->robots_directives ?? 'index, follow' }}">
    <meta name="language" content="English">
    <meta name="revisit-after" content="7 days">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ $seo->canonical_url ?? 'https://nabrajacharya.com.np' }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://nabrajacharya.com.np">
    <meta property="og:title" content="{{ $seo->og_title ?? 'Nabaraj Acharya Portfolio' }}">
    <meta property="og:description"
        content="{{ $seo->og_description ?? 'Professional web developer in Nepal with expertise in creating stunning, functional websites and engaging content for local businesses.' }}">
    <meta property="og:image" content="{{ Storage::url($personal->logo_url) }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="{{ $seo->og_site_name ?? 'Nabaraj Acharya Portfolio' }}">
    <meta property="og:locale" content="en_US">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://nabrajacharya.com.np">
    <meta property="twitter:title"
        content="{{ $seo->twitter_title ?? 'Nabaraj Acharya | Web Developer & Content Writer in Nepal' }}">
    <meta property="twitter:description"
        content="{{ $seo->twitter_description ?? 'Professional web developer and content writer in Nepal with expertise in creating stunning, functional websites and engaging content for local businesses.' }}">
    <meta property="twitter:image" content="{{ $seo->twitter_image ?? 'https://nabrajacharya.com.np/3.png' }}">

    <meta name="geo.region" content="NP-BA" />
    <meta name="geo.placename" content="Kathmandu" />
    <meta name="geo.position" content="27.7172;85.3240" />
    <meta name="ICBM" content="27.7172, 85.3240" />
    <script type="application/ld+json">
        {!! $seo->structured_data_json ?? '{
            "@context": "https://schema.org",
            "@type": "Person",
            "name": "Nabaraj Acharya",
            "url": "https://nabrajacharya.com.np",
            "sameAs": [
                "https://www.facebook.com/nabaraj.acharya.7",
                "https://www.linkedin.com/in/nabarajacharya/",
                "https://twitter.com/nabarajacharya"
            ],
            "jobTitle": "Full-Stack Developer",
            "worksFor": {
                "@type": "Organization",
                "name": "TechNabu"
            }
        }' !!}
    </script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        deepBlue: '#1e90ff',
                        richRed: '#ff4d4f',
                        darkBg: '#0f1724',
                        lightBg: '#f5f5f5',
                    },
                    fontFamily: {
                        primary: ['Raleway', 'Helvetica', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.7s ease-out',
                        'fill-bar': 'fillBar 1.5s ease-in-out forwards',
                        'menu-slide': 'menuSlide 0.3s ease-in-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            },
                        },
                        slideUp: {
                            '0%': {
                                transform: 'translateY(50px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            },
                        },
                        fillBar: {
                            '0%': {
                                width: '0%'
                            },
                            '100%': {
                                width: 'var(--width, 90%)'
                            },
                        },
                        menuSlide: {
                            '0%': {
                                transform: 'translateY(-100%)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            },
                        },
                    },
                }
            }
        }
    </script>
    <style type="text/css">
        /* Custom styles for animations and effects */
        .section-hidden {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.7s ease-out;
        }

        .section-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .skill-bar {
            --width: 0%;
            width: var(--width);
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -20px;
            top: 0;
            height: 100%;
            width: 2px;
            background: linear-gradient(to bottom, #1e90ff, #ff4d4f);
        }

        .timeline-item:first-child::before {
            top: 20px;
        }

        .timeline-item:last-child::before {
            height: 20px;
        }

        .timeline-dot {
            position: absolute;
            left: -26px;
            top: 20px;
            height: 12px;
            width: 12px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1e90ff, #ff4d4f);
            z-index: 10;
        }

        .project-card {
            transition: all 0.3s ease;
        }

        .project-overlay {
            opacity: 0;
            transition: all 0.3s ease;
        }

        .project-card:hover .project-overlay {
            opacity: 1;
        }

        .service-card {
            transition: all 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-10px0);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .deepseek-railway {
            height: 4px;
            background: linear-gradient(90deg, #1e90ff 0%, #ff4d4f 100%);
            position: relative;
            margin: 80px 0;
        }

        .deepseek-railway::before {
            content: '';
            position: absolute;
            top: -4px;
            left: 0;
            right: 0;
            height: 12px;
            background: repeating-linear-gradient(90deg,
                    transparent,
                    transparent 15px,
                    #0f1724 15px,
                    #0f1724 20px);
        }

        /* Focus states */
        input:focus,
        textarea:focus {
            box-shadow: 0 0 0 3px rgba(30, 144, 255, 0.3);
        }

        button:focus {
            box-shadow: 0 0 0 3px rgba(255, 77, 79, 0.3);
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        .education-image {
            width: 48px;
            height: 48px;
            max-width: 48px;
            max-height: 48px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 1rem;
        }

        /* Mobile menu styles */
        .mobile-menu {
            transition: all 0.3s ease-in-out;
        }

        .mobile-menu-hidden {
            transform: translateY(-100%);
            opacity: 0;
            visibility: hidden;
        }

        .mobile-menu-visible {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>

<body class="font-primary bg-lightBg text-darkBg">
    <!-- Header with sticky navigation -->
    <header class="fixed w-full bg-darkBg text-white z-50 shadow-md">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <a href="#"
                    class="text-3xl font-extrabold bg-gradient-to-r from-blue-600 via-purple-600 to-red-500 bg-clip-text text-transparent font-[Raleway] tracking-wide">
                    TechNabu
                </a>
                <div class="hidden md:flex space-x-8">
                    <a href="#home" class="hover:text-deepBlue transition-colors duration-300">Home</a>
                    <a href="#about" class="hover:text-deepBlue transition-colors duration-300">About</a>
                    <a href="#services" class="hover:text-deepBlue transition-colors duration-300">Services</a>
                    <a href="#projects" class="hover:text-deepBlue transition-colors duration-300">Projects</a>
                    <a href="#education" class="hover:text-deepBlue transition-colors duration-300">Education</a>
                    <a href="#skills" class="hover:text-deepBlue transition-colors duration-300">Skills</a>
                    <a href="#contact" class="hover:text-deepBlue transition-colors duration-300">Contact</a>
                </div>
                <button id="mobile-menu-toggle" class="md:hidden text-white focus:outline-none">
                    <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- Mobile Menu -->
            <div id="mobile-menu"
                class="mobile-menu mobile-menu-hidden md:hidden absolute top-full left-0 right-0 bg-darkBg shadow-lg">
                <div class="flex flex-col items-center space-y-4 py-6">
                    <a href="#home"
                        class="text-white hover:text-deepBlue transition-colors duration-300 text-lg">Home</a>
                    <a href="#about"
                        class="text-white hover:text-deepBlue transition-colors duration-300 text-lg">About</a>
                    <a href="#services"
                        class="text-white hover:text-deepBlue transition-colors duration-300 text-lg">Services</a>
                    <a href="#projects"
                        class="text-white hover:text-deepBlue transition-colors duration-300 text-lg">Projects</a>
                    <a href="#education"
                        class="text-white hover:text-deepBlue transition-colors duration-300 text-lg">Education</a>
                    <a href="#skills"
                        class="text-white hover:text-deepBlue transition-colors duration-300 text-lg">Skills</a>
                    <a href="#contact"
                        class="text-white hover:text-deepBlue transition-colors duration-300 text-lg">Contact</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="home" class="min-h-screen flex items-center pt-20 pb-16 bg-darkBg text-white">
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 mb-10 md:mb-0 animate-slide-up">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Hi, I'm <span
                        class="bg-gradient-to-r from-deepBlue to-richRed bg-clip-text text-transparent">{{ $personal->brand_name ?? 'Nabaraj Acharya' }}</span>
                </h1>
                <h2 class="text-2xl md:text-3xl mb-6">Full-Stack Developer</h2>
                <p class="text-lg mb-8 text-gray-300">
                    {{ $personal->description ?? 'I create stunning, functional websites to help businesses thrive in the digital landscape.' }}
                </p>
                <div class="flex space-x-4">
                    <a href="#projects"
                        class="px-6 py-3 bg-gradient-to-r from-deepBlue to-richRed text-white rounded-lg font-semibold transform hover:scale-105 transition-transform duration-300">View
                        Work</a>
                    <a href="#contact"
                        class="px-6 py-3 border-2 border-deepBlue text-deepBlue rounded-lg font-semibold transform hover:scale-105 transition-transform duration-300">Contact
                        Me</a>
                </div>
            </div>
            <div class="md:w-1/2 flex justify-center animate-fade-in">
                @if ($personal && $personal->profile_photo)
                    <div class="relative w-64 h-64  overflow-hidden border-4 border-deepBlue shadow-lg">
                        <img src="{{ Storage::url($personal->profile_photo) }}" alt="Profile Photo"
                            class="w-full h-full object-cover">
                    </div>
                @else
                    <div
                        class="relative w-64 h-64 rounded-full overflow-hidden border-4 border-deepBlue shadow-lg bg-gradient-to-br from-deepBlue to-richRed flex items-center justify-center">
                        <span class="text-white text-lg">No Photo Available</span>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- DeepSeek Railway Separator -->
    <div class="deepseek-railway"></div>

    <!-- About Section -->
    <section id="about" class="py-20 bg-lightBg section-hidden">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16 text-raleway">About Me</h2>

            <div class="flex flex-col md:flex-row items-center gap-10">
                <div class="md:w-1/3 mb-10 md:mb-0 flex justify-center">
                    <div class="relative w-56 h-56 md:w-72 md:h-72 rounded-2xl overflow-hidden shadow-xl">
                        @if ($personal && $personal->logo_url)
                            <img src="{{ Storage::url($personal->logo_url) }}" alt="About Me Photo"
                                class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-300 text-white text-lg">
                                No photo available
                            </div>
                        @endif
                    </div>
                </div>

                <div class="md:w-2/3 md:pl-10">
                    <p class="text-lg mb-12 leading-relaxed pb-4">{!! $personal->about_description ?? 'No description available.' !!}</p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                        <div
                            class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-lg transition-shadow duration-300">
                            <div class="text-3xl font-bold text-deepBlue mb-2">
                                {{ $personal->years_experience ?? 0 }}+</div>
                            <div class="text-gray-600">Years Experience</div>
                        </div>
                        <div
                            class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-lg transition-shadow duration-300">
                            <div class="text-3xl font-bold text-richRed mb-2">
                                {{ $personal->completed_projects ?? 0 }}+</div>
                            <div class="text-gray-600">Projects Completed</div>
                        </div>
                        <div
                            class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-lg transition-shadow duration-300">
                            <div
                                class="text-3xl font-bold bg-gradient-to-r from-deepBlue to-richRed bg-clip-text text-transparent mb-2">
                                {{ $personal->happy_clients ?? 0 }}+</div>
                            <div class="text-gray-600">Happy Clients</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DeepSeek Railway Separator -->
    <div class="deepseek-railway"></div>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-white section-hidden">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 text-Raleway">My Services</h2>
            <p class="text-center text-gray-600 mb-16 max-w-2xl mx-auto">I offer a range of services to help bring your
                digital ideas to life with quality and precision.</p>

            @if ($services->isEmpty())
                <p class="text-center text-gray-600">No services available at the moment.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($services as $service)
                        <div class="service-card bg-lightBg p-8 rounded-xl relative group">
                            <div class="w-full h-48 rounded-lg overflow-hidden mb-6">
                                <div class="w-full h-full bg-blue-100 flex items-center justify-center"
                                    style="background-image: url('{{ $service->photo ? asset('storage/' . $service->photo) : '' }}'); background-size: cover; background-position: center;">
                                    @if (!$service->photo)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-deepBlue"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                        </svg>
                                    @endif
                                </div>
                            </div>
                            <h3 class="text-xl font-semibold mb-4">{{ $service->service_name }}</h3>
                            <div
                                class="absolute inset-0 bg-blue-900 bg-opacity-0 group-hover:bg-opacity-90 text-white p-6 rounded-xl flex flex-col justify-center items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <p class="text-center">{!! $service->description !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- DeepSeek Railway Separator -->
    <div class="deepseek-railway"></div>

    <!-- Projects Section -->
    <section id="projects" class="py-20 bg-darkBg text-white section-hidden">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4">My Projects</h2>
            <p class="text-center text-gray-400 mb-16 max-w-2xl mx-auto">Here are some of the projects I've worked on
                that demonstrate my skills and expertise.</p>

            @if ($projects->isEmpty())
                <p class="text-center text-gray-400">No projects available at the moment.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($projects as $project)
                        <div class="project-card rounded-xl overflow-hidden shadow-lg relative group">
                            <div class="h-56 bg-gradient-to-br from-deepBlue to-richRed flex items-center justify-center"
                                style="background-image: url('{{ $project->image_url ? asset('storage/' . $project->image_url) : '' }}'); background-size: cover; background-position: center;">
                                @if (!$project->image_url)
                                    <span class="text-white text-lg">No Image Available</span>
                                @endif
                            </div>
                            <div
                                class="project-overlay absolute inset-0 bg-gradient-to-t from-darkBg to-transparent p-6 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-between">
                                <div class="flex justify-end">
                                    @if ($project->project_url)
                                        <a href="{{ $project->project_url }}" target="_blank"
                                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors duration-200">View
                                            Live</a>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold mb-2">{{ $project->title }}</h3>
                                    <p class="text-gray-300 mb-4">{!! $project->description !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- DeepSeek Railway Separator -->
    <div class="deepseek-railway"></div>

    <!-- Education Section -->
    <section id="education" class="py-20 bg-lightBg section-hidden">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16">Education & Experience</h2>

            @if ($education->isEmpty())
                <p class="text-center text-gray-600">No education records available.</p>
            @else
                <div class="max-w-3xl mx-auto relative">
                    @foreach ($education as $edu)
                        <div class="timeline-item pl-8 relative mb-12">
                            <div class="timeline-dot"></div>
                            <div class="bg-white p-6 rounded-xl shadow-md flex items-start">
                                @if ($edu->image_url)
                                    <img src="{{ Storage::url($edu->image_url) }}" alt="{{ $edu->degree }} image"
                                        class="education-image">
                                @endif
                                <div class="flex-1">
                                    <div
                                        class="text-sm bg-gradient-to-r from-deepBlue to-richRed bg-clip-text text-transparent font-semibold mb-2">
                                        {{ $edu->start_year }} -
                                        {{ $edu->end_year ?? ($edu->status === 'in_progress' ? 'Present' : '') }}
                                    </div>
                                    <h3 class="text-xl font-bold mb-2">{{ $edu->degree }}</h3>
                                    <p class="text-gray-600 font-semibold mb-4">{{ $edu->institution }}</p>
                                    @if ($edu->description)
                                        <p class="text-gray-600">{{ $edu->description }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- DeepSeek Railway Separator -->
    <div class="deepseek-railway"></div>

    <!-- Skills Section -->
    <section id="skills" class="py-20 bg-white section-hidden">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16">My Skills</h2>

            @if ($skills->isEmpty())
                <p class="text-center text-gray-600">No skills listed yet.</p>
            @else
                <div class="max-w-3xl mx-auto">
                    @foreach ($skills as $skill)
                        <div class="mb-8">
                            <div class="flex justify-between mb-2">
                                <span class="font-semibold">{{ $skill->skill_name }}</span>
                                <span class="text-deepBlue font-semibold">{{ $skill->proficiency }}%</span>
                            </div>
                            <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                <div class="skill-bar h-full bg-gradient-to-r from-deepBlue to-richRed"
                                    style="--width: {{ $skill->proficiency }}%"
                                    data-width="{{ $skill->proficiency }}%">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- DeepSeek Railway Separator -->
    <div class="deepseek-railway"></div>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-darkBg text-white section-hidden">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-4">Get In Touch</h2>
            <p class="text-center text-gray-400 mb-16 max-w-2xl mx-auto">Have a project in mind or want to discuss
                potential opportunities? Feel free to reach out!</p>

            <div class="max-w-2xl mx-auto">
                @if (session('success'))
                    <div class="bg-green-600 text-white p-4 rounded-lg mb-6 text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block mb-2">Your Name</label>
                            <input type="text" id="name" name="name"
                                class="w-full px-4 py-3 bg-gray-800 rounded-lg focus:outline-none focus:ring-2 focus:ring-deepBlue transition-all"
                                placeholder="John Doe" value="{{ old('name') }}">
                            @error('name')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block mb-2">Your Email</label>
                            <input type="email" id="email" name="email"
                                class="w-full px-4 py-3 bg-gray-800 rounded-lg focus:outline-none focus:ring-2 focus:ring-deepBlue transition-all"
                                placeholder="john@example.com" value="{{ old('email') }}">
                            @error('email')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="message" class="block mb-2">Your Message</label>
                        <textarea id="message" name="message" rows="5"
                            class="w-full px-4 py-3 bg-gray-800 rounded-lg focus:outline-none focus:ring-2 focus:ring-deepBlue transition-all"
                            placeholder="Hello, I would like to...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full py-3 bg-gradient-to-r from-deepBlue to-richRed text-white font-semibold rounded-lg transform hover:scale-105 transition-transform duration-300 focus:outline-none focus:ring-2 focus:ring-richRed">Send
                        Message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-10 bg-darkBg text-white border-t border-gray-800">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <!-- User Info (Left Side) -->
                <div class="text-left">
                    @if ($personal)
                        <p class="mb-2"><strong>Email:</strong> {{ $personal->email ?? 'Not provided' }}</p>
                        <p class="mb-2"><strong>Phone:</strong>
                            {{ $personal->phone_number ?? 'Not provided' }}</p>
                        <p class="mb-2"><strong>Location:</strong>
                            {{ $personal->location ?? 'Not provided' }}</p>
                        @if ($personal->description)
                            <p class="mb-2">{{ $personal->description }}</p>
                        @endif
                    @else
                        <p>No user information available.</p>
                    @endif
                </div>

                <!-- Copyright (Center) -->
                <div class="text-center">
                    <p>© {{ date('Y') }} {{ $personal->brand_name ?? 'Developer Portfolio' }}. All rights
                        reserved.</p>
                </div>

                <!-- Social Media Links (Right Side) -->
                <div class="flex justify-center md:justify-end space-x-6 mt-4 md:mt-0">
                    @if ($personal && $personal->facebook_url)
                        <a href="{{ $personal->facebook_url }}" target="_blank"
                            class="text-gray-400 hover:text-deepBlue transition-colors duration-300">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif
                    @if ($personal && $personal->instagram_url)
                        <a href="{{ $personal->instagram_url }}" target="_blank"
                            class="text-gray-400 hover:text-richRed transition-colors duration-300">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                    @endif
                    @if ($personal && $personal->github_url)
                        <a href="{{ $personal->github_url }}" target="_blank"
                            class="text-gray-400 hover:text-deepBlue transition-colors duration-300">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Intersection Observer for scroll animations
        const sections = document.querySelectorAll('.section-hidden');

        const sectionObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('section-visible');
                    sectionObserver.unobserve(entry.target);

                    // Animate skill bars when skills section is in view
                    if (entry.target.id === 'skills') {
                        const skillBars = document.querySelectorAll('.skill-bar');
                        skillBars.forEach(bar => {
                            bar.style.animation = 'fill-bar 1.5s ease-in-out forwards';
                        });
                    }
                }
            });
        }, {
            threshold: 0.1
        });

        sections.forEach(section => {
            sectionObserver.observe(section);
        });

        // Mobile menu toggle
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        mobileMenuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('mobile-menu-hidden');
            mobileMenu.classList.toggle('mobile-menu-visible');
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');

            // Close menu when a link is clicked
            const menuLinks = mobileMenu.querySelectorAll('a');
            menuLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('mobile-menu-hidden');
                    mobileMenu.classList.remove('mobile-menu-visible');
                    menuIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                });
            });
        });
    </script>
</body>

</html>
