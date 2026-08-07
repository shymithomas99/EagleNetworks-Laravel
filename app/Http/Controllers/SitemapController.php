<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\VideoProject;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = Sitemap::create();

        // Static pages
        $staticPages = [
            '/',
            '/about',
            '/accra',
            '/amplify',
            '/connect',
            '/details',
            '/ignite',
            '/london',
            '/packages',
            '/privacy-policy',
            '/services',
            '/terms-of-use',
            '/contact',
            '/work',
            '/media',
        ];

        foreach ($staticPages as $page) {
            $sitemap->add(
                Url::create(url($page))

            );
        }

        // Blogs
        $blogs = Blog::where('published', 1)
            ->whereNotNull('publishedAt')
            ->get();

        foreach ($blogs as $blog) {
            $sitemap->add(
                Url::create(url('/blog/' . $blog->slug))
                    ->setLastModificationDate($blog->updated_at)

            );
        }

        // Videos
        $videos = VideoProject::all();

        foreach ($videos as $video) {
            $sitemap->add(
                Url::create(url('/media/' . $video->slug))
                    ->setLastModificationDate($video->updated_at)

            );
        }

        return $sitemap->toResponse(request());
    }
}