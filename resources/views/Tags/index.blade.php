@extends('main')
@section('title')
    Tags
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>All Tags</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                         <tr>
                        <td>{{$tag->id}}</td>
                         <td><a href="{{route('tags.show',$tag->id)}}">{{$tag->name}}</a></td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <div class="well">
                {!!Form::open(['route'=>'tags.store','method'=>'POST']) !!}
                <h2>New Tags</h2>
                {{Form::label('name','Name:')}}
                 {{Form::text('name',null,["class"=>'form-control'])}}
                 {{Form::submit('Create new Tag',['class'=>'btn btn-primary btn-block form-spacing-top'])}}
                {!!Form::close()!!}
            </div>
        </div>
    </div>
@endsection