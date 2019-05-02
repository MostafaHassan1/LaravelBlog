@extends('main')
@section('title', 'Welcome')
@section('content')
    

    <div class="row" >
        <div class="col-md-12" >
                <div class="jumbotron">
                   <h1>Welcome to my Laravel Blog</h1>
                     <p>...</p>
                     <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
                </div>
         </div>
    </div>   
    <div class="row" >
            <div class="col-md-8">
                @foreach ($posts as $post)
      
              <div class="post" >
                <h3> {{$post->title}} </h3>
              <p> {{substr($post->body,0,200)}}{{ strlen($post->body)>100? "...":""}}</p>
              <a href="{{url('blog/'.$post->slug)}}" class="btn btn-primary">Read more </a> 
               </div>
               <hr>
               @endforeach 
               </div>
            
            <div class="col-md-3 col-md-offset-1 ">
                <h2>sidebar</h2>
            </div>
    </div>
@endsection 