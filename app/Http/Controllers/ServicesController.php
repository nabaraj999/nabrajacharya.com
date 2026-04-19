<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Seo;
use App\Models\Service;

class ServicesController extends Controller
{
    public function index()
    {
        $personal = Personal::first();
        $seo      = Seo::where('page_name', 'services')->first();
        $services = Service::where('is_active', true)->get();

        return view('pages.services', compact('personal', 'seo', 'services'));
    }
}
