@foreach ($replies as $reply)
    {{$reply->content}}
    <br>
    @include('partials.replies',['replies' => $reply->replies])
@endforeach
