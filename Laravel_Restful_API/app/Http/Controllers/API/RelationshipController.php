<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonSubResource;
use App\Http\Resources\LessonResource;
use App\Http\Resources\TagSubResource;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Response;

class RelationshipController extends Controller
{
    public function userLessons($id)
    {
        $user = LessonResource::collection(User::findOrFail($id)->lessons);
        return Response::json(
            ['data' => $user],
            200
        );
    }
    public function lessonTags($id)
    {
        $lesson = TagSubResource::collection(Lesson::findOrFail($id)->tags);
        return Response::json(
            ['data' => $lesson],
            200
        );
    }
    public function tagLessons($id)
    {
        $tag = LessonSubResource::collection(Tag::findOrFail($id)->lessons);
        return Response::json(
            ['data' => $tag],
            200
        );
    }
}
