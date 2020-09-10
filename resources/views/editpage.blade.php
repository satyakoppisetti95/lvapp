@extends('layouts.adminbase')

@section('content')

    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Page</li>
    </ol>
    </nav>


    <div class="container">
    <h1>Edit Page</h1>
    {!! Form::open(['action' => 'AdminPageController@updatepage', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::hidden('id',  $page->id, ['class' => 'form-control', 'placeholder' => 'ID','type'=>'hidden'])}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title',  $page->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>

        <div class="form-group">
            {{Form::label('meta_title', 'Meta Title')}}
            {{Form::text('meta_title',  $page->meta_title, ['class' => 'form-control', 'placeholder' => 'Meta Title'])}}
        </div>

        <div class="form-group">
            {{Form::label('meta_description', 'Meta Description')}}
            {{Form::text('meta_description',  $page->meta_description, ['class' => 'form-control', 'placeholder' => 'Meta Description'])}}
        </div>

        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $page->content, ['id' => 'content-ckeditor', 'class' => 'form-control', 'placeholder' => 'Content Text'])}}
        </div>

        <div class="form-group">
            {{Form::label('no_index', 'No Index')}}
            @if($page->no_index>0)
            {{Form::checkbox('no_index',  'No Index',true)}}
            @else
            {{Form::checkbox('no_index',  'No Index',false)}}
            @endif
        </div>

        <div class="form-group">
            {{Form::label('cover_image', 'Cover Image. (Optional. Leave it blank, if you wish to not change the existing image)')}}
            <br>
            {{Form::file('cover_image')}}
        </div>

        
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}

    <br><br><br><br><br><br>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        // $('#article-ckeditor').ckeditor();
        CKEDITOR.replace( 'content-ckeditor' );
    });
</script>
@endsection