<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Artisan;

class PrivacyPolicyPage extends Model
{
    use SoftDeletes;

    protected $table = 'privacy_policy_page';

    protected $fillable = [
        'section',
        'is_card',
        'intro',
        'label',
        'title',
        'description',
        'meta_description',
        'additional_description',
        'location',
        'serving',
        'primary_focus',
        'key_offerings',
        'key_points',
        'content_blocks',
        'quote',
        'quote_author',
        'button_text',
        'button_url',
        'button_text_2',
        'button_url_2',
        'button_text_3',
        'button_url_3',
        'effective_date',
        'data_controller',
        'regulatory_framework',
        'footer_text',
        'menu_items',
        'published',
        'display_order',
    ];

    protected $casts = [
        'is_card' => 'boolean',
        'published' => 'boolean',
        'content_blocks' => 'array',
        'menu_items' => 'array',
    ];

    protected static function booted()
    {
        // When saved (created or updated)
        static::saved(function ($package) {
            if (
                $package->wasRecentlyCreated ||
                $package->wasChanged([
                    'updated_at',
                ])
            ) {
                Artisan::call('sitemap:generate');
            }
        });

        // When soft deleted
        static::deleted(function () {
            Artisan::call('sitemap:generate');
        });
    }
}