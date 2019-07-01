<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vtuber extends Model
{
    protected $table = 'vtubers';

    function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
