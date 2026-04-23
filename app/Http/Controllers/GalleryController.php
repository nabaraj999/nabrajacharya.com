<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Personal;
use App\Models\Seo;

class GalleryController extends Controller
{
    public function index()
    {
        $personal = Personal::first();
        $seo = Seo::where('page_name', 'gallery')->first();

        $galleryItems = Gallery::where('is_active', true)
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->get();

        $categories = Gallery::where('is_active', true)
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('pages.gallery.index', compact('personal', 'seo', 'galleryItems', 'categories'));
    }
}
