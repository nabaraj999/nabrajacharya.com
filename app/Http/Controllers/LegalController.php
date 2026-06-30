<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Seo;

class LegalController extends Controller
{
    public function privacy()
    {
        $personal = Personal::first();
        $seo      = Seo::where('page_name', 'privacy-policy')->first();

        return view('pages.privacy-policy', compact('personal', 'seo'));
    }

    public function terms()
    {
        $personal = Personal::first();
        $seo      = Seo::where('page_name', 'terms-conditions')->first();

        return view('pages.terms-conditions', compact('personal', 'seo'));
    }
}
