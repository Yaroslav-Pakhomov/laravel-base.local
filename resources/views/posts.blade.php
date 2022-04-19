<?php

declare(strict_types = 1);
?>
@extends('layouts.main')
@section('content')
    @foreach($posts as $post)
        <div>{{ $post->title }} </div>
        <div>{{ $post->content }} </div>
        <div>{{ $post->likes }} </div>
        <br>
    @endforeach
    <div>
        This is posts page
    </div>
@endsection
