<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    function tagToBlog(){
        return $this->belongsToMany('App\Blog','blogs_tags','tag_id','blog_id');
    }
}
