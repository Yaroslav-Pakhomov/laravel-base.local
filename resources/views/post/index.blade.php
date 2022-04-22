<?php

declare(strict_types = 1);

?>
@extends('layouts.main')
@section('content')
    <div class="alert alert-primary" role="alert">
        <a class="btn btn-primary" href="{{ route('post.create') }}">Создать</a>
    </div>
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">content</th>
            <th scope="col">likes</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <?php $i++; ?>
            <tr>
                <th scope="row">{{$i}}</th>
                <td><a class="alert-link" href="{{ route('post.show', $post->id)}}">{{ $post->title }}</a></td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->likes }}</td>
                <td><a class="btn btn-primary" href="{{ route('post.edit', $post->id) }}">Редактировать</a></td>
                <td>
                    <form action="{{ route('post.delete', $post->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-3 mb-15 nav justify-content-center">
        {{ $posts->withQueryString()->links() }}
    </div>
@endsection
