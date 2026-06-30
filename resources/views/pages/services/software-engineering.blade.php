@extends('layouts.app')

@section('title', 'Software Engineering Services in Nepal | ' . ($personal->brand_name ?? 'Nabaraj Acharya'))
@section('description', 'Robust, well-architected custom software systems — clean backend logic, solid database design, and maintainable code built to scale.')
@section('keywords', 'software engineer nepal, custom software development nepal, backend developer nepal, nabaraj acharya')
@section('canonical', route('services.software-engineering'))
@if($service->photo)
@section('og_image', asset('storage/'.$service->photo))
@section('twitter_image', asset('storage/'.$service->photo))
@section('og_image_alt', $service->service_name . ' in Nepal — ' . ($personal->brand_name ?? 'Nabaraj Acharya'))
@endif

@section('schema')
@php
    $serviceSchema = [
        '@context' => 'https://schema.org', '@type' => 'Service', 'name' => 'Software Engineering',
        'provider' => ['@type' => 'Person', 'name' => $personal->brand_name ?? 'Nabaraj Acharya', 'url' => route('home')],
        'areaServed' => [['@type' => 'Country', 'name' => 'Nepal']],
        'url' => route('services.software-engineering'),
        'description' => 'Custom software systems built with clean architecture for businesses in Nepal.',
    ];
    $breadcrumbSchema = ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Software Engineering', 'item' => route('services.software-engineering')],
    ]];
