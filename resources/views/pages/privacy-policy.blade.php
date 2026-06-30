@extends('layouts.app')

@php
    $defaultTitle = 'Privacy Policy | TechNabu';
    $defaultDescription = 'How TechNabu (Nabaraj Acharya) collects, uses, and protects information submitted through this website\'s contact, testimonial, and blog comment forms.';
@endphp

@section('title', $seo->meta_title ?? $defaultTitle)
@section('description', $seo->meta_description ?? $defaultDescription)
@section('robots', 'index, follow')
@section('canonical', route('privacy-policy'))

@section('schema')
@php
    $pageSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'WebPage',
        'name' => 'Privacy Policy',
        'description' => $defaultDescription,
        'url' => route('privacy-policy'),
    ];
    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Privacy Policy', 'item' => route('privacy-policy')],
        ],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($pageSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')

<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">Privacy Policy</h1>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a><span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">Privacy Policy</span>
        </p>
    </div>
</section>

<section class="py-10 md:py-14 reveal">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <p class="text-sm mb-10" style="color: var(--ink-faint);">Last updated: {{ now()->format('F j, Y') }}</p>

        <div class="post-content">
            <p>This Privacy Policy explains what information {{ $personal->brand_name ?? 'Nabaraj Acharya' }}, trading as TechNabu ("I", "me", "TechNabu"), collects through this website (nabrajacharya.com.np), how it's used, and the choices you have. This site is operated as an individual freelance practice, not a registered company with a dedicated legal or privacy team — if anything here is unclear, the simplest way to get an answer is to ask directly via the contact details below.</p>

            <h2>1. Information I Collect</h2>
            <p>I only collect information you actively choose to submit through a form on this site. I do not run advertising trackers, and this site does not currently use third-party analytics tracking on visitors.</p>

            <h3>Contact Form</h3>
            <p>When you use the <a href="{{ route('contact') }}">contact page</a>, I collect your name, email address, and the message you write. This is used solely to respond to your enquiry and is not added to any marketing list without your separate, explicit consent.</p>

            <h3>Testimonial Submissions</h3>
            <p>If you submit a testimonial, I collect your name, email address, company name, role, an optional photo, a star rating, and your written feedback. Submitted testimonials are reviewed before publication; nothing is published automatically. Your email address is never displayed publicly.</p>

            <h3>Blog Comments</h3>
            <p>If blog comments are enabled, I collect the name, email address, optional website URL, and comment text you provide. Comments are reviewed before they appear publicly. Your email address is never displayed publicly.</p>

            <h3>Automatically Collected Data</h3>
            <p>Like most websites, the server that hosts this site may log standard technical data (such as IP address, browser type, and pages visited) for security and troubleshooting purposes. This site uses a session cookie and a CSRF (security) cookie that are required for forms to function correctly — these are functional, not tracking, cookies.</p>

            <h2>2. How I Use Your Information</h2>
            <ul>
                <li>To respond to enquiries submitted through the contact form.</li>
                <li>To review, and where approved, publish testimonials and blog comments.</li>
                <li>To maintain the security and proper functioning of this website.</li>
                <li>To keep records of client communication for ongoing or past projects.</li>
            </ul>
            <p>I do not sell, rent, or trade your personal information to third parties.</p>

            <h2>3. Third-Party Services</h2>
            <p>This site loads some resources from third-party providers as part of normal operation, which may receive your IP address as a standard part of serving that resource:</p>
            <ul>
                <li><strong>Google Fonts</strong> — for the typefaces used across the site.</li>
                <li><strong>Tailwind CSS (CDN)</strong> and <strong>jsDelivr</strong> (for Lenis and GSAP animation libraries) — for styling and page animations.</li>
            </ul>
            <p>These providers operate under their own privacy policies, which I'd encourage you to review if you have concerns about how they individually handle data.</p>

            <h2>4. Data Retention</h2>
            <p>Contact form submissions and project-related communication are kept for as long as reasonably needed to manage the relevant enquiry or project, and for basic business record-keeping afterward. Testimonial and comment submissions that are not approved for publication may be deleted periodically.</p>

            <h2>5. Your Rights</h2>
            <p>You can ask at any time to:</p>
            <ul>
                <li>See what information I hold about you.</li>
                <li>Have inaccurate information corrected.</li>
                <li>Have your information deleted, where I'm not required to keep it for a legitimate business or legal reason.</li>
                <li>Withdraw consent for a previously submitted testimonial or comment, which I will remove from public display.</li>
            </ul>
            <p>To make any of these requests, email <a href="mailto:{{ $personal->email ?? 'technabu2025@gmail.com' }}">{{ $personal->email ?? 'technabu2025@gmail.com' }}</a>.</p>

            <h2>6. Children's Privacy</h2>
            <p>This website and its services are intended for businesses and individuals capable of entering into a service agreement. I do not knowingly collect information from children.</p>

            <h2>7. Changes to This Policy</h2>
            <p>I may update this policy occasionally as the site or services change. The "Last updated" date at the top of this page reflects the most recent revision. Continued use of the site after a change means you accept the updated policy.</p>

            <h2>8. Contact</h2>
            <p>Questions about this policy or how your information is handled can be sent to <a href="mailto:{{ $personal->email ?? 'technabu2025@gmail.com' }}">{{ $personal->email ?? 'technabu2025@gmail.com' }}</a>{{ $personal->location ? ', or by post to ' . $personal->location . ', Nepal' : '' }}.</p>
        </div>
    </div>
</section>

@include('partials.services-cta', ['heading' => 'next project'])
@endsection

@push('styles')
<style>
.post-content { color: var(--ink-dim); font-size: 1.05rem; line-height: 1.85; }
.post-content > * + * { margin-top: 1rem; }
.post-content h2, .post-content h3 { font-family: 'Rajdhani', sans-serif; color: var(--ink); font-weight: 700; line-height: 1.3; margin-top: 1.8rem; margin-bottom: 0.7rem; }
.post-content h2 { font-size: 1.6rem; }
.post-content h3 { font-size: 1.25rem; }
.post-content p { margin: 0.9rem 0; }
.post-content ul { margin: 1rem 0; padding-left: 1.4rem; list-style: disc; }
.post-content li { margin: 0.45rem 0; }
.post-content strong { color: var(--ink); font-weight: 700; }
.post-content a { color: var(--accent); text-decoration: underline; text-underline-offset: 3px; }
.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); }
@media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }
</style>
@endpush
