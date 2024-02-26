@extends('layouts.home')
@section('title', 'Your Ads')

@section('content')
    <div class="x-list">
        @foreach ($userAds as $ad)
            <div>
                <a href="/ads/{{$ad->id}}">
                    {{$ad->title}}
                </a>
                <form action="/ads/{{$ad->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete">
                </form>
                <a href="/ads/{{$ad->id}}/edit">Edit</a>

            </div>
        @endforeach
    </div>
@endsection
