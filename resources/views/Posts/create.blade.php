@extends('main')
@section('title', 'Create New Post')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2"></div>
    <h1>Create New Post</h1>
    <hr>
    {!! Form::open(['route' => 'posts.store']) !!}
            {{Form::label('title',"Title:")}}
            {{Form::text('title',null,array('class' =>'form-control'))}}
            {{Form::label('slug','Slug:')}}
            {{Form::text('slug',null,array('class' =>'form-control'))}}
            {{Form::label('category_id','Category:')}}
            <select name="category_id" class="form-control">
                @foreach ($categories as $cate)
            <option value="{{$cate->id}}">{{$cate->name}}</option>
                @endforeach
            </select>
            {{Form::label('tags','Tags:')}}
            <select name="tags[]" class="form-control js-example-basic-multiple" multiple="multiple">

                @foreach ($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>


            {{Form::label('body','Post Body:')}}
            {{Form::textarea('body',null,array('class' =>'form-control'))}}

           
            {{Form::submit('Create Post',array('class' =>'btn btn-success btn-lg btn-block', 'style' =>'margin-top :20px'))}}
    {!! Form::close() !!}
</div>


@endsection


