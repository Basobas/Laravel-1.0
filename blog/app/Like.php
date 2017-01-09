<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id', 'image_id', 'like'
    ];

    public $timestams = false;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function image()
    {
        return $this->belongsTo('App\Image');
    }
}
