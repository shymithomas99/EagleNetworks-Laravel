<?php

namespace App\Models;

use App\Enums\SocialMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Artisan;

class Footer extends Model
{
    use SoftDeletes;

    protected $table = 'footer';
 
    protected $fillable = [
        'section',
        'is_link',
        'text',
        'company_name',
        'address',
        'phone_1',
        'phone_2',
        'email',
        'social_media',
        'link_type',
        'url',
        'description',
        'privacy_text',
        'published',
        'display_order',
    ];

    protected $casts = [
        'is_link' => 'boolean',
        'published' => 'boolean',
        'social_media' => SocialMedia::class,
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
