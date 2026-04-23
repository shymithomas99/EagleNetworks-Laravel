<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkCategory extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'published',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    public function works()
    {
        return $this->hasMany(Work::class, 'category_id', 'id');
    }
}