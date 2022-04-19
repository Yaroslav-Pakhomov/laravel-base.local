<?php

declare(strict_types = 1);
?>
@extends('layouts.main')
@section('content')
    {{--    @foreach($posts as $post)--}}
    {{--        <div>{{ $post->title }} </div>--}}
    {{--        <div>{{ $post->content }} </div>--}}
    {{--        <div>{{ $post->likes }} </div>--}}
    {{--        <br>--}}
    {{--    @endforeach--}}
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr>
        </tbody>
    </table>
@endsection
