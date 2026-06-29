<div class="lg:col-span-1">
    <div class="sticky" style="top: 100px;">
        @if(isset($otherServices) && $otherServices->isNotEmpty())
        <div class="glass-card p-6 mb-6">
            <h3 class="font-display text-sm font-bold uppercase tracking-wider mb-4" style="color: var(--ink-faint);">Other Services</h3>
            <div class="flex flex-col">
                @foreach($otherServices as $s)
                <a href="{{ route('services.' . $s->slug) }}" class="flex items-center justify-between py-3 border-b text-sm font-medium transition-colors" style="border-color: var(--line); color: var(--ink-dim);" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='var(--ink-dim)'">
                    {{ $s->service_name }}
                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                @endforeach
            </div>
        </div>
        @endif

        @if($personal && $personal->email)
        <div class="glass-card p-6 text-center">
            <h3 class="font-display text-base font-bold mb-2" style="color: var(--ink);">Got a project in mind?</h3>
            <p class="text-sm mb-5" style="color: var(--ink-dim);">Let's talk about what you're building.</p>
            <a href="{{ route('contact') }}" class="btn-outline w-full justify-center" data-magnetic data-cursor="link">Get in Touch</a>
        </div>
        @endif
    </div>
</div>
