<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Image extends Model
{


    protected $fillable = [
        'user_id', 'name', 'author', 'details', 'image_url', 'likes', 'image_id', 'active'
    ];

    //Zorgt voor connectie met database table
    protected $table = 'images';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }


}
