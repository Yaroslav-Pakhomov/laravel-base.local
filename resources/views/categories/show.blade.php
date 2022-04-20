<?php

declare(strict_types = 1);

?>

@extends('layouts.main')
@section('content')
    <table class="table table-success table-striped">
        <thead>
        <tr>
            <th scope="col">title</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $category->title }}</td>
        </tr>
        </tbody>
    </table>
    <form action="{{ route('categories.delete', $category->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Удалить категорию</button>
    </form>
    <div>
        <a class="btn btn-dark mt-3" href="{{ route('categories.index') }}">Категории</a>
    </div>
@endsection
