@extends('layouts.adminbase')

@section('content')
    <div class="container" style="margin-top:32px">

        <h1>Globals</h1>
        {!! Form::open(['action' => 'AdminPageController@updateglobals', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        
            <div class="form-group">
                {{Form::label('ContactMail', 'Contact Mail')}}
                {{Form::text('contact_mail',  $contact_mail, ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>

            <div class="form-group">
                {{Form::label('google_key', 'Google Analytics ID')}}
                {{Form::text('google_key',  $google_key, ['class' => 'form-control', 'placeholder' => 'Meta Title'])}}
            </div>

            <div class="form-group">
                {{Form::label('fb_key', 'Facebook Pixel ID')}}
                {{Form::text('fb_key',  $fb_key, ['class' => 'form-control', 'placeholder' => 'Meta Description'])}}
            </div>


            
            {{Form::submit('Update', ['class'=>'btn btn-primary'])}}

        {!! Form::close() !!}
        <hr>
        <br>
        <h1>Pages</h1>
        @foreach($pages as $page)
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img class="img-fluid" src="/storage/cover_images/{{ $page->cover_image }}"/>
                        </div>
                        <div class="col-8">
                            <h5>{{ $page->title }}</h5>
                            <a class="btn btn-primary" href="/editpage/{{ $page->id }}">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

