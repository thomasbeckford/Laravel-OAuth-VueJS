<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
 
    protected $table = 'books';
    public $timestamps = false;
    protected $guarded = [];

}

