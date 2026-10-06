<?php

namespace App\Http\Controllers;
use App\Models\AccraPage;

class AccraController extends Controller
{
    public function index()
    {
        $accraPageRecords = AccraPage::query()
            ->where('published', true)
            ->orderBy('display_order')
            ->get()
            ->groupBy(fn ($item) => $item->section . '_' . (int) $item->is_card);

        $banner = $accraPageRecords->get('1_0')?->first();
        $strategicHub = $accraPageRecords->get('2_0')?->first();
        $numberIntro = $accraPageRecords->get('3_0')?->first();
        $numberCards = $accraPageRecords->get('3_1', collect());
        $builtForIntro = $accraPageRecords->get('4_0')?->first();
        $builtForCards = $accraPageRecords->get('4_1', collect());
        $whatWeDoIntro = $accraPageRecords->get('5_0')?->first();
        $whatWeDoCards = $accraPageRecords->get('5_1', collect());
        $weServeIntro = $accraPageRecords->get('6_0')?->first();
        $weServeCards = $accraPageRecords->get('6_1', collect());
        $whyUsIntro = $accraPageRecords->get('7_0')?->first();
        $whyUsCards = $accraPageRecords->get('7_1', collect());
        $intgrOrganization = $accraPageRecords->get('8_0')?->first();
        $howDeliverIntro = $accraPageRecords->get('9_0')?->first();
        $howDeliverCards = $accraPageRecords->get('9_1', collect());
        $faqIntro = $accraPageRecords->get('10_0')?->first();
        $faqCards = $accraPageRecords->get('10_1', collect());
        $ctaBottom = $accraPageRecords->get('11_0')?->first();

        return view('client.accra', compact(
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
            'whyUsIntro',
            'whyUsCards',
            'intgrOrganization',
            'howDeliverIntro',
            'howDeliverCards',
            'faqIntro',
            'faqCards',
            'ctaBottom',
        ));
    }
}