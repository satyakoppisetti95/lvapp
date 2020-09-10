@extends('layouts.base')

@section('content')
<div style="position:relative;text-align:center;color:white">
    <img src="/storage/cover_images/{{$page->cover_image}}" width="100%" height="auto" >
    <div style="position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);"><h1>{{ $page->title }}</h1></div>
</div>

<div class="container" style="margin-bottom:128px">
    
    {!! $page->content !!}
<div class="container">
@endsection