<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Partner;
use App\Models\Personal;
use App\Models\Project;
use App\Models\Seo;
use App\Models\Service;
use App\Models\Skill;

class HomeController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $personal    = Personal::first();
        $seo         = Seo::where('page_name', 'home')->first();
        $featured    = Project::where('status', 'completed')->with('skills')->latest()->take(6)->get();
        $services    = Service::where('is_active', true)->take(6)->get();
        $skills      = Skill::orderBy('proficiency', 'desc')->get();
        $experiences = Experience::where('is_active', true)->orderBy('sort_order')->orderByDesc('start_date')->get();
        $partners    = Partner::where('is_active', true)->orderBy('sort_order')->get();
=======
        $personal = Personal::first();  // Changed to singular $personal
        $education = Education::orderBy('id', 'desc')->get();
        $services = Service::where('is_active', true)->get();
        $skills = Skill::orderBy('proficiency', 'desc')->get();
        $seo = Seo::first();
        $projects = Project::where('status', 'completed')->get();
>>>>>>> 0cec08a04ddb36bb8ec51f5e821a5ed437bdf037

        return view('pages.home', compact('personal', 'seo', 'featured', 'services', 'skills', 'experiences', 'partners'));
    }
}
