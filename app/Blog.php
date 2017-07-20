<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    function blogToTag(){
        return $this->belongsToMany('App\Tag','blogs_tags','blog_id','tag_id');
    }

    function addTag($id){
    	$this->blogToTag()->attach($id);
    }
}
