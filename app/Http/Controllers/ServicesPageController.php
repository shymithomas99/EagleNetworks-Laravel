<?php

namespace App\Http\Controllers;
use App\Models\ServicesPage;
use App\Models\Work;

class ServicesPageController extends Controller
{
    public function index()
    {
        $servicesPageRecords = ServicesPage::query()
            ->where('published', true)
            ->orderBy('display_order')
            ->get()
            ->groupBy(fn ($item) => $item->section . '_' . (int) $item->is_card);

        $banner = $servicesPageRecords->get('1_0')?->first();
        $serviceIntro = $servicesPageRecords->get('2_0')?->first();
        $serviceCards = $servicesPageRecords->get('2_1', collect());
        $howCreateIntro = $servicesPageRecords->get('3_0')?->first();
        $howCreateCards = $servicesPageRecords->get('3_1', collect());
        $projectIntro = $servicesPageRecords->get('4_0')?->first();
        $projectCards = $servicesPageRecords->get('4_1', collect());
        $howDeliverIntro = $servicesPageRecords->get('5_0')?->first();
        $howDeliverCards = $servicesPageRecords->get('5_1', collect());
        $workIntro = $servicesPageRecords->get('6_0')?->first();
        $workCards = Work::where('published', 1)
            ->where('featured', 1)
            ->whereHas('category', function ($query) {
                $query->where('published', 1);
            })
            ->orderBy('displayOrder', 'asc')
            ->get();
        $ctaBanner = $servicesPageRecords->get('7_0')?->first();
        $faqIntro = $servicesPageRecords->get('8_0')?->first();
        $faqCards = $servicesPageRecords->get('8_1', collect());
        $ctaBannerBottom = $servicesPageRecords->get('9_0')?->first();

        return view('client.services-page', compact(
            'banner',
            'serviceIntro',
            'serviceCards',
            'howCreateIntro',
            'howCreateCards',
            'projectIntro',
            'projectCards',
            'howDeliverIntro',
            'howDeliverCards',
            'workIntro',
            'workCards',
            'ctaBanner',
            'faqIntro',
            'faqCards',
            'ctaBannerBottom',
        ));
    }
}