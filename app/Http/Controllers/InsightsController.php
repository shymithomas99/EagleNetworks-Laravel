<?php

namespace App\Http\Controllers;

use App\Enums\BlogContentType;
use App\Models\Author;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\InsightsPage;

class InsightsController extends Controller
{
    public function index()
    {
        $insightsPageRecords = InsightsPage::query()
            ->where('published', true)
            ->orderBy('display_order')
            ->get()
            ->groupBy(fn ($item) => $item->section . '_' . (int) $item->is_card);

        $banner = $insightsPageRecords->get('1_0')?->first();
        $today = now()->toDateString();
        $blogs = Blog::with([
                'author'
                ])
                ->whereHas('category', function ($query) {
                    $query->where('published', true);
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
                ->latest()
                ->get();
        $categories = BlogCategory::where('published', true)
                    ->orderByDesc('id')
                    ->get();
        $contentTypes = BlogContentType::cases();
        $follow = $insightsPageRecords->get('3_0')?->first();

        return view('client.insights.index', compact(
            'banner',
            'blogs',
            'categories',
            'contentTypes',
            'follow',
        ));
    }

    public function show(Blog $blog)
    {
        $today = now()->startOfDay();

        $publishDate = $blog->publish_date
            ? \Carbon\Carbon::parse($blog->publish_date)->startOfDay()
            : null;

        $expiryDate = $blog->expiry_date
            ? \Carbon\Carbon::parse($blog->expiry_date)->startOfDay()
            : null;

        $dateRangeActive =
            ($publishDate || $expiryDate)
            && (!$publishDate || $today->gte($publishDate))
            && (!$expiryDate || $today->lte($expiryDate));

        $isPublished = $blog->published || $dateRangeActive;

        abort_unless(
            $isPublished &&
            $blog->category()->where('published', true)->exists(),
            404
        );

        $blog->load([
            'author',
            'category',
        ]);

        return view('client.insights.show', compact('blog'));
    }

    public function author(Author $author)
    {
        $today = now()->startOfDay();
        $author->load([
            'blogs' => function ($query) use ($today) {
                $query
                    ->whereHas('category', function ($query) {
                        $query->where('published', true);
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
                    ->latest();
            },
        ]);

        return view('client.insights.author', compact('author'));
    }
}