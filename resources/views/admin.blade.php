@extends('layouts.adminbase')

@section('content')

    <h1>Pages</h1>
    @foreach($pages as $page)
        <div class="card">
            <div class="card-body">
                
                <h5>{{ $page->title }}</h5>
                <a class="btn btn-primary" href="/editpage/{{ $page->id }}">Edit</a>
                <a class="btn btn-success" href="/page/{{ $page->id }}/changeimage">Change Image</a>
                
            </div>
        </div>
    @endforeach
@endsection