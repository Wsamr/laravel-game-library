<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /** @use HasFactory<\Database\Factories\GameFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'poster_image',
        'cover_image',
        'epic_link',
        'steam_link',
        'rating',
        'color',
    ];

    public function collections()
    {
        return $this->belongsTo(Collection::class);
    }
}
