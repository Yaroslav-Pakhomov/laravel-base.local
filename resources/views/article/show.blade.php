<?php

declare(strict_types = 1);

?>

@extends('layouts.main')
@section('content')
    <div class="alert alert-primary" role="alert">
        <a class="btn btn-primary" href="{{ route('article.create') }}">Создать</a>
    </div>
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

    <div class="alert alert-secondary" role="alert">
        <a class="btn btn-success" href="{{ route('article.edit', $article->id) }}">Редактировать</a>
    </div>

    <div class="alert alert-secondary" role="alert">
        <form action="{{ route('article.delete', $article->id) }}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger">Удалить</button>
        </form>
    </div>

    <div class="alert alert-secondary" role="alert">
        <a class="btn btn-dark" href="{{ route('article.index') }}">Статьи</a>
    </div>
@endsection
