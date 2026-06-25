<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkGallery extends Model
{
    protected $fillable = [
        'work_id','image',
    ];
    public function work()
    {
        return $this->belongsTo(Work::class);
    }
}
