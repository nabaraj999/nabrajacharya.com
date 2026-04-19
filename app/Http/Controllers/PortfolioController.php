<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Project;
use App\Models\Seo;
use App\Models\Skill;

class PortfolioController extends Controller
{
    public function index()
    {
        $personal = Personal::first();
        $seo      = Seo::where('page_name', 'portfolio')->first();
        $projects = Project::where('status', 'completed')->with('skills')->latest()->get();
        $skills   = Skill::orderBy('skill_name')->get();

        return view('pages.portfolio.index', compact('personal', 'seo', 'projects', 'skills'));
    }

    public function show(int $id)
    {
        $personal = Personal::first();
        $project  = Project::with('skills')->findOrFail($id);
        $seo      = Seo::where('page_name', 'portfolio')->first();

        return view('pages.portfolio.show', compact('personal', 'project', 'seo'));
    }
}
