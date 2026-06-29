@extends('layouts.app')

@section('title', 'How to Fix Git Ignoring Your .gitignore File | TechNabu Blog')
@section('description', 'A complete debugging guide for when Git keeps tracking files that should be ignored — the most common cause, and the exact commands to fix it.')
@section('keywords', 'git ignoring gitignore file, fix gitignore not working, git tutorial, web developer nepal, nabaraj acharya')
@section('canonical', route('blog.git-ignoring-gitignore-file-fix'))
@section('og_type', 'article')

@section('schema')
@php
    $articleSchema = [
        '@context' => 'https://schema.org', '@type' => 'BlogPosting',
        'headline' => 'How to Fix Git Ignoring Your .gitignore File',
        'description' => 'A debugging guide for when Git keeps tracking files that should be ignored.',
        'author' => ['@type' => 'Person', 'name' => $personal->brand_name ?? 'Nabaraj Acharya'],
        'mainEntityOfPage' => route('blog.git-ignoring-gitignore-file-fix'),
        'timeRequired' => 'PT4M',
    ];
    $faqSchema = [
        '@context' => 'https://schema.org', '@type' => 'FAQPage',
        'mainEntity' => [
            ['@type' => 'Question', 'name' => 'Why does .gitignore not work even though the file is listed in it?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'The most common reason is that the file was already committed to Git before it was added to .gitignore. Once Git is tracking a file, listing it in .gitignore does not automatically untrack it.']],
            ['@type' => 'Question', 'name' => 'Is it safe to run git rm -r --cached .?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes — it only removes files from Git tracking, not from your actual disk. Your files stay exactly where they are; only the next commit reflects the updated tracking list.']],
            ['@type' => 'Question', 'name' => 'Will this delete my files?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'No. This process only changes what Git tracks in version control. The files themselves remain untouched on your computer.']],
        ],
    ];
    $breadcrumbSchema = ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => route('blog.index')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'How to Fix Git Ignoring Your .gitignore File', 'item' => route('blog.git-ignoring-gitignore-file-fix')],
    ]];
@endphp
<script type="application/ld+json">{!! json_encode($articleSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($faqSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')
<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">How to Fix Git Ignoring Your .gitignore File</h1>
        <div class="flex flex-wrap items-center justify-center gap-3 mb-4">
            <span class="skill-badge">Debug Guide</span>
            <span class="skill-badge">4 min read</span>
        </div>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a><span class="mx-1">&rsaquo;</span>
            <a href="{{ route('blog.index') }}" class="hover:underline">Blog</a><span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">How to Fix Git Ignoring Your .gitignore File</span>
        </p>
    </div>
</section>

<section class="py-10 md:py-14 reveal">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <p class="text-lg leading-relaxed mb-8" style="color: var(--ink); border-left: 4px solid var(--accent); padding-left: 16px;">
            You added a file to .gitignore, but Git is still tracking it. This is one of the most common Git confusions — and the fix takes about thirty seconds once you know the cause.
        </p>

        <div class="post-content">
            <p>This almost always comes down to one thing: <strong>.gitignore only stops Git from tracking new files — it has no effect on files Git is already tracking.</strong> If the file was committed even once before it was added to .gitignore, Git will keep tracking it regardless of what the file now says.</p>

            <h2>How to Confirm This Is Your Issue</h2>
            <p>Run <code>git status</code>. If a file listed in .gitignore still shows up as modified or staged, it's already tracked. That confirms the cause.</p>

            <h2>The Fix</h2>
            <p>You need to remove the file from Git's tracking (without deleting it from your disk), then re-add everything so .gitignore can take effect properly:</p>
            <pre><code>git rm -r --cached .
git add .
git commit -m "Apply .gitignore properly"</code></pre>
            <p><code>git rm -r --cached .</code> untracks everything in the repository without touching your actual files. The following <code>git add .</code> then re-adds everything — except now, anything matching .gitignore is correctly skipped.</p>

            <h2>For a Single File Instead of Everything</h2>
            <p>If you only need to untrack one specific file rather than resetting the whole repository:</p>
            <pre><code>git rm --cached path/to/file
git commit -m "Stop tracking file"</code></pre>

            <h2>Common Mistakes That Cause This</h2>
            <ul>
                <li>Adding .gitignore after the initial commit, once files were already tracked.</li>
                <li>Typos in the .gitignore pattern — file paths are case-sensitive and pattern-sensitive.</li>
                <li>Using a global .gitignore that conflicts with the project-level one.</li>
            </ul>

            <h2>Final Thoughts</h2>
            <p>This is one of those issues that looks confusing the first time and completely obvious afterward. Once you know Git only respects .gitignore for files it isn't tracking yet, the fix is quick and safe to run any time.</p>

            <h2>FAQs</h2>
            <h3>Why does .gitignore not work even though the file is listed in it?</h3>
            <p>The most common reason is that the file was already committed to Git before it was added to .gitignore. Once Git is tracking a file, listing it in .gitignore does not automatically untrack it.</p>
            <h3>Is it safe to run git rm -r --cached .?</h3>
            <p>Yes — it only removes files from Git tracking, not from your actual disk. Your files stay exactly where they are; only the next commit reflects the updated tracking list.</p>
            <h3>Will this delete my files?</h3>
            <p>No. This process only changes what Git tracks in version control. The files themselves remain untouched on your computer.</p>
        </div>

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

@include('partials.services-cta', ['heading' => 'development'])
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
.post-content code { background: var(--bg-soft); color: var(--ink); border-radius: 6px; padding: 2px 6px; font-size: 0.92em; }
.post-content pre { background: #14161a; color: #f3efe7; border-radius: 12px; padding: 1rem; overflow-x: auto; margin: 1.1rem 0; }
.post-content pre code { background: transparent; padding: 0; }
.post-content strong { color: var(--ink); font-weight: 700; }
.post-content a { color: var(--accent); text-decoration: underline; text-underline-offset: 3px; }
.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); }
@media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }
</style>
@endpush
