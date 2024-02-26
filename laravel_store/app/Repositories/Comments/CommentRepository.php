<?php

namespace App\Repositories\Comments;

use App\Models\Comment;

class CommentRepository implements CommentInterface
{
    protected $comment;
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }
    public function add($request)
    {
        auth()->user()->comments()->create($request->all());
    }
    public function addReply($request)
    {
        auth()->user()->comments()->create($request->all());
    }
}
