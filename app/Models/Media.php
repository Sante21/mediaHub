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
        return $this->belongsToMany(Category::class);
    }

    public function collections() {
        return $this->belongsToMany(Collection::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function watchlist() {
        return $this->belongsToMany(User::class);
    }

    public function platforms() {
        return $this->belongsToMany(Platform::class);
    }
}
