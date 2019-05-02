@extends('main')
@section('title', 'Edit Post')

@section('content')

<div class="row">
    {!! Form::model($post,['route'=>['posts.update',$post->id],'method'=>'PUT'])!!}
    <div class="col-md-8">

            {{Form::label('title',"Title:")}}
           {{Form::text('title',null , ["class"=>'form-control input-lg'])}}

           {{Form::label('slug',"Slug:",["class"=>'form-spacing-top'])}}
           {{Form::text('slug',null , ["class"=>'form-control input-lg'])}}

           {{Form::label('category_id','Category:')}}
           {{Form::select('category_id',$categories,null,['class' => 'form-control'])}}

            {{Form::label('tags','Tags:',['class'=>'form-spacing-top'])}}
            {{Form::select('tags[]',$tags,null,['class'=>'js-example-basic-multiple form-control','multiple'=>'multible'])}}


           {{Form::label('body','Post Body:',["class"=>'form-spacing-top'])}}
           {{Form::textarea('body',null , ["class"=>'form-control'])}}
    </div>
  
        <div class="col-md-4">  
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created at:</dt>
                    <dd>{{date('h:ia - j M - Y ',strtotime($post->created_at))}}</dd>
                </dl>
                <dl class="dl-horizontal">
                        <dt>Last Updated:</dt>
                        <dd>{{date('h:ia - j M - Y ',strtotime($post->updated_at))}}</dd>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            
                            {!!Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger btn-block')) !!}
                                
                        </div>
                        <div class="col-sm-6">
                            {{Form::submit('Save Changes',array('class'=>'btn btn-success btn-block'))}}
                              
                        </div>
                    </div>
            </div>
        </div>
        {!! Form::close()!!}
</div>
    
@endsection