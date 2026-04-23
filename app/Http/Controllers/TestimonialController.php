<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Seo;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function create()
    {
        $personal = Personal::first();
        $seo = Seo::where('page_name', 'testimonial-submit')->first();

        return response()
            ->view('pages.testimonials.submit', compact('personal', 'seo'))
            ->header('X-Robots-Tag', 'noindex, nofollow, noarchive');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:150',
            'client_email' => 'required|email|max:255',
            'company_name' => 'nullable|string|max:150',
            'client_role' => 'nullable|string|max:150',
            'client_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required|string|min:30|max:3000',
        ]);

        if ($request->hasFile('client_photo')) {
            $validated['client_photo'] = $request->file('client_photo')->store('testimonials', 'public');
        }

        Testimonial::create($validated + [
            'is_approved' => false,
            'approved_at' => null,
        ]);

        return redirect()->route('testimonial.create')->with('success', 'Thank you for your testimonial. It has been submitted for review.');
    }
}
