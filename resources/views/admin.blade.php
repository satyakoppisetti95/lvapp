@extends('layouts.adminbase')

@section('content')
    <div class="container">
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