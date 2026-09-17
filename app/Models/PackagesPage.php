<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Artisan;

class PackagesPage extends Model
{
    use SoftDeletes;

    protected $table = 'packages_page';
 
    protected $fillable = [
        'section',
        'is_card',
        'title',
        'support_title',
        'short_title',
        'description',
        'support_description',
        'button_text',
        'button_url',
        'key_services',
        'email',
        'website',
        'linkedin',
        'published',
        'featured',
        'most_popular',
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

    public function packages()
    {
        return $this->hasMany(Package::class, 'packages_page_id', 'id');
    }
}
