<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Artisan;

class Package extends Model
{
    use SoftDeletes;
 
    protected $fillable = [
        'packages_page_id',
        'section',
        'is_card',
        'title',
        'additional_title',
        'description',
        'button1_text',
        'button1_url',
        'button2_text',
        'button2_url',
        'key_points',
        'email',
        'website',
        'linkedin',
        'published',
        'display_order',
    ];

    protected $casts = [
        'is_card' => 'boolean',
        'published' => 'boolean',
    ];
 
    protected static function booted()
    {
        // When saved (created or updated)
        static::saved(function ($package) {
            if ($package->wasRecentlyCreated ||
                    $package->wasChanged([
                        'updated_at',
                    ])) {
                Artisan::call('sitemap:generate');
            }
        });
 
        // When soft deleted
        static::deleted(function () {
            Artisan::call('sitemap:generate');
        });
    }
}
