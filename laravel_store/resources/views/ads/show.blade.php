@extends('layouts.home')
@section('title', 'Ad Page')

@section('content')
<div class="x-list">
    {{$ad->title}}
    <button 
        id="favorite" 
        data-id="{{$ad->id}}"
        class="{{$favorite ? 'unfav' : 'fav'}}"
    >
    {{$favorite ? 'Remove' : 'Add'}} Favorite
    </button>
    @include('partials.share')
</div>
<form action="/comments" method="POST">
    @csrf
    <textarea name="content"></textarea>
    <input type="submit" value="comment">
    <input type="hidden" name="ad_id" value="{{$ad->id}}">
 </form>
 <div>
    @foreach ($ad->comments as $comment)
        <div style="cursor: pointer;" id="comment-{{$comment->id}}" onclick="showReply({{$comment->id}})">
            <p>
                {{$comment->content}} - {{$comment->user->name}}
           </p>
           <div class="reply" style="display: none">
            <form action="/comments/reply" method="POST">
                @csrf
                <input type="text" name="content"></input>
                <input type="hidden" name="ad_id" value="{{$ad->id}}">
                <input type="hidden" name="parent_id" value="{{$comment->id}}">
                <input type="submit" value="Reply">
            </form>
            @include('partials.replies', ['replies' => $comment->replies])
           </div>
        </div>
    @endforeach
 </div>
 <hr>
 <form action="/send" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <br>
    <input type="email" name="email" placeholder="Email">
    <br>
    <input type="text" name="msg" placeholder="Message">
    <br>
    <input type="hidden" name="adv_email" value={{$ad->user->email}}>
    <input type="submit" value="Send">
</form>
@include('alerts.error')
@endsection

@section('scripts')
<script 
    src="https://code.jquery.com/jquery-3.7.1.js" 
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" 
    crossorigin="anonymous">
</script>
<script>
function showReply(id){
    let replies = document.querySelectorAll(".reply");
    replies.forEach(element => {
        element.style.display = "none";
    });
    let reply = document.querySelector(`#comment-${id} .reply`);
    reply.style.display = 'block';
};
    $(document).ready(function(){
        $('#favorite').on('click', function(){
            let ad_id = $(this).data('id');
            let url, status, text;
            if ($(this).hasClass('fav')){
                url = '/ads/' + ad_id + '/favorite';
                status = 'unfav';
                text = 'Remove Favorite';
            }else{
                url = '/ads/' + ad_id + '/unfavorite';
                status = 'fav';
                text = 'Add Favorite';
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                type: 'post',
                data: {
                    'ad_id': ad_id
                },
                success: function(response){
                    $('#favorite')
                        .removeClass('fav')
                        .removeClass('unfav')
                        .addClass(status)
                        .html(text);
                }
            });
        });
    });
</script>
@endsection
