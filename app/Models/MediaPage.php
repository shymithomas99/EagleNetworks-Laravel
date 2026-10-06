<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaPage extends Model
{
    use SoftDeletes;

    protected $table = 'media_pages';

    protected $fillable = [
        'section',

        'label',
        'title',
        'description',
        'additional_description',

        'button_text',
        'button_url',

        'button_text_2',
        'button_url_2',

        'button_text_3',
        'button_url_3',

        'published',
        'display_order',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];
}