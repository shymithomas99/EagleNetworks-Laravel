<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'published',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id', 'id');
    }
}
