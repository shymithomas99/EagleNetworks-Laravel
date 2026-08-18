<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Artisan;

class Author extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'designation',
        'about',
        'image'
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'author_id', 'id');
    }

    protected static function booted()
    {
        // When saved
        static::saved(function ($author) {
            if (
                !empty($author->slug) &&
                (
                    $author->wasRecentlyCreated ||
                    $author->wasChanged([
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
}
