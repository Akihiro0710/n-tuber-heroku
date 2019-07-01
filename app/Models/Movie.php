<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';

    public function vtuber()
    {
        return $this->belongsTo(Vtuber::class);
    }
}
