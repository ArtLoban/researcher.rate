<?php

namespace App\Models\MoviePoster;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'poster_path',
        'date',
        'time'
    ];
}
