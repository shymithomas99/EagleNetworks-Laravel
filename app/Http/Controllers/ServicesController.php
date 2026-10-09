<?php

namespace App\Http\Controllers;
use App\Models\ServicesPage;
use App\Models\Work;

class ServicesController extends Controller
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
        $today = now()->toDateString();
        $workCards = Work::where('featured', 1)
            ->whereHas('category', function ($query) {
                $query->where('published', 1);
            })
            ->where(function ($query) use ($today) {
                // Published manually
                $query->where('published', 1)
                    // OR date range is active
                    ->orWhere(function ($query) use ($today) {
                        // At least one date must be provided
                        $query->where(function ($query) {
                            $query->whereNotNull('publish_date')
                                ->orWhereNotNull('expiry_date');
                        })
                        // Publish date: NULL or today/on/before
                        ->where(function ($query) use ($today) {
                            $query->whereNull('publish_date')
                                ->orWhereDate('publish_date', '<=', $today);
                        })
                        // Expiry date: NULL or today/on/after
                        ->where(function ($query) use ($today) {
                            $query->whereNull('expiry_date')
                                ->orWhereDate('expiry_date', '>=', $today);
                        });
                    });
            })
            ->orderBy('displayOrder', 'asc')
            ->get();
        $ctaBanner = $servicesPageRecords->get('7_0')?->first();
        $faqIntro = $servicesPageRecords->get('8_0')?->first();
        $faqCards = $servicesPageRecords->get('8_1', collect());
        $ctaBannerBottom = $servicesPageRecords->get('9_0')?->first();

        return view('client.services', compact(
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