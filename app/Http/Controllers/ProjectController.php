<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('status', 'completed')
                         ->take(6)
                         ->get();
// dd($projects);
        return view('index', compact('projects'));
    }
}
