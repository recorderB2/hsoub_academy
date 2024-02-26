<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return LessonResource::collection(Lesson::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return  new LessonResource(Lesson::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        $lesson = new LessonResource($lesson);
        return $lesson->response()->setStatusCode(200, 'Show Is OK');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        $this->authorize('update', $lesson);
        $lesson = new LessonResource($lesson);
        $lesson->update($request->all());
        return $lesson->response()->setStatusCode(200, 'Update Is OK');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        $this->authorize('update', $lesson);
        $lesson->delete();
        return 204;
    }
}
