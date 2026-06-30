<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Popupcontroller;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('/',          [HomeController::class, 'index'])->name('home');
Route::get('/about',     [AboutController::class, 'index'])->name('about');
Route::get('/services',  [ServicesController::class, 'index'])->name('services');
Route::get('/services/seo-social-media-marketing', [ServicesController::class, 'seoSocialMediaMarketing'])->name('services.seo-social-media-marketing');
Route::get('/services/web-development', [ServicesController::class, 'webDevelopment'])->name('services.web-development');
Route::get('/services/app-development', [ServicesController::class, 'appDevelopment'])->name('services.app-development');
Route::get('/services/software-engineering', [ServicesController::class, 'softwareEngineering'])->name('services.software-engineering');
Route::get('/services/api-development', [ServicesController::class, 'apiDevelopment'])->name('services.api-development');
Route::get('/services/e-commerce-development', [ServicesController::class, 'eCommerceDevelopment'])->name('services.e-commerce-development');
Route::get('/services/wordpress-development', [ServicesController::class, 'wordpressDevelopment'])->name('services.wordpress-development');
Route::get('/services/website-redesign-revamp', [ServicesController::class, 'websiteRedesignRevamp'])->name('services.website-redesign-revamp');
Route::get('/services/website-support-maintenance', [ServicesController::class, 'websiteSupportMaintenance'])->name('services.website-support-maintenance');
Route::get('/services/domain-hosting-setup', [ServicesController::class, 'domainHostingSetup'])->name('services.domain-hosting-setup');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{slug}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/seo-checklist-2026-nepal-khotang-lalitpur', [BlogController::class, 'seoChecklist2026'])->name('blog.seo-checklist-2026-nepal-khotang-lalitpur');
Route::get('/blog/top-10-it-companies-in-nepal', [BlogController::class, 'topItCompaniesNepal'])->name('blog.top-10-it-companies-in-nepal');
Route::get('/blog/hire-laravel-developer-in-nepal', [BlogController::class, 'hireLaravelDeveloper'])->name('blog.hire-laravel-developer-in-nepal');
Route::get('/blog/website-cost-in-nepal-2026', [BlogController::class, 'websiteCostInNepal'])->name('blog.website-cost-in-nepal-2026');
Route::get('/blog/seo-pricing-packages-in-nepal', [BlogController::class, 'seoPricingPackages'])->name('blog.seo-pricing-packages-in-nepal');
Route::get('/blog/laravel-performance-mistakes-nepal', [BlogController::class, 'laravelPerformanceMistakes'])->name('blog.laravel-performance-mistakes-nepal');
Route::get('/blog/wordpress-vs-laravel-nepal', [BlogController::class, 'wordpressVsLaravel'])->name('blog.wordpress-vs-laravel-nepal');
Route::get('/blog/local-seo-small-business-nepal', [BlogController::class, 'localSeoSmallBusiness'])->name('blog.local-seo-small-business-nepal');
Route::get('/blog/google-search-console-beginners-guide', [BlogController::class, 'googleSearchConsoleGuide'])->name('blog.google-search-console-beginners-guide');
Route::get('/blog/website-redesign-vs-rebuild', [BlogController::class, 'websiteRedesignVsRebuild'])->name('blog.website-redesign-vs-rebuild');
Route::get('/blog/www-vs-non-www-website', [BlogController::class, 'wwwVsNonWww'])->name('blog.www-vs-non-www-website');
Route::get('/blog/laravel-livewire-tutorial-beginners', [BlogController::class, 'laravelLivewireTutorial'])->name('blog.laravel-livewire-tutorial-beginners');
Route::get('/blog/git-ignoring-gitignore-file-fix', [BlogController::class, 'gitIgnoringGitignoreFix'])->name('blog.git-ignoring-gitignore-file-fix');
Route::get('/blog/google-analytics-4-setup-guide-nepal', [BlogController::class, 'googleAnalytics4Setup'])->name('blog.google-analytics-4-setup-guide-nepal');
Route::get('/blog/php-developer-career-nepal', [BlogController::class, 'phpDeveloperCareer'])->name('blog.php-developer-career-nepal');
Route::get('/sitemap.xml', [BlogController::class, 'sitemap'])->name('sitemap');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/submit-testimonial', [TestimonialController::class, 'create'])->name('testimonial.create');
Route::post('/submit-testimonial', [TestimonialController::class, 'store'])->name('testimonial.store');
Route::get('/contact',   [ContactController::class, 'index'])->name('contact');
Route::post('/contact',  [ContactController::class, 'store'])->name('contact.store');
Route::get('/privacy-policy',    [LegalController::class, 'privacy'])->name('privacy-policy');
Route::get('/terms-conditions',  [LegalController::class, 'terms'])->name('terms-conditions');

Route::post('/tickets',  [TicketController::class, 'store'])->name('tickets.store');

Route::get('/api/popup', [Popupcontroller::class, 'getActivePopup']);
