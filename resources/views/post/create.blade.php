<?php

declare(strict_types = 1);
?>
@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input
                    {{--Передаётся атрибут name --}}
                    value="{{ old('title') }}"
                    type="text" name="title" class="form-control" id="title" placeholder="Title">

                {{--Передаётся атрибут name у input--}}
                @error('title')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content"
                          placeholder="Content">{{ old('content') }}</textarea>

                {{--Передаётся атрибут name у textarea--}}
                @error('content')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input value="{{ old('image') }}" type="text" name="image" class="form-control" id="image"
                       placeholder="Image">

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
                            value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="tags" class="form-label">Tags</label>
                <select multiple class="form-select" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option
                            {{ (is_array(old('tags')) && in_array($tag->id, old('tags'))) ? ' selected' : '' }}
                            value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Create</button>
        </form>
    </div>
@endsection
