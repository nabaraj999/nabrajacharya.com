<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Personal;
use App\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class BlogController extends Controller
{
    public function index()
    {
        $personal = Personal::first();
        $seo = Seo::where('page_name', 'blog')->first();

        $blogs = Blog::published()
            ->orderBy('sort_order')
            ->orderByDesc('published_at')
            ->paginate(9);

        return view('pages.blog.index', compact('personal', 'seo', 'blogs'));
    }

    public function show(string $slug)
    {
        $personal = Personal::first();
        $seo = Seo::where('page_name', 'blog')->first();

        $blog = Blog::published()
            ->where('slug', $slug)
            ->firstOrFail();

        $latestBlogs = Blog::published()
            ->where('id', '!=', $blog->id)
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        $commentsEnabled = Schema::hasTable('blog_comments');
        $comments = $commentsEnabled
            ? $blog->approvedComments()->get()
            : collect();

        return view('pages.blog.show', compact('personal', 'seo', 'blog', 'latestBlogs', 'comments', 'commentsEnabled'));
    }

    public function storeComment(Request $request, string $slug)
    {
        abort_unless(Schema::hasTable('blog_comments'), 404);

        $blog = Blog::published()
            ->where('slug', $slug)
            ->firstOrFail();

        $validated = $request->validate([
            'author_name' => ['required', 'string', 'max:120'],
            'author_email' => ['required', 'email', 'max:190'],
            'author_website' => ['nullable', 'url', 'max:255'],
            'comment' => ['required', 'string', 'min:8', 'max:3000'],
        ]);

        $blog->comments()->create($validated + [
            'is_approved' => false,
        ]);

        return redirect()
            ->route('blog.show', $blog->slug)
            ->with('comment_success', 'Your comment has been submitted and is waiting for approval.');
    }

    public function sitemap()
    {
        $blogs = Blog::published()
            ->orderByDesc('published_at')
            ->get(['slug', 'updated_at', 'published_at']);
        $projects = \App\Models\Project::query()
            ->where('status', 'completed')
            ->whereNotNull('slug')
            ->orderByDesc('updated_at')
            ->get(['slug', 'updated_at', 'completion_date']);

        return response()
            ->view('sitemap', compact('blogs', 'projects'))
            ->header('Content-Type', 'application/xml');
    }
}
