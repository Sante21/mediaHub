<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaPlatform extends Model
{
    /** @use HasFactory<\Database\Factories\MediaPlatformFactory> */
    use HasFactory;

    protected $table = 'media_platform';

    protected $fillable = ['media_id', 'platform_id'];
}
