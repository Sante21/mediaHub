<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    /** @use HasFactory<\Database\Factories\WatchlistFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'media_id',
        'status',
    ];

    // Relations
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function media() {
        return $this->belongsTo(Media::class);
    }

}
