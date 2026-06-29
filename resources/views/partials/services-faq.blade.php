{{-- Expects: $faqs (array of [question, answer]) --}}
<h2 class="font-display text-2xl font-bold mb-6" style="color: var(--ink);">Frequently Asked Questions</h2>
<div class="flex flex-col gap-4 mb-12">
    @foreach($faqs as $i => [$question, $answer])
    <div class="glass-card p-6">
        <span class="block font-display text-sm font-extrabold mb-2" style="color: var(--accent);">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}.</span>
        <h3 class="font-display text-base font-bold mb-2" style="color: var(--ink);">{{ $question }}</h3>
        <p class="text-sm leading-relaxed" style="color: var(--ink-dim);">{{ $answer }}</p>
    </div>
    @endforeach
</div>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => collect($faqs)->map(fn ($faq) => [
        '@type' => 'Question',
        'name' => $faq[0],
        'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq[1]],
    ])->all(),
]) !!}
</script>
