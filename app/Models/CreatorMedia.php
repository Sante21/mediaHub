<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreatorMedia extends Model
{
    /** @use HasFactory<\Database\Factories\CreatorMediaFactory> */
    use HasFactory;

    protected $table = 'creator_media';
}
