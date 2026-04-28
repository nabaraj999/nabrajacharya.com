@extends('layouts.app')

@section('title', $seo->meta_title ?? 'Gallery — Selected Works & Visual Snapshots | Nabaraj Acharya')
@section('description', $seo->meta_description ?? 'Explore project visuals and creative snapshots by a Full Stack Developer and SEO Specialist in Nepal, serving Khotang and Lalitpur.')
@section('keywords', $seo->meta_keywords ?? 'gallery web projects nepal, design gallery, project visuals, seo specialist in nepal, seo specialist in khotang, seo specialist in lalitpur, seo specalist in khotang, seo specalist in lalitpur')
@section('canonical', route('gallery.index'))

@section('schema')
@php
    $gallerySchema = [
        '@context' => 'https://schema.org',
        '@type' => 'CollectionPage',
        'name' => 'TechNabu Gallery',
        'description' => 'Selected visuals from web projects and digital work',
        'url' => route('gallery.index'),
    ];
    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Gallery', 'item' => route('gallery.index')],
        ],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($gallerySchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')
<section class="page-hero pt-24 pb-10 md:pt-32 md:pb-16">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 text-center">
        <div class="section-tag">Gallery</div>
        <h1 class="font-display text-4xl md:text-5xl font-bold mt-2 mb-4">
            Visual Work <span class="gradient-text">Showcase</span>
        </h1>
        <p class="text-slate-400 text-lg max-w-2xl mx-auto">
            A curated collection of project visuals, launch assets, and digital moments from work across Nepal, Khotang, and Lalitpur.
        </p>
    </div>
</section>

@if($categories->isNotEmpty())
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-6 md:py-8">
    <div class="flex flex-wrap gap-2 justify-center" id="gallery-filters">
        <button data-filter="all" class="gallery-filter active skill-badge text-sm px-4 py-2 cursor-pointer">All</button>
        @foreach($categories as $category)
        <button data-filter="{{ Str::slug($category) }}" class="gallery-filter skill-badge text-sm px-4 py-2 cursor-pointer">{{ $category }}</button>
        @endforeach
    </div>
</div>
@endif

<section class="py-8 pb-16 md:pb-24 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        @if($galleryItems->isEmpty())
            <p class="text-center text-slate-500 py-20">No gallery items available yet.</p>
        @else
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-5" id="gallery-grid">
                @foreach($galleryItems as $item)
                <article class="gallery-item group relative overflow-hidden rounded-xl border border-slate-800 bg-slate-900/40"
                         data-category="{{ Str::slug($item->category ?? 'uncategorized') }}">
                    <button class="gallery-open w-full text-left" data-image="{{ asset('storage/'.$item->image_path) }}" data-title="{{ $item->title }}" data-caption="{{ $item->caption }}">
                        <img src="{{ asset('storage/'.$item->image_path) }}" alt="{{ $item->title }}"
                             class="w-full h-44 sm:h-52 object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-95"></div>
                        <div class="absolute left-3 right-3 bottom-3">
                            <p class="text-white text-sm font-semibold leading-tight">{{ $item->title }}</p>
                            @if($item->category)
                            <p class="text-indigo-300 text-xs mt-1">{{ $item->category }}</p>
                            @endif
                        </div>
                    </button>
                </article>
                @endforeach
            </div>
        @endif
    </div>
</section>

<div id="gallery-modal" class="fixed inset-0 z-[9998] hidden items-center justify-center bg-black/85 p-4">
    <div class="relative w-full max-w-5xl rounded-2xl border border-slate-700 bg-slate-900 overflow-hidden">
        <button id="gallery-close" class="absolute right-3 top-3 z-10 h-9 w-9 rounded-full bg-black/60 text-white hover:bg-red-600 transition-colors">×</button>
        <img id="gallery-modal-image" src="" alt="Gallery image" class="w-full max-h-[75vh] object-contain bg-black">
        <div class="p-4 md:p-5 border-t border-slate-800">
            <h3 id="gallery-modal-title" class="font-display text-xl text-white"></h3>
            <p id="gallery-modal-caption" class="text-slate-400 text-sm mt-2"></p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const galleryFilters = document.querySelectorAll('.gallery-filter');
    const galleryItems = document.querySelectorAll('.gallery-item');

    galleryFilters.forEach(btn => {
        btn.addEventListener('click', () => {
            galleryFilters.forEach(b => b.classList.remove('active', 'border-indigo-400', 'text-indigo-300'));
            btn.classList.add('active', 'border-indigo-400', 'text-indigo-300');

            const filter = btn.dataset.filter;
            galleryItems.forEach(item => {
                item.style.display = filter === 'all' || item.dataset.category === filter ? '' : 'none';
            });
        });
    });

    const modal = document.getElementById('gallery-modal');
    const modalImage = document.getElementById('gallery-modal-image');
    const modalTitle = document.getElementById('gallery-modal-title');
    const modalCaption = document.getElementById('gallery-modal-caption');

    document.querySelectorAll('.gallery-open').forEach(btn => {
        btn.addEventListener('click', () => {
            modalImage.src = btn.dataset.image;
            modalTitle.textContent = btn.dataset.title || '';
            modalCaption.textContent = btn.dataset.caption || '';
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });
    });

    function closeGalleryModal() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    document.getElementById('gallery-close').addEventListener('click', closeGalleryModal);
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeGalleryModal();
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.classList.contains('flex')) closeGalleryModal();
    });
</script>
<style>
    .gallery-filter.active {
        background: rgba(99,102,241,0.25);
        border-color: rgba(99,102,241,0.6);
        color: #c7d2fe;
    }
</style>
@endpush
