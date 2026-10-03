<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Artisan;

class HomePage extends Model
{
    use SoftDeletes;

    protected $table = 'home_page';
 
    protected $fillable = [
        'section',
        'is_card',
        'label',
        'image',
        'title',
        'description',
        'tag_1',
        'tag_2',
        'tag_3',
        'additional_description',
        'rating',
        'testimonial',
        'client_name',
        'cta_title',
        'cta_description',
        'cta_button_text',
        'cta_button_url',
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
