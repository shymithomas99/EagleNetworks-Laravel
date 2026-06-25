<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
