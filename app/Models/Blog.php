<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'body',
        'author',
        'category_id',
        'excerpt',
        'seoTitle',
        'seoDescription',
        'published',
        'publishedAt',
    ];

    protected $casts = [
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
        return $this->belongsTo(BlogCategory::class);
    }
}
