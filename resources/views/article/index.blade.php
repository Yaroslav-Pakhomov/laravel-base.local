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
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">category</th>
            <th scope="col">tag</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0;?>
        @foreach($articles as $article)
            <?php $i++ ?>
            <tr>
                <th scope="row">{{$i}}</th>
                <td><a class="alert-link" href="{{ route('article.show', $article->id) }}">{{ $article->title }}</a>
                </td>
                <td>{{ $article->content }}</td>
                <td>{{ $article->category_id }}</td>
                <td>{{ $article->tag_id }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
