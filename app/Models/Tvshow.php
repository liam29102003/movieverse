<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tvshow extends Model
{
    use HasFactory;
    protected $fillable=[
        'tvshows_name',
        'category_id',
        'poster',
        'background',
        'rating',
        'complete',
        'cast',
        'trending',

        'director',
        'award',
        'release_date',
        'language',
        'trailer',
        'review',

    ];
}
