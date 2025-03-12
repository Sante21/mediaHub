<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryMedia extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryMediaFactory> */
    use HasFactory;

    protected $table = 'category_media';

    protected $fillable = ['media_id', 'category_id'];
}
