{{-- Expects: $faqs (array of [question, answer]) --}}
<h2 class="font-display text-2xl font-bold mb-6" style="color: var(--ink);">Frequently Asked Questions</h2>
<div class="faq-accordion mb-12">
    @foreach($faqs as $i => [$question, $answer])
    <div class="faq-item @if($i === 0) is-open @endif">
        <button type="button" class="faq-q-btn">
            <span class="faq-number">{{ $i + 1 }}</span>
            <span class="faq-q-text">{{ $question }}</span>
            <svg class="faq-chevron w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="faq-a-wrap">
            <div class="faq-a-inner">{{ $answer }}</div>
        </div>
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
