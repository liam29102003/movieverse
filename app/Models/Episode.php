<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $fillable=[
        'episodes_name',
        'tvshows_id',
        'anime_id',
        'runtime',
        'rating',
        'review'
    ];
}
