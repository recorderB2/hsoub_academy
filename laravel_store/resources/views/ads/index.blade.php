@extends('layouts.home')
@section('title', 'Ads')

@section('content')
<h2><center>Common Ads</center></h2>
    <div class="x-list">
       @foreach ($ads as $ad)
            <a href="/ads/{{$ad->id}}">
                {{$ad->title}}
            </a>
            
       @endforeach
    </div>
@endsection
