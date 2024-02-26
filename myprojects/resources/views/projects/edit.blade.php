@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/projects/{{$project->id}}" method="POST">
        @csrf
        @method("PATCH")
        title
        <input type="text" name="title" value="{{$project->title}}">
        description
        <input type="text" name="description" value="{{$project->title}}">
        status
        <select name="status">
            <option value="0">in prosess</option>
            <option value="1">completed</option>
            <option value="2">canceled</option>
        </select>
        <input type="submit" value="edit">
    </form>
</div>  
@endsection
