<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Gallery;
use App\Models\Partner;
use App\Models\Personal;
use App\Models\Project;
use App\Models\Seo;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $personal    = Personal::first();
        $seo         = Seo::where('page_name', 'home')->first();
        $featured    = Project::where('status', 'completed')->with('skills')->latest()->take(4)->get();
        $services    = Service::where('is_active', true)->take(4)->get();
        $skills      = Skill::orderBy('proficiency', 'desc')->get();
        $experiences = Experience::where('is_active', true)->orderBy('sort_order')->orderByDesc('start_date')->get();
        $partners    = Partner::where('is_active', true)->orderBy('sort_order')->get();
        $blogs       = collect(BlogController::posts())
            ->sortByDesc(fn ($post) => \Carbon\Carbon::parse($post['date']))
            ->take(3)
            ->values();
        $galleryItems = Gallery::where('is_active', true)->orderBy('sort_order')->orderByDesc('created_at')->take(8)->get();
        $testimonials = Testimonial::where('is_approved', true)->orderByDesc('approved_at')->orderByDesc('created_at')->get();

        return view('pages.home', compact('personal', 'seo', 'featured', 'services', 'skills', 'experiences', 'partners', 'blogs', 'galleryItems', 'testimonials'));
    }
}
