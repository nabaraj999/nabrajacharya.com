<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

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
                'image' => 'blogs/hire-laravel-developer-nepal.webp',
                'date' => 'June 29, 2026',
                'reading_time' => 7,
            ],
            [
                'slug' => 'website-cost-in-nepal-2026',
                'title' => 'How Much Does a Website Cost in Nepal? (2026 Guide)',
                'excerpt' => "A clear breakdown of what actually affects website cost in Nepal — site type, design complexity, integrations, and ongoing maintenance — so you can budget realistically.",
                'image' => 'blogs/website-cost-in-nepal.webp',
                'date' => 'June 29, 2026',
                'reading_time' => 5,
            ],
            [
                'slug' => 'seo-pricing-packages-in-nepal',
                'title' => 'SEO Pricing & Packages in Nepal Explained',
                'excerpt' => 'How SEO pricing actually works in Nepal — what affects cost, common package structures, and the red flags to avoid when comparing SEO quotes.',
                'image' => 'blogs/seo-pricing-packages-nepal.webp',
                'date' => 'June 29, 2026',
                'reading_time' => 6,
            ],
            [
                'slug' => 'laravel-performance-mistakes-nepal',
                'title' => 'Common Laravel Performance Mistakes (And How to Fix Them)',
                'excerpt' => 'The most common reasons a Laravel website feels slow — and practical, beginner-friendly fixes for each one.',
                'image' => 'blogs/laravel-performance-mistakes.webp',
                'date' => 'June 29, 2026',
                'reading_time' => 6,
            ],
            [
                'slug' => 'wordpress-vs-laravel-nepal',
                'title' => 'WordPress vs Laravel: Which Is Right for Your Business in Nepal?',
                'excerpt' => "A practical, no-bias comparison of WordPress and Laravel for businesses in Nepal — when each one makes sense, and when it doesn't.",
                'image' => 'blogs/wordpress-vs-laravel-nepal.webp',
                'date' => 'June 29, 2026',
                'reading_time' => 6,
            ],
            [
                'slug' => 'local-seo-small-business-nepal',
                'title' => 'Local SEO for Small Businesses in Nepal: A Step-by-Step Guide',
                'excerpt' => 'A practical, step-by-step local SEO guide for small businesses in Nepal — Google Business Profile, citations, reviews, and local content.',
                'image' => 'blogs/local-seo-small-business-nepal.webp',
                'date' => 'June 29, 2026',
                'reading_time' => 6,
            ],
            [
                'slug' => 'google-search-console-beginners-guide',
                'title' => "How to Use Google Search Console: A Beginner's Guide",
                'excerpt' => 'A beginner-friendly walkthrough of Google Search Console — what it tracks, the reports that actually matter, and how to use it to improve your SEO.',
                'image' => 'blogs/google-search-console-guide.webp',
                'date' => 'June 29, 2026',
                'reading_time' => 6,
            ],
            [
                'slug' => 'website-redesign-vs-rebuild',
                'title' => 'Website Redesign vs Rebuilding From Scratch: How to Decide',
                'excerpt' => 'How to decide whether your website needs a redesign or a full rebuild — the signs that point to each option.',
                'image' => null,
                'date' => 'June 29, 2026',
                'reading_time' => 6,
            ],
            [
                'slug' => 'www-vs-non-www-website',
                'title' => 'WWW vs Non-WWW: Which Should You Use for Your Website?',
                'excerpt' => 'A clear explanation of the www vs non-www debate, why it matters for SEO, and how to choose and stick with one consistently.',
                'image' => 'blogs/www-vs-non-www-website.webp',
                'date' => 'June 29, 2026',
                'reading_time' => 6,
            ],
            [
                'slug' => 'laravel-livewire-tutorial-beginners',
                'title' => 'Laravel Livewire Tutorial for Beginners',
                'excerpt' => 'A beginner-friendly introduction to Laravel Livewire — what it is, how it works, and a simple example to get you building dynamic UIs without writing JavaScript.',
                'image' => 'blogs/laravel-livewire-tutorial.webp',
                'date' => 'June 29, 2026',
                'reading_time' => 6,
            ],
            [
                'slug' => 'git-ignoring-gitignore-file-fix',
                'title' => 'How to Fix Git Ignoring Your .gitignore File',
                'excerpt' => 'A complete debugging guide for when Git keeps tracking files that should be ignored — the most common cause, and the exact commands to fix it.',
                'image' => 'blogs/git-gitignore-file-fix.webp',
                'date' => 'June 29, 2026',
                'reading_time' => 6,
            ],
            [
                'slug' => 'google-analytics-4-setup-guide-nepal',
                'title' => 'Google Analytics 4 Setup Guide for Nepali Websites',
                'excerpt' => 'A clear, beginner-friendly walkthrough of setting up Google Analytics 4 on your website, and the reports that actually matter for a small business.',
                'image' => 'blogs/google-analytics-4-setup-nepal.webp',
                'date' => 'June 29, 2026',
                'reading_time' => 6,
            ],
            [
                'slug' => 'php-developer-career-nepal',
                'title' => 'PHP Developer Career & Pay in Nepal: What Actually Affects It',
                'excerpt' => "What actually influences a PHP developer's career growth and pay in Nepal — skills, frameworks, remote work, and how to position yourself for better opportunities.",
                'image' => 'blogs/php-developer-career-pay-nepal.webp',
                'date' => 'June 29, 2026',
                'reading_time' => 6,
            ],
            [
                'slug' => 'top-10-it-companies-in-nepal',
                'title' => 'Top 10 IT Companies in Nepal (2025): The Definitive Guide',
                'excerpt' => "Nepal's IT industry crossed $1 billion in software exports in 2025. Here is your authoritative guide to the top 10 IT companies in Nepal — covering services, technologies, notable clients, and why Nepal is becoming Asia's next major tech hub.",
                'image' => 'blogs/top-10-it-companies-nepal.webp',
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

        $allPosts = collect(self::posts());
        if ($search !== '') {
            $allPosts = $allPosts->filter(fn ($p) => str_contains(strtolower($p['title']), strtolower($search))
                || str_contains(strtolower($p['excerpt']), strtolower($search)));
        }

        $perPage = 5;
        $currentPage = Paginator::resolveCurrentPage();
        $posts = new LengthAwarePaginator(
            $allPosts->forPage($currentPage, $perPage)->values(),
            $allPosts->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

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

    public function laravelPerformanceMistakes()
    {
        return $this->renderPost('laravel-performance-mistakes-nepal');
    }

    public function wordpressVsLaravel()
    {
        return $this->renderPost('wordpress-vs-laravel-nepal');
    }

    public function localSeoSmallBusiness()
    {
        return $this->renderPost('local-seo-small-business-nepal');
    }

    public function googleSearchConsoleGuide()
    {
        return $this->renderPost('google-search-console-beginners-guide');
    }

    public function websiteRedesignVsRebuild()
    {
        return $this->renderPost('website-redesign-vs-rebuild');
    }

    public function wwwVsNonWww()
    {
        return $this->renderPost('www-vs-non-www-website');
    }

    public function laravelLivewireTutorial()
    {
        return $this->renderPost('laravel-livewire-tutorial-beginners');
    }

    public function gitIgnoringGitignoreFix()
    {
        return $this->renderPost('git-ignoring-gitignore-file-fix');
    }

    public function googleAnalytics4Setup()
    {
        return $this->renderPost('google-analytics-4-setup-guide-nepal');
    }

    public function phpDeveloperCareer()
    {
        return $this->renderPost('php-developer-career-nepal');
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
