<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Artisan;

class Work extends Model
{
    
    use SoftDeletes;
    protected $fillable = [
        'cover_title',
        'cover_description',
        'core_service_1',
        'core_service_2',
        'title',
        'slug',
        'clientName',
        'category_id',
        'coverImageUrl',
        'coverImageKey',
        'heroImageUrl',
        'heroImageKey',
        'excerpt',
        'servicesDelivered',
        'industry',
        'projectYear',
        'brief',
        'approach',
        'results',
        'keyMetrics',
        'testimonial',
        'testimonialAuthor',
        'additionalContent',
        'featured',
        'published',
        'displayOrder',
        'coverImage',
        'featuredImage',
        'seoTitle',
        'seoDescription',
        'publishedAt',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'published' => 'boolean',
        'publishedAt' => 'datetime',
    ];

    protected static function booted()
    {
        // When creating
        static::creating(function ($work) {
            if ($work->published) {
                $work->publishedAt = now();
            }
        });

        // When updating
        static::updating(function ($work) {
            // check if 'published' field changed
            if ($work->isDirty('published')) {

                // false → true
                if ($work->published) {
                    $work->publishedAt = now();
                }

                // true → false (unpublish)
                else {
                    $work->publishedAt = null;
                }
            }
        });

        // When saved
        static::saved(function ($work) {
            if (
                !empty($work->slug) &&
                (
                    $work->wasRecentlyCreated ||
                    $work->wasChanged([
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
        return $this->belongsTo(WorkCategory::class);
    }

    public function galleryImages()
    {
        return $this->hasMany(WorkGallery::class);
    }
}
