<?php

declare(strict_types = 1);

?>

@extends('layouts.main')
@section('content')
    <div class="alert alert-primary" role="alert">
        <a class="btn btn-primary" href="{{ route('comments.create') }}">Создать комментарий</a>
    </div>
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Автор комментария</th>
            <th scope="col">Текст комментария</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>
        <?php  $i = 0; ?>
        @foreach($comments as $comment)
            <?php $i++; ?>
            <tr>
                <th scope="row">{{$i}}</th>
                <td><a class="alert-link" href="{{ route('comments.show', $comment->id)}}">{{ $comment->Author }}</a>
                </td>
                <td>{{ $comment->text }}</td>
                <td><a class="btn btn-primary" href="{{ route('comments.edit', $comment->id) }}">Редактировать</a></td>
                <td>
                    <form action="{{ route('comments.delete', $comment->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
