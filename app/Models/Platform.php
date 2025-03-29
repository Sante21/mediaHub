<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    /** @use HasFactory<\Database\Factories\PlatformFactory> */
    use HasFactory;

    protected $fillable = [
        'name', 'image'
    ];

    // Relations
    public function media() {
        return $this->belongsToMany(Media::class, 'media_platform')->withTimestamps();
    }

}