@endphp
<script type="application/ld+json">{!! json_encode($serviceSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')

<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">Software Engineering</h1>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a><span class="mx-1">&rsaquo;</span>
            <a href="{{ route('services') }}" class="hover:underline">Services</a><span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">Software Engineering</span>
        </p>
    </div>
</section>

@include('partials.services-hero-image')

<section class="py-12 md:py-16 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2">
                <p class="text-base md:text-lg leading-relaxed mb-8" style="color: var(--ink-dim);">
                    I design and build robust, well-architected software systems — clean backend logic, solid database design, and maintainable code structured to scale with your business, not just survive launch day.
                </p>

                @php $quickAnswer = 'Software engineering is the disciplined design and development of reliable, maintainable software systems, not just writing code, but architecting it to last. I build custom backend systems, dashboards, and business tools using Laravel with clean, scalable architecture.'; @endphp
                @include('partials.services-quick-answer')

                @if($personal && ($personal->years_experience || $personal->completed_projects))
                <div class="flex flex-wrap gap-3 mb-12">
                    @if($personal->years_experience)<span class="skill-badge !text-sm !py-2 !px-4"><strong style="color:var(--ink);">{{ $personal->years_experience }}+</strong>&nbsp;years experience</span>@endif
                    @if($personal->completed_projects)<span class="skill-badge !text-sm !py-2 !px-4"><strong style="color:var(--ink);">{{ $personal->completed_projects }}+</strong>&nbsp;projects delivered</span>@endif
                    <span class="skill-badge !text-sm !py-2 !px-4">Clean <strong style="color:var(--ink);">Architecture</strong></span>
                </div>
                @endif

                <h2 class="font-display text-2xl font-bold mb-6" style="color: var(--ink);">What's Included</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-12">
                    @foreach([
                        ['Clean Architecture', 'Code organised into clear layers so it stays easy to change as requirements evolve.'],
                        ['Database Design', 'Schemas planned around your actual data, not bolted on after the fact.'],
                        ['Maintainable Code', 'Readable, documented code that another developer could pick up without guesswork.'],
                        ['Scalable Systems', 'Built to handle more users and data without a rewrite down the line.'],
                    ] as [$title, $desc])
                    <div class="glass-card p-6">
                        <h3 class="font-display text-base font-bold mb-1.5" style="color: var(--ink);">{{ $title }}</h3>
                        <p class="text-sm leading-relaxed" style="color: var(--ink-dim);">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>

                @php
                    $packagesTitle = 'Software Engineering Packages';
                    $packages = [
                        [
                            'name' => 'Internal Tool / Dashboard',
                            'tagline' => 'A focused dashboard or reporting tool',
                            'price' => 'NPR 1,00,000 – 2,00,000',
                            'priceNote' => 'one-time',
                            'bullets' => [
                                'Custom dashboard built around your data',
                                'Admin panel with role-based access',
                                'Database design',
                                'Basic reporting & exports',
                            ],
                        ],
                        [
                            'name' => 'Workflow Automation System',
                            'tagline' => 'Replace manual processes with a real system',
                            'price' => 'NPR 2,00,000 – 4,00,000',
                            'priceNote' => 'one-time',
                            'featured' => true,
                            'bullets' => [
                                'Everything in Internal Tool / Dashboard',
                                'Automated workflows & scheduled jobs',
                                'Notifications & approval flows',
                                'Integration with existing systems',
                            ],
                        ],
                        [
                            'name' => 'Multi-Tenant Platform',
                            'tagline' => 'A product serving multiple clients from one codebase',
                            'price' => 'NPR 4,50,000+',
                            'priceNote' => 'one-time, scoped per project',
                            'bullets' => [
                                'Everything in Workflow Automation System',
                                'Scoped, multi-tenant database design',
                                'Per-client configuration & permissions',
                                'Ongoing support available',
                            ],
                        ],
                    ];
                @endphp
                @include('partials.services-packages')

                @php
                    $tableTitle = "What Kind of Systems Do I Build?";
                    $tableRows = [
                        ['Business Dashboards', 'Teams needing visibility into their own data', 'Laravel, MySQL, reporting'],
                        ['Workflow & Automation Tools', 'Companies replacing manual spreadsheets or processes', 'Laravel, queues, scheduled jobs'],
                        ['Internal Admin Panels', 'Teams managing content, users, or operations', 'Laravel, Filament'],
                        ['Multi-Tenant Systems', 'Products serving multiple clients from one codebase', 'Laravel, scoped database design'],
                    ];
                @endphp
                @include('partials.services-table')

                @include('partials.services-why-me')

                @php
                    $faqs = [
                        ["What's the difference between this and \"web development\"?", 'Software engineering here focuses on backend systems and business logic — dashboards, automation, internal tools — rather than public-facing marketing sites.'],
                        ['Can you take over an existing codebase?', 'Yes, I can review, document, and continue building on an existing Laravel/PHP codebase.'],
                        ['Do you write tests for the code?', 'Yes, where it adds real value — particularly for business-critical logic.'],
                        ['How do you handle scope changes mid-project?', 'We discuss the impact on timeline and cost before any change is implemented, so there are no surprises.'],
                        ['Can you document an existing system that has no documentation?', "Yes, I regularly review undocumented codebases and produce clear technical documentation covering architecture, data flow, and key business logic."],
                        ['What if my team needs to maintain the system after you build it?', "I write code with future maintainers in mind — clear structure, naming, and comments where logic isn't obvious — and can provide a handover walkthrough for your team."],
                        ['Do you only work with Laravel, or other backend frameworks too?', "Laravel and PHP are my core focus, where I can move fastest and guarantee quality. For projects requiring a different stack, we can discuss whether it's the right fit."],
                        ['Can you integrate with our existing database instead of building a new one?', "Yes, I can work with an existing database schema, though I'll flag any structural issues that could cause problems as the system grows."],
                        ['How do you ensure the system can handle business growth?', "Through deliberate architecture decisions early on — proper indexing, queue-based processing for heavy tasks, and avoiding tightly-coupled code that becomes expensive to change later."],
                        ['What does the development process look like?', "Typically: requirements and data modeling first, then iterative development with regular check-ins, followed by testing and a staged rollout rather than a single risky launch."],
                        ['Can you build automation to replace manual spreadsheet work?', "Yes, this is one of the most common requests — replacing error-prone manual processes with a proper system that handles calculations, approvals, and reporting automatically."],
                        ['Is the source code mine after the project is complete?', "Yes, you own the full source code and have complete access to the repository once the engagement is complete."],
                    ];
                @endphp
                @include('partials.services-faq')

                <a href="{{ route('contact') }}" class="btn-primary" data-magnetic data-cursor="link">
                    Discuss Your Project
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
            </div>

            @include('partials.services-sidebar')
        </div>
    </div>
</section>

@include('partials.services-cta', ['heading' => 'software'])

@endsection

@push('styles')
<style>.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); } @media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }</style>
@endpush
