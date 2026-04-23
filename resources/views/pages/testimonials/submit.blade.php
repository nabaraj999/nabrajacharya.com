@extends('layouts.app')

@section('title', $seo->meta_title ?? 'Submit Testimonial | TechNabu')
@section('description', $seo->meta_description ?? 'Share your project experience and submit a testimonial for review.')
@section('keywords', $seo->meta_keywords ?? 'submit testimonial, client feedback, project review')
@section('robots', 'noindex, nofollow, noarchive')

@section('content')
<section class="page-hero pt-24 pb-10 md:pt-32 md:pb-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <div class="section-tag">Testimonial</div>
        <h1 class="font-display text-3xl md:text-5xl font-bold mt-2 mb-4">
            Share Your <span class="gradient-text">Experience</span>
        </h1>
        <p class="text-slate-400 text-lg max-w-2xl mx-auto">
            Thank you for working with me. Your feedback helps build trust and improve future client experience.
        </p>
    </div>
</section>

<section class="py-8 pb-16 md:pb-24 reveal">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="glass-card p-7 md:p-9">
            @if(session('success'))
            <div class="bg-emerald-500/12 border border-emerald-500/25 text-emerald-400 p-4 rounded-xl mb-6 text-sm font-medium text-center">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Full Name</label>
                        <input type="text" name="client_name" class="form-input" value="{{ old('client_name') }}" required>
                        @error('client_name')<p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Email</label>
                        <input type="email" name="client_email" class="form-input" value="{{ old('client_email') }}" required>
                        @error('client_email')<p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Photo (Optional)</label>
                    <input type="file" name="client_photo" class="form-input" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                    <p class="text-xs text-slate-500 mt-2">Max size 2MB. JPG, PNG, or WEBP.</p>
                    @error('client_photo')<p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>@enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Company (Optional)</label>
                        <input type="text" name="company_name" class="form-input" value="{{ old('company_name') }}">
                        @error('company_name')<p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Role (Optional)</label>
                        <input type="text" name="client_role" class="form-input" value="{{ old('client_role') }}" placeholder="e.g. Founder, Marketing Manager">
                        @error('client_role')<p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Rating</label>
                    <select name="rating" class="form-input" required>
                        @for($i = 5; $i >= 1; $i--)
                            <option value="{{ $i }}" {{ (int) old('rating', 5) === $i ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                        @endfor
                    </select>
                    @error('rating')<p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-2">Your Testimonial</label>
                    <textarea name="message" rows="6" class="form-input resize-none" placeholder="Please share your experience working with me..." required>{{ old('message') }}</textarea>
                    @error('message')<p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>@enderror
                </div>

                <p class="text-xs text-slate-500">Your testimonial will be reviewed before it is published.</p>

                <button type="submit" class="btn-primary w-full justify-center py-3.5 text-base">
                    <span>Submit Testimonial</span>
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
