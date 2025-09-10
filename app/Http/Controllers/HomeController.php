<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\Project;         // Adjust to your model
use App\Models\Education;      // Adjust to your model
use App\Models\Personal;
use App\Models\Seo;
use App\Models\Service;
use App\Models\Skill;          // Adjust to your model
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch dynamic data (adjust model names and queries as needed)
        $data = [
            'personal' => Personal::first(), // Single record
          'projects' => Project::where('status', 'completed')->take(6)->get(), // Fetch completed projects, limit to 6
            'education' => Education::orderBy('id','desc')->get(),     // Limit to 5 for compactness
            'services' => Service::where('is_active', true)->get(), // Fetch only active services
            'skills' => Skill::orderBy('proficiency', 'desc')->get(), // Order skills by proficiency
            'seos' => Seo::all()->first(),
        ];

        return view('index', compact('data'));
    }
}
