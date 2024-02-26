@extends('layouts.home')
@section('title', 'Your Ads')

@section('content')
<div class="x-list">
    @foreach ($ads as $ad)
        <div>
            <a href="/ads/{{$ad->title}}">
                {{$ad->title}}
            </a> 
            @if (!empty($ad->images[0]))
                <img src="{{asset('storage/'.str_replace('images', 'thumbnails',$ad->images[0]->image))}}"> 
            @endif
        </div>
    @endforeach
 </div>
@endsection
