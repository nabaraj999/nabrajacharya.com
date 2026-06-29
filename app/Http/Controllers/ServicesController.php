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

    public function seoSocialMediaMarketing()
    {
        return $this->renderService('seo-social-media-marketing');
    }

    public function webDevelopment()
    {
        return $this->renderService('web-development');
    }

    public function appDevelopment()
    {
        return $this->renderService('app-development');
    }

    public function softwareEngineering()
    {
        return $this->renderService('software-engineering');
    }

    public function apiDevelopment()
    {
        return $this->renderService('api-development');
    }

    public function eCommerceDevelopment()
    {
        return $this->renderService('e-commerce-development');
    }

    public function wordpressDevelopment()
    {
        return $this->renderService('wordpress-development');
    }

    public function websiteRedesignRevamp()
    {
        return $this->renderService('website-redesign-revamp');
    }

    public function websiteSupportMaintenance()
    {
        return $this->renderService('website-support-maintenance');
    }

    public function domainHostingSetup()
    {
        return $this->renderService('domain-hosting-setup');
    }

    private function renderService(string $slug)
    {
        $personal      = Personal::first();
        $seo           = Seo::where('page_name', 'services')->first();
        $otherServices = Service::where('is_active', true)->where('slug', '!=', $slug)->get();

        return view('pages.services.' . $slug, compact('personal', 'seo', 'otherServices'));
    }
}
