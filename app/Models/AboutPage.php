<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Artisan;

class AboutPage extends Model
{
    use SoftDeletes;

    protected $table = 'about_page';
 
    protected $fillable = [
        'section',
        'is_card',
        'label',
        'title',
        'description',
        'founded',
        'stat_value',
        'stat_title',
        'stat_description',
        'link_text',
        'link_url',
        'button_text',
        'button_url',
        'button1_text',
        'button1_url',
        'button2_text',
        'button2_url',
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
