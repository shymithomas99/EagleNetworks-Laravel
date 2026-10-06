<?php

namespace App\Http\Controllers;
use App\Models\AboutPage;

class AboutController extends Controller
{
    public function index()
    {
        $aboutPageRecords = AboutPage::query()
        ->where('published', true)
        ->orderBy('display_order')
        ->get()
        ->groupBy(fn ($item) => $item->section . '_' . (int) $item->is_card);

        $banner = $aboutPageRecords->get('1_0')?->first();
        $story = $aboutPageRecords->get('2_0')?->first();
        $milestoneIntro = $aboutPageRecords->get('3_0')?->first();
        $milestones = $aboutPageRecords->get('3_1', collect());
        $valueIntro = $aboutPageRecords->get('4_0')?->first();
        $values = $aboutPageRecords->get('4_1', collect());
        $clientIntro = $aboutPageRecords->get('5_0')?->first();
        $clients = $aboutPageRecords->get('5_1', collect());
        $officeIntro = $aboutPageRecords->get('6_0')?->first();
        $offices = $aboutPageRecords->get('6_1', collect());
        $processIntro = $aboutPageRecords->get('7_0')?->first();
        $processes = $aboutPageRecords->get('7_1', collect());
        $engagementIntro = $aboutPageRecords->get('8_0')?->first();
        $engagements = $aboutPageRecords->get('8_1', collect());
        $commitmentIntro = $aboutPageRecords->get('9_0')?->first();
        $commitments = $aboutPageRecords->get('9_1', collect());
        $proofSignalIntro = $aboutPageRecords->get('10_0')?->first();
        $proofSignals = $aboutPageRecords->get('10_1', collect());
        $ctaBannerBottom = $aboutPageRecords->get('11_0')?->first();

        return view('client.about', compact(
            'banner',
            'story',
            'milestoneIntro',
            'milestones',
            'valueIntro',
            'values',
            'clientIntro',
            'clients',
            'officeIntro',
            'offices',
            'processIntro',
            'processes',
            'engagementIntro',
            'engagements',
            'commitmentIntro',
            'commitments',
            'proofSignalIntro',
            'proofSignals',
            'ctaBannerBottom'
        ));
    }
}