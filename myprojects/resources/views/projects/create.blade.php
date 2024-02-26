@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="/projects" method="POST">
            @csrf
            title
            <input type="text" name="title">
            description
            <input type="text" name="description">
            <input type="submit" value="send">
        </form>
    </div>   
@endsection
