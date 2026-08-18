<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Artisan;

class VideoProject extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(VideoCategory::class);
    }

    protected static function booted()
    {
        // When saved
        static::saved(function ($videoProject) {
            if (
                !empty($videoProject->slug) &&
                (
                    $videoProject->wasRecentlyCreated ||
                    $videoProject->wasChanged([
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