<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    /** @use HasFactory<\Database\Factories\CreatorFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
    ];


    // Relations
    public function media() {
        return $this->belongsToMany(Media::class, 'creator_media')->withTimestamps();
    }
}
