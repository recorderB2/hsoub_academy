<?php

namespace App\Http\Controllers;

use App\Repositories\Comments\CommentInterface;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $comment;
    public function __construct(CommentInterface $comment)
    {
        $this->comment = $comment;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->comment->add($request);
        return back();
    }
    public function reply(Request $request)
    {
        $this->comment->add($request);
        return back();
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
