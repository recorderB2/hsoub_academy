<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
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
        return TagResource::collection(Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Tag::class);
        return new TagResource(Tag::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        $tag = new TagResource($tag);
        return $tag->response()->setStatusCode(200, 'Show Is OK');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $this->authorize('create', $tag);
        $tag = new TagResource($tag);
        $tag->update($request->all());
        return $tag->response()->setStatusCode(200, 'Update Is OK');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $this->authorize('create', $tag);
        $tag->delete();
        return 204;
    }
}
