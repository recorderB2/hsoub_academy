<?php

namespace App\Repositories\Favorites;

use App\Models\Favorite;


class FavoriteRepository implements FavoriteInterface
{
    protected $favorite;
    public function __construct(Favorite $favorite)
    {
        $this->favorite = $favorite;
    }
    public function all()
    {
        return auth()->user()->favAds()->get();
    }
    public function store($request)
    {
        $request->user()->favAds()->attach($request->ad_id);
    }

    public function show($id)
    {
        $favorited = auth()->user()->favAds()->whereAd_id($id)->first();
        return $favorited ? true : false;
    }

    public function delete($id)
    {
        auth()->user()->favAds()->detach($id);
    }
}
