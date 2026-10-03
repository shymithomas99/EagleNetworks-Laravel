<?php

namespace App\Http\Controllers;
use App\Models\ContactPage;

class ContactPageController extends Controller
{
    public function index()
    {
        $contactPageRecords = ContactPage::query()
            ->where('published', true)
            ->orderBy('display_order')
            ->get()
            ->groupBy(fn ($item) => $item->section . '_' . (int) $item->is_card);

        $banner = $contactPageRecords->get('1_0')?->first();
        $formIntro = $contactPageRecords->get('2_0')?->first();
        $officeIntro = $contactPageRecords->get('3_0')?->first();
        $offices = $contactPageRecords->get('3_1', collect());
        $faqIntro = $contactPageRecords->get('4_0')?->first();
        $faqs = $contactPageRecords->get('4_1', collect());
        $follow = $contactPageRecords->get('5_0')?->first();

        return view('client.contact-page', compact(
            'banner',
            'formIntro',
            'officeIntro',
            'offices',
            'faqIntro',
            'faqs',
            'follow'
        ));
    }
}