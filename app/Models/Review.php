<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'media_id',
        'rating',
        'comment',
    ];

    // Relations
    public function media()
    {
        return $this->belongsTo(Media::class);
    }

    public function user()
    {
    return $this->belongsTo(User::class);
    }

}
