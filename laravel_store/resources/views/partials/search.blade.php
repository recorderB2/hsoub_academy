<div class="x-list">
    <form action="/ads/search" method="POST">
        @csrf
        <x-select-list :dataList="$categories" name="category"></x-select-list>
        <x-select-list :dataList="$countries" name="country"></x-select-list>
        <input type="search" name="keyword">
        <input type="submit" value="search">
    </form>
</div>

