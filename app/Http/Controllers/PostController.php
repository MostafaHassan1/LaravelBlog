<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    //Lock down the post if the user is not logged in
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::orderBy('id','desc')->paginate(10);

        return view ('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $categories=Category::all();
            $tags=Tag::all();
            return view ('Posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $this -> validate($request,array(
            'title' => 'required|max:255',
            'body'  =>'required',
            'category_id'=>'required|integer',
            'slug'=> 'required|alpha_dash|min:5|max:255|unique:posts,slug'
       ));

       $post = new Post;
       $post->title=$request->title;
       $post->body=$request->body;
       $post->slug=$request->slug;
       $post->category_id=$request->category_id;


       $post->save();

       $post->tags()->sync($request->tags,false);
       $request->session()->flash('success', 'The post was Saved');
       return redirect()->route('posts.show',$post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view ('Posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories= Category::all();
        $cats=array();
        foreach ($categories as $cate){
            $cats[$cate->id]=$cate->name;
        }
        $tags=Tag::all();
        $tags2=array();
        foreach ($tags as $tag) {
            $tags2[$tag->id]=$tag->name;
        }
        return view ('posts.edit')->with('post',$post)->withCategories($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::find($id);
        if($request->slug==$post->slug){
            $this -> validate($request,array(
                'title' => 'required|max:255', //validates
                'category_id' =>'required|integer',
                'body'  =>'required',
              
           ));
        }
        else{
        $this -> validate($request,array(
            'title' => 'required|max:255', //validates
            'body'  =>'required',
            'category_id' =>'required|integer',

            'slug'=> 'required|alpha_dash|min:5|max:255|unique:posts,slug'
       ));
             }
       $post->title=$request->title;      
       $post->body=$request->input('body');
       $post->slug=$request->input('slug');
       $post->category_id=$request->category_id;
       $post->save();

if(isset($request->tags)){

       $post->tags()->sync($request->tags,true);
}
else {
    $post->tags()->sync(array());
}

       $request->session()->flash('success', 'The post was Edited');
       return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        $post->tags()->detach();
        
        $post->destroy($id);



        session()->flash('success', 'The post was Deleted');
        return redirect()->route('posts.index');
    }
}
