@extends('layouts.app')

@section('title', 'Common Laravel Performance Mistakes (And How to Fix Them)')
@section('description', 'The most common reasons a Laravel website feels slow — a step-by-step checklist of practical, beginner-friendly fixes for each one.')
@section('keywords', 'laravel performance, laravel developer nepal, website speed nepal, laravel optimization, nabaraj acharya')
@section('canonical', route('blog.laravel-performance-mistakes-nepal'))
@section('og_type', 'article')
@section('og_image', asset('storage/blogs/laravel-performance-mistakes.webp'))
@section('twitter_image', asset('storage/blogs/laravel-performance-mistakes.webp'))
@section('og_image_alt', 'Laravel performance optimization')

@section('schema')
@php
    $articleSchema = [
        '@context' => 'https://schema.org', '@type' => 'BlogPosting',
        'headline' => 'Common Laravel Performance Mistakes (And How to Fix Them)',
        'description' => 'The most common reasons a Laravel website feels slow, and practical fixes for each.',
        'image' => asset('storage/blogs/laravel-performance-mistakes.webp'),
        'author' => ['@type' => 'Person', 'name' => $personal->brand_name ?? 'Nabaraj Acharya'],
        'mainEntityOfPage' => route('blog.laravel-performance-mistakes-nepal'),
        'timeRequired' => 'PT6M',
    ];
    $faqs = [
        ['Why is my Laravel website slow?', 'The most common causes are unoptimized database queries (the N+1 problem), missing caching, and unoptimized images. Most slow Laravel sites have one or more of these issues.'],
        ['Does Laravel itself cause slow websites?', "No. Laravel is built for performance when used correctly. Slowness almost always comes from how the application code, database queries, and server are configured, not the framework itself."],
        ['How do I know what is making my site slow?', "Laravel has built-in tools like Laravel Debugbar and Telescope that show exactly which queries and processes are taking the most time on each page load."],
        ['Can hosting also cause performance issues?', 'Yes — underpowered shared hosting or a server in a distant region from your visitors can add noticeable delay regardless of how well the application code is written.'],
        ['Will fixing performance issues affect my SEO?', "Yes, positively. Page speed is part of Google's Core Web Vitals, which factor into search rankings, so performance fixes often improve both user experience and SEO together."],
        ['How often should I run a performance audit on my Laravel site?', "Every few months, or right after adding a major feature, is a reasonable cadence — performance tends to degrade gradually as a site grows rather than break suddenly."],
        ['Can I fix N+1 query problems without rewriting my whole app?', "Yes, in most cases eager loading with Laravel's with() method can be added incrementally to existing queries without restructuring the application."],
        ['Does adding more server resources fix a slow Laravel app?', "It can mask the symptom temporarily, but if the root cause is inefficient queries or missing caching, scaling up hosting just delays the problem rather than solving it."],
        ['What is the easiest performance win for a small site?', "Image optimization is usually the fastest, lowest-effort win — compressing and properly sizing images often produces a noticeable speed improvement with minimal code changes."],
        ["Should I use Redis or just Laravel's default file cache?", "File caching works fine for small sites, but Redis becomes worthwhile once you have meaningful traffic, since it's significantly faster and handles concurrent requests more efficiently."],
    ];
    $breadcrumbSchema = ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => route('blog.index')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Common Laravel Performance Mistakes', 'item' => route('blog.laravel-performance-mistakes-nepal')],
    ]];
