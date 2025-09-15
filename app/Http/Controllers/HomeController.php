<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Personal;
use App\Models\Project;
use App\Models\Seo;
use App\Models\Service;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $personal = Personal::first();  // Changed to singular $personal
        $education = Education::orderBy('id', 'desc')->get();
        $services = Service::where('is_active', true)->get();
        $skills = Skill::orderBy('proficiency', 'desc')->get();
        $seo = Seo::first();
        $projects = Project::where('status', 'completed')->take(6)->get();

        // Optional: Log for debugging (remove in production)
        Log::info('HomeController data loaded', [
            'personal_exists' => $personal ? true : false,  // Now uses $personal
            'education_count' => $education->count(),
            'services_count' => $services->count(),
            'skills_count' => $skills->count(),
            'seo_exists' => $seo ? true : false,
            'projects_count' => $projects->count()
        ]);

        return view('index', compact('personal', 'education', 'services', 'skills', 'seo', 'projects'));
    }
}
