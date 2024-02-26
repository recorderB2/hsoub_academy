@extends('layouts.home')
@section('title', 'New Ad')

@section('content')
@include('alerts.success')
@include('alerts.error')
<form action="/ads" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="country">country</label>
    <x-select-list :dataList="$countries" name="country_id"></x-select-list>
    <label for="category">category</label>
    <x-select-list :dataList="$categories" name="category_id"></x-select-list>
    <label for="title">title</label>
    <input type="text" name="title">
    <label for="text">text</label>
    <input type="text" name="text">
    <br><br>
    <label for="price">price</label>
    <input type="number" name="price" step="0.01">
    <label for="currency">currency</label>
    <x-select-list :dataList="$currencies" name="currency_id"></x-select-list>
    <label for="images">images</label>
    <input type="file" name="images[]" multiple>
    <br><br>
    <input type="submit" value="send">
</form>
@endsection
