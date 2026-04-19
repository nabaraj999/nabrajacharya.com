<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Personal;
use App\Models\Seo;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $personal = Personal::first();
        $seo      = Seo::where('page_name', 'contact')->first();

        return view('pages.contact', compact('personal', 'seo'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        return redirect()->route('contact')->with('success', 'Thank you! I\'ll get back to you soon.');
    }
}
