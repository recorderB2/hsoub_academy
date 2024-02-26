<?php

namespace App\Repositories\Comments;

interface CommentInterface
{
    public function add($request);
    public function addReply($request);
}