@endphp
<script type="application/ld+json">{!! json_encode($articleSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')
<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">Common Laravel Performance Mistakes</h1>
        <div class="flex flex-wrap items-center justify-center gap-3 mb-4">
            <span class="skill-badge">Technical Guide</span>
            <span class="skill-badge">6 min read</span>
        </div>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a><span class="mx-1">&rsaquo;</span>
            <a href="{{ route('blog.index') }}" class="hover:underline">Blog</a><span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">Common Laravel Performance Mistakes</span>
        </p>
    </div>
</section>

<section class="py-10 md:py-14 reveal">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="mb-10 rounded-2xl overflow-hidden glass-card" style="padding:0;">
            <img src="{{ asset('storage/blogs/laravel-performance-mistakes.webp') }}" alt="Laravel performance optimization" class="w-full h-auto object-cover" loading="lazy">
        </div>

        <p class="text-lg leading-relaxed mb-8" style="color: var(--ink); border-left: 4px solid var(--accent); padding-left: 16px;">
            A slow website costs you visitors, conversions, and search rankings. Here are the most common reasons a Laravel site ends up slow, a checklist to diagnose your own site, and the practical fix for each issue.
        </p>

        <div class="post-content">
            <p>Laravel itself is fast. Almost every "slow Laravel site" I've reviewed turns out to be slow because of how it was built, not the framework. Here are the usual suspects, in order of how often I see them, along with what actually fixes each one.</p>

            <h2>1. The N+1 Query Problem</h2>
            <p>This is the single most common cause of slow Laravel applications. It happens when a page loads a list of records, then runs a separate database query for each item in that list — turning what should be 1 query into 100 or more. Laravel's <code>with()</code> method for eager loading relationships fixes this in most cases. If a page lists 50 blog posts and each one separately queries for its author, that's 51 queries where there should be 2.</p>

            <h2>2. No Caching for Repeated Data</h2>
            <p>If your homepage recalculates the same data — like featured products or settings — on every single page load, you're doing unnecessary database work for every visitor. Caching that data for a few minutes (or until it changes) removes a huge amount of repeated load. Laravel's built-in cache system makes this straightforward to add once you've identified what's being recalculated unnecessarily.</p>

            <h2>3. Unoptimized Images</h2>
            <p>This isn't a Laravel-specific issue, but it's one of the biggest real-world speed killers. A single unoptimized photo can be larger than an entire page's code. Compressing images and serving appropriately sized versions makes a noticeable difference almost immediately, especially on mobile connections where every extra megabyte costs real loading time.</p>

            <h2>4. Missing Database Indexes</h2>
            <p>As a database grows, queries that search or filter on columns without an index get progressively slower. This often doesn't show up in testing with a small amount of sample data, but becomes very noticeable once a site has real, growing data — which is exactly when it's hardest to diagnose without the right tools.</p>

            <h2>5. Loading More Than the Page Needs</h2>
            <p>Loading entire tables of data when a page only needs a handful of records, or pulling in large JavaScript libraries for a single small feature, both add weight that slows down the page without adding real value to the visitor. Pagination, lazy loading, and only selecting the specific database columns a page actually uses are all simple ways to cut this excess weight.</p>

            <h2>6. Not Using Queues for Slow Tasks</h2>
            <p>Sending an email, generating a report, or processing an uploaded file can take a few seconds — long enough that making a visitor wait for it during a normal page request feels slow, even if the rest of the page is fast. Laravel's queue system lets these slower tasks run in the background while the visitor gets an immediate response, which makes the site feel significantly faster without actually making the underlying task quicker.</p>

            <h2>How to Actually Find the Problem: A Step-by-Step Approach</h2>
            <ol>
                <li><strong>Install a diagnostic tool</strong> — Laravel Debugbar or Telescope, both free, show exactly what's happening on each page load.</li>
                <li><strong>Identify the slowest pages first</strong> — focus on pages with the most traffic or the most complaints, not every page at once.</li>
                <li><strong>Check the query count and time</strong> — an unusually high number of queries is almost always the N+1 problem.</li>
                <li><strong>Check for repeated, unchanging data</strong> — anything recalculated on every load is a caching opportunity.</li>
                <li><strong>Re-test after each fix</strong> — confirm the change actually improved load time before moving to the next issue.</li>
            </ol>

            <h2>Performance Checklist</h2>
            <ul>
                <li>Eager loading used wherever a list displays related data.</li>
                <li>Caching in place for data that doesn't change on every request.</li>
                <li>Images compressed and appropriately sized for where they're displayed.</li>
                <li>Database indexes added on columns used in search and filtering.</li>
                <li>No unnecessary large libraries loaded for small features.</li>
                <li>A diagnostic tool installed so future issues are easy to catch early.</li>
            </ul>

            <h2>How Often Should You Check Performance?</h2>
            <p>Performance isn't a one-time fix — it tends to degrade gradually as a site grows, more content gets added, and more features get layered on. A quick check every few months, or right after any major feature addition, catches problems while they're small and easy to isolate, rather than waiting until visitors start complaining or rankings start slipping.</p>

            <h2>When a Performance Problem Means a Bigger Architecture Issue</h2>
            <p>Most performance issues are isolated and fixable with the steps above. Occasionally, though, repeated performance problems point to a deeper architecture issue — a database structure that doesn't fit how the application actually uses data, for example. If the same type of problem keeps recurring across different parts of an application even after individual fixes, that's usually a sign the underlying structure needs a proper review rather than another quick patch.</p>

            <h2>Caching: The Quiet Performance Multiplier</h2>
            <p>Beyond fixing individual slow queries, properly configured caching often delivers the single biggest jump in perceived speed for the least ongoing effort — caching compiled configuration and routes in production, and caching expensive, repeatable data lookups so they aren't recalculated on every single request. It's easy to overlook during development, when traffic is low and the difference isn't noticeable, but the gap becomes very obvious once a site is handling real, concurrent production traffic.</p>

            <h2>Final Thoughts</h2>
            <p>Performance issues are almost always fixable without a rebuild — it's usually a handful of specific, identifiable problems rather than something fundamentally wrong with the application. If your site has been getting slower as it grows, this is exactly the kind of work I do under <a href="{{ route('services.software-engineering') }}">software engineering</a> and ongoing <a href="{{ route('services.website-support-maintenance') }}">website support</a>.</p>
        </div>

        @include('partials.services-faq', ['faqs' => $faqs])

        @if($otherPosts->isNotEmpty())
        <div class="mt-16 pt-10" style="border-top: 1px solid var(--line);">
            <h2 class="font-display text-2xl font-bold mb-6" style="color: var(--ink);">More Articles</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                @foreach($otherPosts->take(4) as $other)
                <a href="{{ route('blog.' . $other['slug']) }}" class="glass-card p-5 block">
                    <p class="text-xs font-semibold mb-2" style="color: var(--ink-faint);">{{ $other['date'] }} · {{ $other['reading_time'] }} min read</p>
                    <h3 class="font-display text-base font-bold" style="color: var(--ink);">{{ $other['title'] }}</h3>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

@include('partials.services-cta', ['heading' => 'Laravel'])
@endsection

@push('styles')
<style>
.post-content { color: var(--ink-dim); font-size: 1.05rem; line-height: 1.85; }
.post-content > * + * { margin-top: 1rem; }
.post-content h2, .post-content h3, .post-content h4 { font-family: 'Rajdhani', sans-serif; color: var(--ink); font-weight: 700; line-height: 1.3; margin-top: 1.8rem; margin-bottom: 0.7rem; }
.post-content h2 { font-size: 1.6rem; }
.post-content h3 { font-size: 1.25rem; }
.post-content p { margin: 0.9rem 0; }
.post-content ul, .post-content ol { margin: 1rem 0; padding-left: 1.4rem; }
.post-content ul { list-style: disc; }
.post-content ol { list-style: decimal; }
.post-content li { margin: 0.45rem 0; }
.post-content code { background: var(--bg-soft); color: var(--ink); border-radius: 6px; padding: 2px 6px; font-size: 0.92em; }
.post-content strong { color: var(--ink); font-weight: 700; }
.post-content a { color: var(--accent); text-decoration: underline; text-underline-offset: 3px; }
.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); }
@media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }
</style>
@endpush
