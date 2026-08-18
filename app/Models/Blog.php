<?php

namespace App\Models;

use App\Enums\BlogContentType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Artisan;

class Blog extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'url',
        'slug',
        'body',
        'author_id',
        'category_id',
        'content_type',
        'excerpt',
        'coverImage',
        'seoTitle',
        'seoDescription',
        'published',
        'publishedAt',
    ];

    // protected $casts = [
    //     'published' => 'boolean',
    //     'publishedAt' => 'datetime',
    // ];

    protected function casts(): array
    {
        return [
            'content_type' => BlogContentType::class,
            'published' => 'boolean',
            'publishedAt' => 'datetime',
        ];
    }


    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    /**
     * Blog belongs to a category.
     */


    protected static function booted()
    {
        // When creating
        static::creating(function ($blog) {
            if ($blog->published) {
                $blog->publishedAt = now();
            }
        });

        // When updating
        static::updating(function ($blog) {
            // check if 'published' field changed
            if ($blog->isDirty('published')) {

                // false → true
                if ($blog->published) {
                    $blog->publishedAt = now();
                }

                // true → false (unpublish)
                else {
                    $blog->publishedAt = null;
                }
            }
        });

        // When saved
        static::saved(function ($blog) {
            if (
                !empty($blog->slug) &&
                (
                    $blog->wasRecentlyCreated ||
                    $blog->wasChanged([
                        'updated_at',
                    ])
                )
            ) {
                Artisan::call('sitemap:generate');
            }
        });

        // When deleted
        static::deleted(function () {
            Artisan::call('sitemap:generate');
        });
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
}