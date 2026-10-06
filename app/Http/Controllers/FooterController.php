<?php

namespace App\Http\Controllers;
use App\Models\Footer;

class FooterController extends Controller
{
    public function index()
    {
        $footerRecords = Footer::query()
            ->where('published', true)
            ->orderBy('display_order')
            ->get()
            ->groupBy(fn ($item) => $item->section . '_' . (int) $item->is_card);

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

        return view('client.footer', compact(
            'companyblurb',
            'companyIntro',
            'companyLinks',
            'london',
            'accra',
            'connectIntro',
            'connectLinks',
            'legalIntro',
            'legalLinks',
            'newsletter',
            'copyright'
        ));
    }
}