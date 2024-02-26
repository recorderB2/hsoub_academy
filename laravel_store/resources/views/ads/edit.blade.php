@extends('layouts.home')
@section('title', 'Edit Add')
@section('content')
    <form action="/ads/{{$ad->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <label for="country">country</label>
        <x-select-list :dataList="$countries" name="country_id" :value="$ad->country_id"></x-select-list>
        <label for="category">category</label>
        <x-select-list :dataList="$categories" name="category_id" :value="$ad->category_id"></x-select-list>
        <label for="title">title</label>
        <input type="text" name="title" value="{{$ad->title}}">
        <label for="text">text</label>
        <input type="text" name="text" value="{{$ad->text}}">
        <br><br>
        <label for="price">price</label>
        <input type="number" name="price" step="0.01" value="{{$ad->price}}">
        <label for="currency">currency</label>
        <x-select-list :dataList="$currencies" name="currency_id" :value="$ad->currency_id"></x-select-list>
        <label for="images">images</label>
        <input type="file" name="images[]" multiple>
        @foreach ($ad->images as $img)
            <img src="{{asset('storage/'.$img->image)}}">            
        @endforeach
        <input type="submit" value="edit">
    </form>    
@endsection
