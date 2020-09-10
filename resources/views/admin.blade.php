@extends('layouts.adminbase')

@section('content')
    @foreach($pages as $page)
        <h1>{{ $page->title }}</h1>
        <p>{{ $page->content }}</p>
    @endforeach
@endsection