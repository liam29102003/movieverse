<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TvshowCategory extends Model
{
    use HasFactory;
    protected $fillable =[
        'tvshowCategory_id',
        'tvshowCategory_name',
    ];
}
