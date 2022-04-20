<?php

declare(strict_types = 1);

?>

@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
            </div>
            <button type="submit" class="btn btn-primary">Создать категорию</button>
        </form>
    </div>
@endsection
