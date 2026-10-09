<?php

namespace App\Providers;

use App\Models\CookiePreferencePage;
use App\Models\Footer;
use App\Models\Seo;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('includes.website.footer', function ($view) {

            $cookiePage = CookiePreferencePage::where('published', 1)->first();
            $footerRecords = Footer::query()
                ->where('published', true)
                ->orderBy('display_order')
                ->get()
                ->groupBy(fn($item) => $item->section . '_' . (int) $item->is_link);

            $companyblurb = $footerRecords->get('1_0')?->first();

            $companyIntro = $footerRecords->get('2_0')?->first();
            $companyLinks = $footerRecords->get('2_1', collect());

            $london = $footerRecords->get('3_0')?->first();
            $accra = $footerRecords->get('4_0')?->first();

            $connectIntro = $footerRecords->get('5_0')?->first();
            $connectLinks = $footerRecords->get('5_1', collect());

            $legalIntro = $footerRecords->get('6_0')?->first();
            $legalLinks = $footerRecords->get('6_1', collect());

            $newsletter = $footerRecords->get('7_0')?->first();

            $copyright = $footerRecords->get('8_0')?->first();

            $view->with([
                'cookiePage' => $cookiePage,
                'companyblurb' => $companyblurb,
                'companyIntro' => $companyIntro,
                'companyLinks' => $companyLinks,
                'london' => $london,
                'accra' => $accra,
                'connectIntro' => $connectIntro,
                'connectLinks' => $connectLinks,
                'legalIntro' => $legalIntro,
                'legalLinks' => $legalLinks,
                'newsletter' => $newsletter,
                'copyright' => $copyright,
            ]);
        });

        View::composer('layouts.appweb', function ($view) {
            $path = '/' . ltrim(request()->path(), '/');

            if ($path === '/.') {
                $path = '/';
            }

            $seo = Seo::where('page_url', $path)->first();

            $view->with('seo', $seo);
        });
    }
}