<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PackagesPage;

class PackagesController extends Controller
{
    public function index()
    {
        $packagesPageRecords = PackagesPage::query()
            ->where('published', true)
            ->orderBy('display_order')
            ->get()
            ->groupBy(fn ($item) => $item->section . '_' . (int) $item->is_card);

        $banner = $packagesPageRecords->get('1_0')?->first();
        $guideIntro = $packagesPageRecords->get('2_0')?->first();
        $guideCards = $packagesPageRecords->get('2_1', collect());
        $packageIntro = $packagesPageRecords->get('3_0')?->first();
        $packageCards = $packagesPageRecords->get('3_1', collect());
        $ctaBanner = $packagesPageRecords->get('4_0')?->first();
        $whatYouGetIntro = $packagesPageRecords->get('5_0')?->first();
        $whatYouGetCards = $packagesPageRecords->get('5_1', collect());
        $faqIntro = $packagesPageRecords->get('6_0')?->first();
        $faqCards = $packagesPageRecords->get('6_1', collect());
        $ctaBannerBottom = $packagesPageRecords->get('7_0')?->first();

        return view('client.packages.index', compact(
            'banner',
            'guideIntro',
            'guideCards',
            'packageIntro',
            'packageCards',
            'ctaBanner',
            'whatYouGetIntro',
            'whatYouGetCards',
            'faqIntro',
            'faqCards',
            'ctaBannerBottom',
        ));
    }

    public function show(PackagesPage $packagesPage)
    {
        $packageRecords = $packagesPage->packages()
            ->where('published', true)
            ->orderBy('display_order')
            ->get()
            ->groupBy(fn ($item) => $item->section . '_' . (int) $item->is_card);

        $banner = $packageRecords->get('1_0')?->first();
        $for = $packageRecords->get('2_0')?->first();
        $serviceIntro = $packageRecords->get('3_0')?->first();
        $serviceCards = $packageRecords->get('3_1', collect());
        $howWeWorkIntro = $packageRecords->get('4_0')?->first();
        $howWeWorkCards = $packageRecords->get('4_1', collect());
        $ctaBannerBottom = $packageRecords->get('5_0')?->first();

        return view('client.packages.show', compact(
            'packagesPage',
            'banner',
            'for',
            'serviceIntro',
            'serviceCards',
            'howWeWorkIntro',
            'howWeWorkCards',
            'ctaBannerBottom',
        ));
    }
}