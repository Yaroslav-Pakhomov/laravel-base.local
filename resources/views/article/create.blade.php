<?php

declare(strict_types = 1);

?>

@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('article.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content" placeholder="Content"></textarea>
            </div>
            {{--            <div class="mb-3">--}}
            {{--                <label for="category_id" class="form-label">Category</label>--}}
            {{--                <input type="text" name="category_id" class="form-control" id="category_id" placeholder="Category">--}}
            {{--            </div>--}}
            <div class="mb-3">
                <label for="tag_id" class="form-label">Tag</label>
                <input type="text" name="tag_id" class="form-control" id="tag_id" placeholder="Tag">
            </div>

            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
