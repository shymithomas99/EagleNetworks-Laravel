<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Artisan;

class AccraPage extends Model
{
    use SoftDeletes;

    protected $table = 'accra_page';
 
    protected $fillable = [
        'section',
        'is_card',
        'intro',
        'label',
        'title',
        'description',
        'additional_description',
        'location',
        'serving',
        'primary_focus',
        'key_offerings',
        'key_points',
        'button_text',
        'button_url',
        'published',
        'display_order'
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
