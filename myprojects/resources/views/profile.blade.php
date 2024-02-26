@extends('layouts.app')
@section('content')
    <div class="container" style="display: flex; align-items:center; flex-direction:column;">
        <img src="{{asset('storage/'.auth()->user()->image)}}" width="128px" style="border-radius: 50%">
        <h3>
            {{auth()->user()->name}}
        </h3>
        <form action="/profile" method="post" enctype="multipart/form-data" style="display: flex; align-items:center; flex-direction:column;">
            @csrf
            @method("PATCH")
            <label for="name">Name</label>
            <input type="text" name="name" value="{{auth()->user()->name}}">
            @error('name')
                {{$message}}
            @enderror
            <label for="email">Email</label>
            <input type="email" name="email" value="{{auth()->user()->email}}">
            <label for="password">Password</label>
            <input type="password" name="password">
            <label for="password-confirmation">Password Confirmation</label>
            <input type="password" name="password-confirmation">
            <label for="image">Image</label>
            <input type="file" name="image">
            <input type="submit" value="save">
        </form>
    </div>
@endsection
