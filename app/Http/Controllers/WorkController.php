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
        $today = now()->toDateString();
        $workCards = Work::whereHas('category', function ($query) {
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
                        ->orderBy('displayOrder')
                        ->get();
        $projectIntro = $workPageRecords->get('4_0')?->first();
        $projectCards = $workPageRecords->get('4_1', collect());
        $videoIntro = $workPageRecords->get('5_0')?->first();
        $videoCards = VideoProject::where('published', 1)
                    ->where('featured', 1)
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

        return view('client.works.index', compact(
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


    public function show($slug)
    {
        $today = now()->toDateString();

        $work = Work::with('galleries')
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
            ->where('slug', $slug)
            ->firstOrFail();

        return view('client.works.show', compact('work'));
    }
}