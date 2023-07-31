@extends('layouts.main')
@section('title') {{ $news['title'] }} @parent @stop
@section('content')
<h2>{{ $news['title'] }}</h2>
<div>
    <h4><a href="/news/{{ $news['id'] }}">{{ $news['title'] }}</a></h4>
    <br>
    <img src="{{ $news['image'] }}" alt="">
    <p><em>{{ $news['author'] }}</em> &nbsp; ({{ $news['created_at'] }})</p>
    <p>{{ $news['description'] }}</p>
</div>
@endsection