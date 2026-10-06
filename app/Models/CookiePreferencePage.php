<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CookiePreferencePage extends Model
{
    use SoftDeletes;

    protected $table = 'cookie_preference_page';

    protected $fillable = [
        'title',
        'description',
        'privacy_policy_text',
        'privacy_policy_url',

        'essential_title',
        'essential_badge',
        'essential_description',

        'analytics_title',
        'analytics_description',

        'reject_button_text',
        'accept_button_text',
        'save_button_text',

        'published',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];
}
