<?php

declare(strict_types = 1);

?>

@extends('layouts.main')
@section('content')
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Автор комментария</th>
            <th scope="col">Текст комментария</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{$comment->id}}</th>
            <td>{{ $comment->Author }}</td>
            <td>{{ $comment->text }}</td>
        </tr>
        </tbody>
    </table>
    <div>
        <a class="btn btn-primary mt-3" href="{{ route('comments.edit', $comment->id) }}">Редактировать комментарий</a>
    </div>
    <div>
        <form action="{{ route('comments.delete', $comment->id) }}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger mt-3" type="submit">Удалить комментарий</button>
        </form>
    </div>
    <div>
        <a class="btn btn-dark mt-3" href="{{ route('comments.index') }}">Все комментарии</a>
    </div>
@endsection
