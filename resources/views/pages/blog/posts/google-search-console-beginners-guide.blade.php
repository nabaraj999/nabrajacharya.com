@extends('layouts.app')

@section('title', 'How to Use Google Search Console: A Beginner\'s Guide')
@section('description', 'A beginner-friendly, step-by-step walkthrough of Google Search Console — setup, the reports that actually matter, a monthly checklist, and how to use it to improve your SEO.')
@section('keywords', 'google search console guide, seo nepal, technical seo nepal, nabaraj acharya')
@section('canonical', route('blog.google-search-console-beginners-guide'))
@section('og_type', 'article')
@section('og_image', asset('storage/blogs/google-search-console-guide.webp'))
@section('twitter_image', asset('storage/blogs/google-search-console-guide.webp'))
@section('og_image_alt', 'Google Search Console guide')

@section('schema')
@php
    $articleSchema = [
        '@context' => 'https://schema.org', '@type' => 'BlogPosting',
        'headline' => "How to Use Google Search Console: A Beginner's Guide",
        'description' => 'A beginner-friendly walkthrough of Google Search Console.',
        'image' => asset('storage/blogs/google-search-console-guide.webp'),
        'author' => ['@type' => 'Person', 'name' => $personal->brand_name ?? 'Nabaraj Acharya'],
        'mainEntityOfPage' => route('blog.google-search-console-beginners-guide'),
        'timeRequired' => 'PT6M',
    ];
    $faqs = [
        ['Is Google Search Console free?', 'Yes, it is completely free and available to any website owner who can verify ownership of the site.'],
        ['How long until Search Console shows data?', 'Search performance data typically starts appearing within a few days, though it can take a few weeks to build up a useful amount of data for a new site.'],
        ['Do I need Search Console if I already have Google Analytics?', 'Yes — they show different things. Analytics focuses on visitor behavior once they arrive at your site; Search Console focuses specifically on how your site appears and performs in Google Search.'],
        ['What should I do if I see indexing errors?', 'Check the specific reason Google gives for each error, fix the underlying issue on the page, then use the URL inspection tool to request re-indexing once it is resolved.'],
        ['Can Search Console tell me why my rankings dropped?', 'It can point you toward clues — like a drop in impressions for specific pages or new indexing issues — but it will not give you a single definitive reason. It is a diagnostic starting point, not a complete explanation on its own.'],
        ['How often should I check Search Console?', "Once a month using a simple checklist is enough for most small businesses — checking daily usually just reacts to normal short-term fluctuations that aren't meaningful."],
        ['What does it mean if a page is "Crawled - currently not indexed"?', "It means Google has seen the page but chose not to add it to the index, often due to thin or duplicate content. Improving the page's content quality and requesting re-indexing usually resolves this."],
        ['Can I use Search Console for more than one website?', "Yes, you can add and manage multiple properties (websites) under a single Google Search Console account at no extra cost."],
        ["Does Search Console show my competitors' data?", "No, it only shows data for properties you've verified ownership of. It can't show you competitor search performance directly."],
        ['Is a high number of impressions but low clicks a bad sign?', "It usually means your page is appearing in search but the title or description isn't compelling enough to earn the click — a strong signal to improve your meta title and description for that page."],
    ];
    $breadcrumbSchema = ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => route('blog.index')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Google Search Console Beginner\'s Guide', 'item' => route('blog.google-search-console-beginners-guide')],
    ]];
