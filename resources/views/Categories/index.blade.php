@extends('main')
@section('title')
    Categories
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $cate)
                         <tr>
                        <td>{{$cate->id}}</td>
                         <td>{{$cate->name}}</td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <div class="well">
                {!!Form::open(['route'=>'categories.store','method'=>'POST']) !!}
                <h2>New Category</h2>
                {{Form::label('name','Name:')}}
                 {{Form::text('name',null,["class"=>'form-control'])}}
                 {{Form::submit('Create new Category',['class'=>'btn btn-primary btn-block form-spacing-top'])}}
                {!!Form::close()!!}
            </div>
        </div>
    </div>
@endsection