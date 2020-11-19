<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id','title','category_id','body','picture'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}