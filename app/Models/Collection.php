<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    /** @use HasFactory<\Database\Factories\CollectionFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
    ];

    // Relations
    public function users() {
        return $this->belongsTo(User::class);
    }

    public function medias() {
        return $this->belongsToMany(Media::class, 'collection_media')->withTimestamps();
    }
}
