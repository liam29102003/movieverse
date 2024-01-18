<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;
    protected $fillable=[
        'movies_name',
        'category_id',
        'poster',
        'background',
        'genre',
        'rating',
        'trending',

        'cast',
        'director',
        'award',
        'quality',
        'release_date',
        'runtime',
        'language',
        'trailer',
        'review',

    ];
}
