<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $fillable = ['title', 'author', 'pub_date', 'image'];
}