<h2 class="font-display text-2xl font-bold mb-6" style="color: var(--ink);">Why Work With Me</h2>
<div class="flex flex-col gap-4 mb-12">
    @foreach([
        ['Full-Stack + SEO in One', 'You don\'t need a separate developer and SEO consultant — I handle the build and make sure it can actually be found on Google.'],
        ['Laravel-Focused', 'Laravel and PHP are my core stack, so I write clean, maintainable code rather than gluing together unfamiliar tools.'],
        ['Nepal-Based, Remote-Friendly', 'I work with clients across Nepal and abroad, communicating clearly across time zones.'],
    ] as [$title, $desc])
    <div class="flex gap-4">
        <span class="flex-shrink-0 w-8 h-8 rounded-full flex items-center justify-center" style="background: var(--accent-soft); color: var(--accent);">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        </span>
        <div>
            <h3 class="font-display text-base font-bold mb-1" style="color: var(--ink);">{{ $title }}</h3>
            <p class="text-sm leading-relaxed" style="color: var(--ink-dim);">{{ $desc }}</p>
        </div>
    </div>
    @endforeach
</div>
