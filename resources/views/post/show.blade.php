@extends('layouts.app')

@section('content')
    <p>{{ $post->title }}</p>
    <br>
    <p>{{ $post->preview }}</p>
    <br>
    <p>{{ $post->content }}</p>

    <p>In category: {{ $post->category->name }}</p>
@endsection
