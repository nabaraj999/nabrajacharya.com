@extends('layouts.app')

@php
    $defaultTitle = 'Terms & Conditions | TechNabu';
    $defaultDescription = 'The terms that apply to using this website and engaging TechNabu (Nabaraj Acharya) for web development and SEO services.';
@endphp

@section('title', $seo->meta_title ?? $defaultTitle)
@section('description', $seo->meta_description ?? $defaultDescription)
@section('robots', 'index, follow')
@section('canonical', route('terms-conditions'))

@section('schema')
@php
    $pageSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'WebPage',
        'name' => 'Terms & Conditions',
        'description' => $defaultDescription,
        'url' => route('terms-conditions'),
    ];
    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Terms & Conditions', 'item' => route('terms-conditions')],
        ],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($pageSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')

<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">Terms &amp; Conditions</h1>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a><span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">Terms &amp; Conditions</span>
        </p>
    </div>
</section>

<section class="py-10 md:py-14 reveal">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <p class="text-sm mb-10" style="color: var(--ink-faint);">Last updated: {{ now()->format('F j, Y') }}</p>

        <div class="post-content">
            <p>These Terms &amp; Conditions govern your use of this website (nabrajacharya.com.np) and any services you engage {{ $personal->brand_name ?? 'Nabaraj Acharya' }}, trading as TechNabu ("I", "me", "TechNabu"), to provide. By using this site or engaging my services, you agree to these terms. This is a general overview written in plain language, not a substitute for a signed project agreement, which will always take precedence for any specific engagement.</p>

            <h2>1. About This Site &amp; Services Offered</h2>
            <p>TechNabu is the freelance web development and SEO practice of {{ $personal->brand_name ?? 'Nabaraj Acharya' }}, based in {{ $personal->location ?? 'Lalitpur, Nepal' }}. Services include web development, WordPress development, e-commerce development, API and app development, software engineering, website redesigns, domain and hosting setup, website support and maintenance, and SEO &amp; social media marketing, as described on the <a href="{{ route('services') }}">services page</a>.</p>

            <h2>2. Quotes &amp; Project Engagements</h2>
            <p>Prices shown on this site (including on individual service pages) are starting estimates for typical scopes of work, not fixed quotes. Every project begins with a conversation to understand your actual requirements, after which I provide a specific, written quote covering scope, price, and timeline. Work begins only once that quote — or a separate written agreement — is accepted by both parties.</p>

            <h2>3. Payment Terms</h2>
            <p>Unless otherwise agreed in writing for a specific project, payment is typically structured in stages (for example, a deposit to begin, a milestone payment, and a final payment at delivery) rather than entirely upfront or entirely on completion. Specific payment terms, amounts, and due dates are confirmed in the written quote or agreement for each project, not on this page.</p>

            <h2>4. Intellectual Property</h2>
            <p>Once a project is paid in full, you own the custom code, design, and content created specifically for that project, except for any pre-existing tools, libraries, frameworks, or reusable components I use to build it, which remain licensed for your use but not owned by you. Until full payment is received, all work remains the intellectual property of TechNabu.</p>
            <p>I retain the right to showcase completed projects (including screenshots and descriptions) in my own portfolio and marketing materials, unless we've specifically agreed otherwise in writing — for example, under an NDA.</p>

            <h2>5. Client Responsibilities</h2>
            <p>Timely project delivery depends on you providing necessary content, access, feedback, and approvals when requested. Delays in receiving these from your side may extend the agreed timeline accordingly.</p>

            <h2>6. Revisions &amp; Scope Changes</h2>
            <p>Each project quote typically includes a reasonable number of revision rounds within the agreed scope. Requests that go beyond the original scope — new features, significant design changes, or additional pages not originally discussed — are treated as a scope change and quoted separately before any extra work begins.</p>

            <h2>7. Website Content &amp; Use of This Site</h2>
            <p>The blog posts, portfolio descriptions, and other written content on this site are the property of TechNabu and may not be reproduced or republished elsewhere without permission, beyond normal fair use (such as quoting a short excerpt with a link back). You're welcome to share links to this site freely.</p>

            <h2>8. Third-Party Links</h2>
            <p>This site may link to external websites (client projects, social profiles, or referenced tools). I'm not responsible for the content, availability, or privacy practices of those external sites.</p>

            <h2>9. Limitation of Liability</h2>
            <p>Services are provided with reasonable skill and care, but I can't guarantee specific business outcomes (such as a particular search ranking, traffic figure, or conversion rate) since these depend on factors outside my direct control, including market conditions and decisions made by search engines and platforms. To the extent permitted by law, liability for any claim related to services provided is limited to the amount paid for the specific engagement in question.</p>

            <h2>10. Cancellation</h2>
            <p>Either party may cancel an ongoing project engagement with reasonable written notice. Work completed and time spent up to the cancellation date is payable; any deposit already paid for work not yet started may be discussed on a case-by-case basis.</p>

            <h2>11. Governing Law</h2>
            <p>These terms are governed by the laws of Nepal. Any dispute arising from these terms or a service engagement will first be approached through direct, good-faith discussion before any other course of action.</p>

            <h2>12. Changes to These Terms</h2>
            <p>These terms may be updated occasionally to reflect how the business actually operates. The "Last updated" date at the top of this page shows the most recent revision. Terms agreed in a signed project contract take precedence over this general page for that specific project.</p>

            <h2>13. Contact</h2>
            <p>Questions about these terms can be sent to <a href="mailto:{{ $personal->email ?? 'technabu2025@gmail.com' }}">{{ $personal->email ?? 'technabu2025@gmail.com' }}</a>, or via the <a href="{{ route('contact') }}">contact page</a>.</p>
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
