<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Artisan;

class ServicesPage extends Model
{
    use SoftDeletes;

    protected $table = 'services_page';
 
    protected $fillable = [
        'section',
        'is_card',
        'short_title',
        'title',
        'description',
        'image',
        'button1_text',
        'button1_url',
        'button2_text',
        'button2_url',
        'link_text',
        'link_url',
        'key_services',
        'key_points',
        'published',
        'featured',
        'display_order'
    ];
 
    protected $casts = [
        'is_card' => 'boolean',
        'published' => 'boolean',
        'featured'  => 'boolean',
    ];
 
    protected static function booted()
    {
        // When saved (created or updated)
        static::saved(function ($service) {
            if ($service->wasRecentlyCreated ||
                    $service->wasChanged([
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
