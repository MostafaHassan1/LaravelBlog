<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class BlogController extends Controller
{
    public function getSingle($slug){
       $post= Post::where('slug','=',$slug)->first();
        return json_encode($post);
       // return view ('Blog.single')->with('post',$post);
    }
    public function getIndex(){
        $posts=Post::paginate(10);
        return view ('Blog.index')->with('posts',$posts);
    }
}
