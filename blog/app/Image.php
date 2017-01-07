<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'user_id', 'name', 'author', 'details', 'image_url'
    ];


    public $timestams = false;

    //Zorgt voor connectie met database table
    protected $table = 'images';
}
