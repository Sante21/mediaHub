<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionMedia extends Model
{
    /** @use HasFactory<\Database\Factories\CollectionMediaFactory> */
    use HasFactory;

    protected $table = 'collection_media';

    protected $fillable = ['collection_id', 'media_id'];
}
