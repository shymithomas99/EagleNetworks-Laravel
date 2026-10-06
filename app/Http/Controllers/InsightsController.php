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
        $blogs = Blog::with([
                'author'
                ])
                ->where('published', true)
                ->whereHas('category', function ($query) {
                    $query->where('published', true);
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
        abort_unless(
            $blog->published &&
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
        $author->load([
            'blogs' => function ($query) {
                $query
                    ->where('published', true)
                    ->whereHas('category', function ($query) {
                        $query->where('published', true);
                    })
                    ->latest();
            },
        ]);

        return view('client.insights.author', compact('author'));
    }
}