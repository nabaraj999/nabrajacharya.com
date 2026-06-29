@extends('layouts.app')

@section('title', 'Laravel Livewire Tutorial for Beginners | TechNabu Blog')
@section('description', 'A beginner-friendly introduction to Laravel Livewire — what it is, how it works, and a simple example to get you building dynamic UIs without writing JavaScript.')
@section('keywords', 'laravel livewire tutorial, laravel developer nepal, livewire beginners guide, nabaraj acharya')
@section('canonical', route('blog.laravel-livewire-tutorial-beginners'))
@section('og_type', 'article')

@section('schema')
@php
    $articleSchema = [
        '@context' => 'https://schema.org', '@type' => 'BlogPosting',
        'headline' => 'Laravel Livewire Tutorial for Beginners',
        'description' => 'A beginner-friendly introduction to Laravel Livewire with a simple working example.',
        'author' => ['@type' => 'Person', 'name' => $personal->brand_name ?? 'Nabaraj Acharya'],
        'mainEntityOfPage' => route('blog.laravel-livewire-tutorial-beginners'),
        'timeRequired' => 'PT7M',
    ];
    $faqSchema = [
        '@context' => 'https://schema.org', '@type' => 'FAQPage',
        'mainEntity' => [
            ['@type' => 'Question', 'name' => 'Do I need to know JavaScript to use Livewire?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'No — that is the main appeal of Livewire. You write the interactive logic in PHP, and Livewire handles updating the page for you.']],
            ['@type' => 'Question', 'name' => 'Is Livewire a replacement for Vue or React?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => "Not exactly. Livewire is great for most CRUD-heavy business applications. For highly complex, app-like interfaces, a dedicated JavaScript framework can still make more sense."]],
            ['@type' => 'Question', 'name' => 'Is Livewire slower than a JavaScript framework?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => "There is some network overhead since it talks to the server more often, but for most business applications the difference is not noticeable, and the development speed gain is significant."]],
        ],
    ];
    $breadcrumbSchema = ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => route('blog.index')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Laravel Livewire Tutorial for Beginners', 'item' => route('blog.laravel-livewire-tutorial-beginners')],
    ]];
@endphp
<script type="application/ld+json">{!! json_encode($articleSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($faqSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')
<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">Laravel Livewire Tutorial for Beginners</h1>
        <div class="flex flex-wrap items-center justify-center gap-3 mb-4">
            <span class="skill-badge">Tutorial</span>
            <span class="skill-badge">7 min read</span>
        </div>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a><span class="mx-1">&rsaquo;</span>
            <a href="{{ route('blog.index') }}" class="hover:underline">Blog</a><span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">Laravel Livewire Tutorial for Beginners</span>
        </p>
    </div>
</section>

<section class="py-10 md:py-14 reveal">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <p class="text-lg leading-relaxed mb-8" style="color: var(--ink); border-left: 4px solid var(--accent); padding-left: 16px;">
            Livewire lets you build interactive, dynamic interfaces in Laravel using only PHP — no separate JavaScript framework required. Here's how it works, with a simple example.
        </p>

        <div class="post-content">
            <p>If you've ever wanted a page that updates without a full reload — a live search box, a counter, a form that validates as you type — but didn't want to set up a whole JavaScript framework just for that, Livewire is built exactly for this.</p>

            <h2>What Livewire Actually Does</h2>
            <p>You write a PHP class (a "component") that holds your data and logic, paired with a Blade view. When something happens on the page — a button click, typing in a field — Livewire sends that interaction to the server, runs your PHP code, and updates only the parts of the page that changed. From your side, it feels like writing normal Laravel code; Livewire handles the JavaScript plumbing behind the scenes.</p>

            <h2>A Simple Example: A Counter</h2>
            <p>Here's what a basic Livewire counter component looks like:</p>
            <pre><code>// app/Livewire/Counter.php
class Counter extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}</code></pre>
            <p>And the matching Blade view:</p>
            <pre><code>&lt;div&gt;
    &lt;h2&gt;@{{ $count }}&lt;/h2&gt;
    &lt;button wire:click="increment"&gt;+1&lt;/button&gt;
&lt;/div&gt;</code></pre>
            <p>Clicking the button calls the <code>increment()</code> method on the server, which updates <code>$count</code>, and Livewire refreshes just that number on the page — no manual JavaScript and no full page reload.</p>

            <h2>When Livewire Is a Good Fit</h2>
            <ul>
                <li>Admin panels and dashboards with forms, filters, and tables.</li>
                <li>Search and filtering interfaces that update results as you type.</li>
                <li>Multi-step forms and wizards.</li>
                <li>Any feature that would otherwise need a small amount of custom JavaScript just to avoid full page reloads.</li>
            </ul>

            <h2>When You Might Want Something Else</h2>
            <p>For highly complex, app-like interfaces — think rich drag-and-drop builders or real-time collaborative tools — a dedicated JavaScript framework like Vue or React can still be the better fit. For most everyday business application features, though, Livewire covers the need without the added complexity.</p>

            <h2>Final Thoughts</h2>
            <p>Livewire is one of the more practical additions to the Laravel ecosystem in recent years — it lets a backend-focused developer build genuinely interactive features without becoming a JavaScript specialist first. It's part of the toolkit I use on relevant projects under <a href="{{ route('services.web-development') }}">web development</a> and <a href="{{ route('services.software-engineering') }}">software engineering</a>.</p>

            <h2>FAQs</h2>
            <h3>Do I need to know JavaScript to use Livewire?</h3>
            <p>No — that is the main appeal of Livewire. You write the interactive logic in PHP, and Livewire handles updating the page for you.</p>
            <h3>Is Livewire a replacement for Vue or React?</h3>
            <p>Not exactly. Livewire is great for most CRUD-heavy business applications. For highly complex, app-like interfaces, a dedicated JavaScript framework can still make more sense.</p>
            <h3>Is Livewire slower than a JavaScript framework?</h3>
            <p>There is some network overhead since it talks to the server more often, but for most business applications the difference is not noticeable, and the development speed gain is significant.</p>
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

@include('partials.services-cta', ['heading' => 'Laravel'])
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
.post-content a { color: var(--accent); text-decoration: underline; text-underline-offset: 3px; }
.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); }
@media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }
</style>
@endpush
