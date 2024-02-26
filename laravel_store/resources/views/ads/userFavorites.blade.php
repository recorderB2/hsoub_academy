@extends('layouts.home')
@section('title', 'Favorites')

@section('content')

@foreach ($ads as $ad)
    {{$ad->title}}
    <hr>    
@endforeach
@endsection
