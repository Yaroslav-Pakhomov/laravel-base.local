<?php

declare(strict_types = 1);

?>

@extends('layouts.main')
@section('content')
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">category</th>
            <th scope="col">tag</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $article->title }}</td>
            <td>{{ $article->content }}</td>
            <td>{{ $article->category_id }}</td>
            <td>{{ $article->tag_id }}</td>
        </tr>
        </tbody>
    </table>
    <div>
        <form action="{{ route('article.update', $article->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                       value="{{ $article->title }}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content"
                          placeholder="Content">{{ $article->content }}</textarea>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <input type="text" name="category_id" class="form-control" id="category_id" placeholder="Category"
                       value="{{ $article->category_id }}">
            </div>
            <div class="mb-3">
                <label for="tag_id" class="form-label">Tag</label>
                <input type="text" name="tag_id" class="form-control" id="tag_id" placeholder="Tag"
                       value="{{ $article->tag_id }}">
            </div>

            <button type="submit" class="btn btn-primary">Редактировать</button>
        </form>
    </div>
@endsection
