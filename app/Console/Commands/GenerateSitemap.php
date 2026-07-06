<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Models\Blog;
use App\Models\Work;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Carbon\Carbon;

#[Signature('sitemap:generate')]
#[Description('Generate the XML sitemap')]
class GenerateSitemap extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        $pages = [
            [
                'url' => '/',
                'view' => 'client/home',
                // 'priority' => 1.0,
                // 'frequency' => Url::CHANGE_FREQUENCY_DAILY,
            ],
            [
                'url' => '/about',
                'view' => 'client/about',
            ],
            [
                'url' => '/contact',
                'view' => 'client/contact',
            ],
        ];

        foreach ($pages as $page) {
            $viewPath = resource_path("views/{$page['view']}.blade.php");

            $url = Url::create($page['url'])
                // ->setPriority($page['priority'])
                // ->setChangeFrequency($page['frequency'])
                ;

            if (file_exists($viewPath)) {
                $url->setLastModificationDate(
                    Carbon::createFromTimestamp(filemtime($viewPath))
                );
            }

            $sitemap->add($url);
        }

        Blog::where('published',1)->get()->each(function ($blog) use ($sitemap) {
            $sitemap->add(
                Url::create("/blogs/{$blog->slug}")
                    ->setLastModificationDate($blog->updated_at)
            );
        });

        Work::where('published',1)->get()->each(function ($work) use ($sitemap) {
            $sitemap->add(
                Url::create("/works/{$work->slug}")
                    ->setLastModificationDate($work->updated_at)
            );
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
    }
}
