<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Carbon;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function getThumbnailAttribute($value)
    {
        return $value?Storage::url($value):null;
    }

    public function getCreatedAtAttribute($date)
    {
        $date = Carbon\Carbon::parse($date);
        return $date->format('Y-m-d H:i');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
