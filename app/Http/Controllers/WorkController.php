<?php

namespace App\Http\Controllers;

use App\Models\VideoProject;
use App\Models\Work;
use App\Models\WorkCategory;
use App\Models\WorkPage;

class WorkController extends Controller
{
    public function index()
    {
        $workPageRecords = WorkPage::query()
            ->where('published', true)
            ->orderBy('display_order')
            ->get()
            ->groupBy(fn ($item) => $item->section . '_' . (int) $item->is_card);

        $banner = $workPageRecords->get('1_0')?->first();
        $processIntro = $workPageRecords->get('2_0')?->first();
        $processCards = $workPageRecords->get('2_1', collect());
        $workIntro = $workPageRecords->get('3_0')?->first();
        $workCategories = WorkCategory::where('published', 1)->get();
        $workCards = Work::where('published', 1)
                        ->where('featured', 1)
                        ->whereHas('category', function ($query) {
                            $query->where('published', 1);
                        })
                        ->orderBy('displayOrder')
                        ->get();
        $projectIntro = $workPageRecords->get('4_0')?->first();
        $projectCards = $workPageRecords->get('4_1', collect());
        $videoIntro = $workPageRecords->get('5_0')?->first();
        $videoCards = VideoProject::where('published', 1)
                    ->whereHas('category', function ($query) {
                        $query->where('published', 1);
                    })
                    ->orderBy('display_order', 'asc')
                    ->limit(4)
                    ->get();
        $videoCount = VideoProject::where('published', 1)
                        ->whereHas('category', function ($query) {
                            $query->where('published', 1);
                        })->count();
        $ctaBannerBottom = $workPageRecords->get('6_0')?->first();

        return view('client.work', compact(
            'banner',
            'processIntro',
            'processCards',
            'workIntro',
            'workCategories',
            'workCards',
            'projectIntro',
            'projectCards',
            'videoIntro',
            'videoCards',
            'videoCount',
            'ctaBannerBottom',
        ));
    }
}