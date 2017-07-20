<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Tag;

class BlogController extends Controller
{
	function listItems(){
		$blogs = Blog::all();
		$tags = Tag::all();

		return view('blog',compact('blogs','tags'));
	}   

	function addTag($id, Request $request){
		$blog = Blog::find($id)->addTag($request->tagChoice);

        return redirect('/');
	}

	function listBlogs($id){
		$tag = Tag::find($id);
		
		return view('getblogs', compact('tag'));
	}
}
