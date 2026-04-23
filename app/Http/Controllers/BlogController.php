<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Personal;
use App\Models\Seo;

class BlogController extends Controller
{
    public function index()
    {
        $personal = Personal::first();
        $seo = Seo::where('page_name', 'blog')->first();

        $blogs = Blog::where('is_active', true)
            ->orderBy('sort_order')
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->paginate(9);

        return view('pages.blog.index', compact('personal', 'seo', 'blogs'));
    }

    public function show(string $slug)
    {
        $personal = Personal::first();
        $seo = Seo::where('page_name', 'blog')->first();

        $blog = Blog::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $latestBlogs = Blog::where('is_active', true)
            ->where('id', '!=', $blog->id)
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        return view('pages.blog.show', compact('personal', 'seo', 'blog', 'latestBlogs'));
    }
}
