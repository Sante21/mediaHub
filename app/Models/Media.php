<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    /** @use HasFactory<\Database\Factories\MediaFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'release_year',
        'type',
        'image'
    ];

    // Relations
    public function categories() {
        return $this->belongsToMany(Category::class, 'category_media')->withTimestamps();
    }

    public function collections() {
        return $this->belongsToMany(Collection::class, 'collection_media')->withTimestamps();
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function watchlist() {
        return $this->belongsToMany(User::class, 'watchlist')->withTimestamps();
    }

    public function platforms() {
        return $this->belongsToMany(Platform::class, 'media_platform')->withTimestamps();
    }

    // public function creators() {
    //     return $this->belongsToMany(Creator::class, 'creator_media')->withTimestamps();
    // }
}
