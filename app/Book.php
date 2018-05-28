<?php

namespace App;

class Book extends Model
{
    // Table
    protected $table = 'books';

    // Primary Key
    public $primary_key = 'id';

    // Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App/User');
    }
}
