@extends('main')
@section('title')
    Blog
@endsection
@section('content')
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <h1> <strong> Blog</strong></h1>
      </div>
  </div>  
  @foreach ($posts as $post)
      
 
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
      <h3>{{$post->title}}</h3>
        <h5>published:{{date('j M , Y',strtotime($post->created_at))}}</h5>
      <p>{{substr($post->body,0,250)}}{{strlen($post->body)>50? "...":""}}</p>
      <a href="{{url('blog/'.$post->slug)}}" class="btn  btn-primary">Read More</a>
      <hr>
      </div>
      
  </div>
  
  @endforeach
  <div class="text-center">
    {!! $posts->links()!!}
</div>
@endsection