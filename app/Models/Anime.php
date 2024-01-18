<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;
    protected $fillable=[
        'anime_name',
        'category_id',
        'poster',
        'background',
        'rating',
        'trending',
        'complete',
        'cast',
        'director',
        'award',
        'release_date',
        'language',
        'trailer',
        'review',

    ];
}
