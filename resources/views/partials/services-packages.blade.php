{{-- Expects: $packagesTitle (string), $packages (array of ['name','tagline','bullets'=>[], 'featured'=>bool]) --}}
<h2 class="font-display text-2xl font-bold mb-2" style="color: var(--ink);">{{ $packagesTitle }}</h2>
<p class="text-sm mb-6" style="color: var(--ink-faint);">Pricing depends on scope — these tiers show what's typically included at each level. <a href="{{ route('contact') }}" class="font-semibold hover:underline" style="color: var(--accent);">Contact me</a> for a custom quote.</p>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
    @foreach($packages as $pkg)
    <div class="glass-card p-6" style="{{ !empty($pkg['featured']) ? 'border-color: var(--accent);' : '' }}">
        @if(!empty($pkg['featured']))
        <span class="inline-block text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full mb-3" style="background: var(--accent); color: #fff;">Most Popular</span>
        @endif
        <h3 class="font-display text-lg font-bold mb-1" style="color: var(--ink);">{{ $pkg['name'] }}</h3>
        <p class="text-xs mb-4" style="color: var(--ink-faint);">{{ $pkg['tagline'] }}</p>
        <ul class="flex flex-col gap-2.5">
            @foreach($pkg['bullets'] as $bullet)
            <li class="flex items-start gap-2 text-sm" style="color: var(--ink-dim);">
                <svg class="w-4 h-4 flex-shrink-0 mt-0.5" style="color: var(--accent);" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>{{ $bullet }}</span>
            </li>
            @endforeach
        </ul>
    </div>
    @endforeach
</div>
