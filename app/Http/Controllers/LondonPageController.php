<?php

namespace App\Http\Controllers;
use App\Models\LondonPage;

class LondonPageController extends Controller
{
    public function index()
    {
        $londonPageRecords = LondonPage::query()
            ->where('published', true)
            ->orderBy('display_order')
            ->get()
            ->groupBy(fn ($item) => $item->section . '_' . (int) $item->is_card);

        $banner = $londonPageRecords->get('1_0')?->first();
        $strategicHub = $londonPageRecords->get('2_0')?->first();
        $numberIntro = $londonPageRecords->get('3_0')?->first();
        $numberCards = $londonPageRecords->get('3_1', collect());
        $builtForIntro = $londonPageRecords->get('4_0')?->first();
        $builtForCards = $londonPageRecords->get('4_1', collect());
        $whatWeDoIntro = $londonPageRecords->get('5_0')?->first();
        $whatWeDoCards = $londonPageRecords->get('5_1', collect());
        $weServeIntro = $londonPageRecords->get('6_0')?->first();
        $weServeCards = $londonPageRecords->get('6_1', collect());
        $servicesDeliveredIntro = $londonPageRecords->get('7_0')?->first();
        $servicesDeliveredCards = $londonPageRecords->get('7_1', collect());
        $whyUsIntro = $londonPageRecords->get('8_0')?->first();
        $whyUsCards = $londonPageRecords->get('8_1', collect());
        $intgrOrganization = $londonPageRecords->get('9_0')?->first();
        $faqIntro = $londonPageRecords->get('10_0')?->first();
        $faqCards = $londonPageRecords->get('10_1', collect());
        $ctaBottom = $londonPageRecords->get('11_0')?->first();

        return view('client.london-page', compact(
            'banner',
            'strategicHub',
            'numberIntro',
            'numberCards',
            'builtForIntro',
            'builtForCards',
            'whatWeDoIntro',
            'whatWeDoCards',
            'weServeIntro',
            'weServeCards',
            'servicesDeliveredIntro',
            'servicesDeliveredCards',
            'whyUsIntro',
            'whyUsCards',
            'intgrOrganization',
            'faqIntro',
            'faqCards',
            'ctaBottom',
        ));
    }
}