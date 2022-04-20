<?php

declare(strict_types = 1);

?>

@extends('layouts.main');
@section('content')
    <div class="alert alert-primary" role="alert">
        <a class="btn btn-primary" href="{{ route('categories.create') }}">Создать категорию</a>
    </div>
    <table class="table table-success table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach($categories as $category)
            <?php $i++; ?>
            <tr>
                <th scope="row">{{$i}}</th>
                <td><a class="alert-link" href="{{ route('categories.show', $category->id)}}">{{ $category->title }}</a>
                </td>
                <td><a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}">Редактировать</a>
                </td>
                <td>
                    <form action="{{ route('categories.delete', $category->id) }}" method="post">
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
