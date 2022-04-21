<?php

declare(strict_types = 1);
?>
@extends('layouts.main')
@section('content')
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">title</th>
            <th scope="col">image</th>
            <th scope="col">content</th>
            <th scope="col">category</th>
            {{--            <th scope="col">tags</th>--}}
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->image }}</td>
            <td>{{ $post->content }}</td>
            <td>{{ $post->category->title }}</td>
            {{--            <td>{{ $post->tags->title }}</td>--}}
        </tr>
        </tbody>
    </table>
    <div>
        <form action="{{ route('post.update', $post->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                       value="{{ $post->title }}">

                {{--Передаётся атрибут name у input--}}
                @error('title')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content"
                          placeholder="Content">{{ $post->content }}</textarea>

                {{--Передаётся атрибут name у textarea--}}
                @error('content')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" name="image" class="form-control" id="image" placeholder="Image"
                       value="{{ $post->image }}">

                {{--Передаётся атрибут name у textarea--}}
                @error('image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category_id" aria-label="Default select example">
                    @foreach($categories as $category)
                        <option
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                            {{ $category->id === $post->category->id ? 'selected' : ''}} value="{{ $category->id }}">
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="tags" class="form-label">Tags</label>
                <select multiple class="form-select" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option
                            {{ (is_array(old('tags')) && in_array($tag->id, old('tags'))) ? ' selected' : '' }}
                            @foreach($post->tags as $postTag)
                            {{ $tag->id === $postTag->id ? 'selected' : ''}}
                            @endforeach
                            value="{{ $tag->id }}">{{ $tag->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Редактировать</button>
        </form>
    </div>
    <div>
        <a class="btn btn-dark mt-3" href="{{ route('post.index') }}">Назад</a>
    </div>
@endsection
