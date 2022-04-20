<?php

declare(strict_types = 1);

?>

@extends('layouts.main')
@section('content')
    <form action="{{ route('comments.store') }}" method="post">
        @csrf
        <div>
            <label class="form-label" for="author">Автор</label>
            <input class="form-control" id="author" name="Author" type="text" placeholder="Введите название автора">
        </div>
        <div>
            <label class="form-label" for="text"></label>
            <textarea class="form-control" id="text" name="text" type="text"
                      placeholder="Введите Ваш комментарий..."></textarea>
        </div>
        <button class="btn btn-primary mt-3" type="submit">Создать комментарий</button>
    </form>
@endsection
