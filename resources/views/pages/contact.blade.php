@extends('layouts.app')

@section('title', $seo->meta_title ?? 'Hire a Full Stack Developer Nepal — Contact Nabaraj Acharya')
@section('description', $seo->meta_description ?? 'Contact Nabaraj Acharya, Full Stack Developer and SEO Specialist in Nepal. Available for Laravel development and SEO consulting in Khotang and Lalitpur.')
@section('keywords', $seo->meta_keywords ?? 'hire full stack developer nepal, contact laravel developer nepal, seo specialist in nepal, seo specialist in khotang, seo specialist in lalitpur, seo specalist in khotang, seo specalist in lalitpur')

@section('content')

<section class="page-hero pt-24 pb-10 md:pt-32 md:pb-16">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 text-center">
        <div class="section-tag">Contact</div>
        <h1 class="font-display text-4xl md:text-5xl font-bold mt-2 mb-4">
            Hire a <span class="gradient-text">Full Stack Developer Nepal</span>
        </h1>
        <p class="text-slate-400 text-lg max-w-2xl mx-auto">
            Have a project in mind? Let's talk about how I can help you build it.
        </p>
    </div>
</section>

<section class="py-10 md:py-16 pb-16 md:pb-24 reveal">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-10">

            {{-- Contact info --}}
            <div class="md:col-span-2 space-y-5">
                <div>
                    <h2 class="font-display text-xl font-bold text-white mb-2">Let's work together</h2>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        I'm a Full Stack Developer and SEO Specialist in Nepal available for freelance projects, consulting, and full-time opportunities in Nepal, Khotang, and Lalitpur.
                    </p>
                </div>

                @if($personal)
                <div class="space-y-3">
                    @if($personal->email)
                    <div class="flex items-center gap-3 p-4 rounded-xl bg-slate-900/50 border border-slate-800">
                        <div class="w-9 h-9 rounded-lg bg-indigo-500/15 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 mb-0.5">Email</p>
                            <a href="mailto:{{ $personal->email }}" class="text-sm font-medium text-slate-200 hover:text-indigo-300 transition-colors">{{ $personal->email }}</a>
                        </div>
                    </div>
                    @endif

                    @if($personal->phone_number)
                    <div class="flex items-center gap-3 p-4 rounded-xl bg-slate-900/50 border border-slate-800">
                        <div class="w-9 h-9 rounded-lg bg-cyan-500/15 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 mb-0.5">Phone</p>
                            <a href="tel:{{ $personal->phone_number }}" class="text-sm font-medium text-slate-200 hover:text-cyan-300 transition-colors">{{ $personal->phone_number }}</a>
                        </div>
                    </div>
                    @endif

                    @if($personal->location)
                    <div class="flex items-center gap-3 p-4 rounded-xl bg-slate-900/50 border border-slate-800">
                        <div class="w-9 h-9 rounded-lg bg-purple-500/15 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 mb-0.5">Location</p>
                            <p class="text-sm font-medium text-slate-200">{{ $personal->location }}</p>
                        </div>
                    </div>
                    @endif

                    @if($personal->current_company)
                    <div class="flex items-center gap-3 p-4 rounded-xl bg-emerald-500/8 border border-emerald-500/20">
                        <div class="w-9 h-9 rounded-lg bg-emerald-500/15 flex items-center justify-center flex-shrink-0">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        </div>
                        <div>
                            <p class="text-xs text-emerald-500/70 mb-0.5">Current Role</p>
                            <p class="text-sm font-medium text-emerald-300">{{ $personal->current_role }} @ {{ $personal->current_company }}</p>
                        </div>
                    </div>
                    @endif

                    @if($personal->linkedin_url)
                    <div class="flex items-center gap-3 p-4 rounded-xl bg-blue-500/8 border border-blue-500/20">
                        <div class="w-9 h-9 rounded-lg bg-blue-500/15 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs text-blue-500/70 mb-0.5">LinkedIn</p>
                            <a href="{{ $personal->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="text-sm font-medium text-blue-300 hover:text-blue-200 transition-colors">Connect on LinkedIn</a>
                        </div>
                    </div>
                    @endif
                </div>
                @endif
            </div>

            {{-- Form --}}
            <div class="md:col-span-3">
                <div class="glass-card p-7 md:p-9">
                    @if(session('success'))
                    <div class="bg-emerald-500/12 border border-emerald-500/25 text-emerald-400 p-4 rounded-xl mb-6 text-sm font-medium text-center">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-medium text-slate-300 mb-2">Your Name</label>
                                <input type="text" name="name" class="form-input" placeholder="John Doe" value="{{ old('name') }}" required>
                                @error('name')<p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-300 mb-2">Your Email</label>
                                <input type="email" name="email" class="form-input" placeholder="john@example.com" value="{{ old('email') }}" required>
                                @error('email')<p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Your Message</label>
                            <textarea name="message" rows="5" class="form-input resize-none" placeholder="Hi Nabaraj, I'd like to discuss a web development project...">{{ old('message') }}</textarea>
                            @error('message')<p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>@enderror
                        </div>
                        <button type="submit" class="btn-primary w-full justify-center py-3.5 text-base">
                            <span>Send Message</span>
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
