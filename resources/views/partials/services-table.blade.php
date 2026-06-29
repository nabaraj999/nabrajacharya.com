{{-- Expects: $tableTitle (string), $tableRows (array of [label, bestFor, tech]) --}}
<h2 class="font-display text-2xl font-bold mb-6" style="color: var(--ink);">{{ $tableTitle }}</h2>
<div class="glass-card overflow-hidden mb-12" style="padding: 0;">
    <div class="overflow-x-auto">
        <table class="w-full text-sm" style="border-collapse: collapse;">
            <thead>
                <tr style="background: var(--bg-soft); border-bottom: 1px solid var(--line);">
                    <th class="text-left px-5 py-3 font-bold uppercase tracking-wider text-xs" style="color: var(--ink-faint);">Type</th>
                    <th class="text-left px-5 py-3 font-bold uppercase tracking-wider text-xs" style="color: var(--ink-faint);">Best For</th>
                    <th class="text-left px-5 py-3 font-bold uppercase tracking-wider text-xs" style="color: var(--ink-faint);">Tech Used</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tableRows as $row)
                <tr style="border-bottom: 1px solid var(--line);">
                    <td class="px-5 py-4 font-semibold" style="color: var(--ink);">{{ $row[0] }}</td>
                    <td class="px-5 py-4" style="color: var(--ink-dim);">{{ $row[1] }}</td>
                    <td class="px-5 py-4" style="color: var(--ink-dim);">{{ $row[2] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
