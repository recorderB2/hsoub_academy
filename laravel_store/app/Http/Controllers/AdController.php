<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use App\Repositories\Ads\AdInterface;
use App\Repositories\Favorites\FavoriteInterface;
use App\Http\Requests\AdRequest;
// use Illuminate\Support\Facades\Gate;

class AdController extends Controller
{
    protected $ads;
    protected $favorite;

    public function __construct(AdInterface $ad, FavoriteInterface $favorite)
    {
        $this->middleware('auth')->only('create', 'store', 'edit');
        $this->ads = $ad;
        $this->favorite = $favorite;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = $this->getCommonAds();
        return view('ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdRequest $request)
    {
        $this->ads->store($request);
        return back()->with('success', 'New Ad Is Done');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ad = $this->ads->getDetails($id);
        $favorite = $this->favorite->show($ad->id);
        return view('ads.show', compact('ad', 'favorite'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ad = $this->ads->getById($id);
        if (\Gate::allows('edit-ad', $ad)) {
            return view('ads.edit', compact('ad'));
        };
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Ad $ad, Request $request)
    {
        $this->ads->update($ad, $request);
        return redirect('/ads' . '/' . $ad->user_id . '/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->ads->delete($id);
        return back();
    }
    public function getByUser($userId)
    {
        $userAds = $this->ads->getByUser($userId);
        return view('ads.userAds', compact('userAds'));
    }
    public function getByCategory($id, $slug)
    {
        $ads = $this->ads->getByCategory($id);
        return view('ads.categoryAds', compact('ads'));
    }
    public function search(Request $request)
    {
        $ads = $this->ads->search($request);
        return view('ads.index', compact('ads'));
    }
    public function getCommonAds()
    {
        return $this->ads->getCommonAds();
    }
}
