<div class="x-list">
    @foreach ($categories as $category)
        <a href="/{{$category->id}}/{{$category->slug}}">
            {{$category->name}}
        </a>
    @endforeach
</div>
