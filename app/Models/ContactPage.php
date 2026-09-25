<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Artisan;

class ContactPage extends Model
{
    use SoftDeletes;

    protected $table = 'contact_page';
 
    protected $fillable = [
        'section',
        'is_card',
        'label',
        'title',
        'description',
        'tag_1',
        'tag_2',
        'tag_3',
        'location',
        'company_name',
        'address',
        'phone_1',
        'phone_2',
        'email',
        'map_url',
        'button_text',
        'button_url',
        'instagram',
        'linkedin',
        'x',
        'tiktok',
        'youtube',
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
