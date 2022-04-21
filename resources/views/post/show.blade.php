<?php

declare(strict_types = 1);

?>
@extends('layouts.main')
@section('content')
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">title</th>
            <th scope="col">image</th>
            <th scope="col">content</th>
            <th scope="col">category</th>
            {{--            <th scope="col">tags</th>--}}
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->image }}</td>
            <td>{{ $post->content }}</td>
            <td>{{ $post->category->title }}</td>
            {{--            <td>{{ $post->tags->title }}</td>--}}
        </tr>
        </tbody>
    </table>
    <div>
        <a class="btn btn-primary mt-3" href="{{ route('post.edit', $post->id) }}">Редактировать</a>
    </div>
    <div>
        <form action="{{ route('post.delete', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger mt-3">Удалить</button>
        </form>
    </div>
    <div>
        <a class="btn btn-dark mt-3" href="{{ route('post.index') }}">Назад</a>
    </div>
@endsection
