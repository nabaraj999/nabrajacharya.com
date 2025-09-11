<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Education;
use App\Models\Personal;
use App\Models\Seo;
use App\Models\Service;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
{
    $data = [
        'personal' => Personal::first(),
        'projects' => [],
        'education' => Education::orderBy('id', 'desc')->get(),
        'services' => Service::where('is_active', true)->get(),
        'skills' => Skill::orderBy('proficiency', 'desc')->get(),
        'seos' => Seo::all()->first(),
    ];

    try {
        $projects = Project::where('status', 'completed')->take(6)->get();
        Log::info('Projects loaded successfully: ' . $projects->count() . ' items');
        $data['projects'] = $projects;
    } catch (\Exception $e) {
        Log::error('Failed to load projects: ' . $e->getMessage());
    }

    return view('index', compact('data'));
}
}

