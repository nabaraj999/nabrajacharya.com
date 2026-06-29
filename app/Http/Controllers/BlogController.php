<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Seo;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Hardcoded post directory — each entry maps to a static view in
     * resources/views/pages/blog/posts/{slug}.blade.php and a named
     * route blog.{slug}.
     */
    public static function posts(): array
    {
        return [
            [
                'slug' => 'hire-laravel-developer-in-nepal',
                'title' => 'How to Hire a Laravel Developer in Nepal (2026 Guide)',
                'excerpt' => 'A practical guide to hiring a Laravel developer in Nepal — what to look for, what to ask before you commit, and the red flags worth avoiding.',
                'image' => null,
                'date' => 'June 29, 2026',
                'reading_time' => 6,
            ],
            [
                'slug' => 'website-cost-in-nepal-2026',
                'title' => 'How Much Does a Website Cost in Nepal? (2026 Guide)',
                'excerpt' => "A clear breakdown of what actually affects website cost in Nepal — site type, design complexity, integrations, and ongoing maintenance — so you can budget realistically.",
                'image' => null,
                'date' => 'June 29, 2026',
                'reading_time' => 5,
            ],
            [
                'slug' => 'seo-pricing-packages-in-nepal',
                'title' => 'SEO Pricing & Packages in Nepal Explained',
                'excerpt' => 'How SEO pricing actually works in Nepal — what affects cost, common package structures, and the red flags to avoid when comparing SEO quotes.',
                'image' => null,
                'date' => 'June 29, 2026',
                'reading_time' => 5,
            ],
            [
                'slug' => 'top-10-it-companies-in-nepal',
                'title' => 'Top 10 IT Companies in Nepal (2025): The Definitive Guide',
                'excerpt' => "Nepal's IT industry crossed $1 billion in software exports in 2025. Here is your authoritative guide to the top 10 IT companies in Nepal — covering services, technologies, notable clients, and why Nepal is becoming Asia's next major tech hub.",
                'image' => null,
                'date' => 'May 11, 2026',
                'reading_time' => 15,
            ],
            [
                'slug' => 'seo-checklist-2026-nepal-khotang-lalitpur',
                'title' => 'Complete SEO Checklist 2026 for Businesses in Nepal, Khotang & Lalitpur',
                'excerpt' => 'A practical SEO checklist covering on-page, technical, local SEO, and E-E-A-T standards for businesses in Nepal, Khotang, and Lalitpur.',
                'image' => 'blogs/01KPX7CND1HGP7CATP8AJTHC64.jpg',
                'date' => 'April 23, 2026',
                'reading_time' => 2,
            ],
        ];
    }

    public function index(Request $request)
    {
        $personal = Personal::first();
        $seo = Seo::where('page_name', 'blog')->first();
        $search = trim((string) $request->query('q', ''));

        $posts = collect(self::posts());
        if ($search !== '') {
            $posts = $posts->filter(fn ($p) => str_contains(strtolower($p['title']), strtolower($search))
                || str_contains(strtolower($p['excerpt']), strtolower($search)));
        }

        return view('pages.blog.index', compact('personal', 'seo', 'posts', 'search'));
    }

    public function seoChecklist2026()
    {
        return $this->renderPost('seo-checklist-2026-nepal-khotang-lalitpur');
    }

    public function topItCompaniesNepal()
    {
        return $this->renderPost('top-10-it-companies-in-nepal');
    }

    public function hireLaravelDeveloper()
    {
        return $this->renderPost('hire-laravel-developer-in-nepal');
    }

    public function websiteCostInNepal()
    {
        return $this->renderPost('website-cost-in-nepal-2026');
    }

    public function seoPricingPackages()
    {
        return $this->renderPost('seo-pricing-packages-in-nepal');
    }

    private function renderPost(string $slug)
    {
        $personal = Personal::first();
        $seo = Seo::where('page_name', 'blog')->first();
        $otherPosts = collect(self::posts())->reject(fn ($p) => $p['slug'] === $slug)->values();

        return view('pages.blog.posts.' . $slug, compact('personal', 'seo', 'otherPosts'));
    }

    public function sitemap()
    {
        $projects = \App\Models\Project::query()
            ->where('status', 'completed')
            ->whereNotNull('slug')
            ->orderByDesc('updated_at')
            ->get(['slug', 'updated_at', 'completion_date']);
        $services = \App\Models\Service::where('is_active', true)
            ->whereNotNull('slug')
            ->get(['slug', 'updated_at']);
        $blogSlugs = collect(self::posts())->pluck('slug');

        return response()
            ->view('sitemap', compact('projects', 'services', 'blogSlugs'))
            ->header('Content-Type', 'application/xml');
    }
}
