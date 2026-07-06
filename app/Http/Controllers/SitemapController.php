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
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority($page == '/' ? 1.0 : 0.8)
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
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.7)
            );
        }

        // Videos
        $videos = VideoProject::all();

        foreach ($videos as $video) {
            $sitemap->add(
                Url::create(url('/media/' . $video->slug))
                    ->setLastModificationDate($video->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.6)
            );
        }

        return $sitemap->toResponse(request());
    }
}
