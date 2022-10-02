<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimeCategory extends Model
{
    use HasFactory;
    protected $fillable =[
        'animeCategory_id',
        'animeCategory_name',
    ];
}
