<?php

declare(strict_types = 1);

?>

@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('categories.update', $category->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                       value="{{ $category->title }}">
            </div>
            <button type="submit" class="btn btn-primary">Редактировать категорию</button>
        </form>
    </div>
@endsection
