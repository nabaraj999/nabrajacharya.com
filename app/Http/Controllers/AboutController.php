<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Personal;
use App\Models\Seo;
use App\Models\Skill;

class AboutController extends Controller
{
    public function index()
    {
        $personal    = Personal::first();
        $seo         = Seo::where('page_name', 'about')->first();
        $education   = Education::orderBy('start_year', 'desc')->get();
        $skills      = Skill::orderBy('proficiency', 'desc')->get();
        $experiences    = Experience::where('is_active', true)->orderBy('sort_order')->orderByDesc('start_date')->get();
        $certifications = Certification::where('is_active', true)->orderBy('sort_order')->orderByDesc('issue_date')->get();

        return view('pages.about', compact('personal', 'seo', 'education', 'skills', 'experiences', 'certifications'));
    }
}
