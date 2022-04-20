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
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->image }}</td>
            <td>{{ $post->content }}</td>
        </tr>
        </tbody>
    </table>
    <div>
        <form action="{{ route('post.update', $post->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                       value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content"
                          placeholder="Content">{{ $post->content }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" name="image" class="form-control" id="image" placeholder="Image"
                       value="{{ $post->image }}">
            </div>
            <button type="submit" class="btn btn-primary">Редактировать</button>
        </form>
    </div>
    <div>
        <a class="btn btn-dark mt-3" href="{{ route('post.index') }}">Назад</a>
    </div>
@endsection