@endphp
<script type="application/ld+json">{!! json_encode($articleSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')
<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">How to Use Google Search Console</h1>
        <div class="flex flex-wrap items-center justify-center gap-3 mb-4">
            <span class="skill-badge">Beginner's Guide</span>
            <span class="skill-badge">6 min read</span>
        </div>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a><span class="mx-1">&rsaquo;</span>
            <a href="{{ route('blog.index') }}" class="hover:underline">Blog</a><span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">Google Search Console Beginner's Guide</span>
        </p>
    </div>
</section>

<section class="py-10 md:py-14 reveal">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="mb-10 rounded-2xl overflow-hidden glass-card" style="padding:0;">
            <img src="{{ asset('storage/blogs/google-search-console-guide.webp') }}" alt="Google Search Console guide" class="w-full h-auto object-cover" loading="lazy">
        </div>

        <p class="text-lg leading-relaxed mb-8" style="color: var(--ink); border-left: 4px solid var(--accent); padding-left: 16px;">
            Google Search Console is free, and it's one of the most useful tools you can set up for your website — yet most small business owners never open it. Here's what it actually does, how to set it up, and a checklist for what to review regularly.
        </p>

        <div class="post-content">
            <p>Search Console isn't an analytics tool in the way Google Analytics is. It specifically shows you how Google sees and ranks your site — which is exactly the data you need to improve SEO. Once it's set up, it becomes one of the most useful free sources of truth about how your site is actually performing in search, rather than relying on guesswork about whether your SEO efforts are working.</p>

            <h2>What Search Console Actually Shows You</h2>
            <h3>Performance Report</h3>
            <p>This shows which search queries bring people to your site, how often your pages appear in search results, and how often people actually click. It's the most useful report for understanding what's working, and which queries you're appearing for but not capitalizing on.</p>

            <h3>Coverage / Indexing Report</h3>
            <p>This tells you which pages Google has actually indexed, and flags pages it couldn't index along with the reason. If a page isn't showing up in search at all, this is the first place to check why — a surprisingly common issue even on otherwise well-built sites.</p>

            <h3>Core Web Vitals Report</h3>
            <p>This shows how your site performs on real-world speed and stability metrics that Google factors into rankings — directly tied to how fast and smooth your site feels to visitors on actual devices, not just in a lab test.</p>

            <h3>Links Report</h3>
            <p>This shows which other sites link to yours, and which of your own pages link to each other internally. Strong internal linking helps both visitors and search engines understand how your content connects.</p>

            <h2>Setting It Up: Step by Step</h2>
            <ol>
                <li>Create a free Google Search Console account if you don't already have one.</li>
                <li>Add your website as a "property" within the account.</li>
                <li>Verify ownership — usually through a DNS record, an uploaded HTML file, or a meta tag in your site's code.</li>
                <li>Submit your XML sitemap so Google can find all your pages efficiently.</li>
                <li>Wait a few days to a couple of weeks for data to start populating.</li>
            </ol>

            <h2>Monthly Checklist</h2>
            <ul>
                <li>Check for new indexing errors that appeared since the last review.</li>
                <li>Look for queries with high impressions but low clicks — a sign your title or description needs improvement.</li>
                <li>Check Core Web Vitals for any pages that have moved into "poor" status.</li>
                <li>Compare this month's clicks and impressions to last month's to catch sudden drops early.</li>
                <li>Confirm your sitemap is still submitted and being read without errors.</li>
            </ul>

            <h2>What to Do When You Spot a Problem</h2>
            <p>If you see a sudden drop in clicks or impressions, first check whether it coincides with a recent site change — a redesign, a URL change, or a technical issue. If you see indexing errors, read the specific reason Google gives rather than guessing, fix the underlying cause, and use the URL inspection tool to request re-indexing once it's resolved.</p>

            <h2>Reading Performance Data the Right Way</h2>
            <p>A common beginner mistake is looking only at total clicks and treating every fluctuation as meaningful. Search traffic naturally varies week to week for reasons that have nothing to do with your site — seasonality, news events, even day-of-week patterns. The more useful habit is comparing trends over a few weeks or months rather than reacting to single-day swings, and paying closer attention to query-level and page-level data than to the single headline number at the top of the report.</p>

            <h2>Search Console vs Hiring an SEO Professional</h2>
            <p>Search Console gives you the raw data, but interpreting it correctly and turning it into a prioritized list of fixes takes some experience. A business owner checking it occasionally will catch the obvious issues; a professional reviewing it as part of an ongoing strategy will catch subtler patterns and act on them faster, which matters more as your site grows and the data becomes more complex to read at a glance.</p>

            <h2>Getting the Most Out of the URL Inspection Tool</h2>
            <p>The URL inspection tool deserves more attention than most beginners give it. Paste in any URL from your site and it tells you whether that exact page is indexed, when it was last crawled, and any issues found along the way. After publishing a new page, running it through this tool and requesting indexing manually can speed up how quickly it shows up in search, rather than waiting passively for Google to discover it on its own schedule.</p>

            <h2>Final Thoughts</h2>
            <p>Search Console won't fix anything by itself, but it tells you exactly where to focus — which is half the work of doing SEO well. Checking it regularly, even just once a month using the checklist above, puts you ahead of most small business websites that never look at it at all. I review this data as a standard part of every <a href="{{ route('services.seo-social-media-marketing') }}">SEO engagement</a> I run.</p>

            <h2>Mobile Usability: One More Report Worth Knowing</h2>
            <p>Search Console also flags mobile usability problems — text too small to read, clickable elements placed too close together, content wider than the screen. Since most search traffic now arrives on mobile devices, issues here have an outsized effect on both rankings and how visitors experience your site once they land on it.</p>
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

@include('partials.services-cta', ['heading' => 'SEO and marketing'])
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
.post-content a { color: var(--accent); text-decoration: underline; text-underline-offset: 3px; }
.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); }
@media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }
</style>
@endpush
