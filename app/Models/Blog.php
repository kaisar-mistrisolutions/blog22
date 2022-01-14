<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
}
