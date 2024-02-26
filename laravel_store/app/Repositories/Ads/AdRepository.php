<?php

namespace App\Repositories\Ads;

use App\Models\Ad;
use App\Models\Favorite;
use App\Models\Image;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdRepository implements AdInterface
{
    use ImageUploadTrait;
    protected $ads;
    public function __construct(Ad $ads)
    {
        $this->ads = $ads;
    }
    public function store($request)
    {
        $data = $request->all();
        $data['slug'] = $request->title;
        $data['user_id'] = auth()->id();
        $ad = Ad::create($data);
        $this->storeImage($ad, $request);
    }
    public function storeImage($ad, $request)
    {
        if ($request->hasFile("images")) {
            foreach ($request->images as $image) {
                $path = $image->store("ads/images");
                $ad->images()->create([
                    'image' => $path
                ]);
                $this->saveSmallerImage(
                    $image,
                    str_replace('images', 'thumbnails', $path)
                );
            }
        }
    }
    public function getByUser($userId)
    {
        return Ad::where('user_id', $userId)->get();
    }
    public function delete($id)
    {
        $ad = Ad::find($id);
        $this->deleteImages($ad->images);
        $ad->delete();
    }
    public function update($ad, $request)
    {
        $data = $request->all();
        if ($ad->title != $request->title) {
            $data['slug'] = $request->title;
        }
        if ($request->hasFile("images")) {
            $this->deleteImages($ad->images);
            Image::where('ad_id', '=', $ad->id)->delete();
            $this->storeImage($ad, $request);
        }
        $ad->update($data);
    }
    public function getByCategory($categoryId)
    {
        return $this->ads::with('images')->where('category_id', $categoryId)->get();
    }
    public function getById($id)
    {
        return Ad::find($id);
    }
    public function search($request)
    {
        return $this->ads->Filter($request);
    }
    public function getCommonAds()
    {
        return $this->ads->select('id', 'title')->whereIn(
            'id',
            Favorite::select('ad_id')
                ->groupBy('ad_id')
                ->orderByRaw('COUNT(*) DESC')
                ->limit(8)
                ->get()
        )->get();
    }
    public function getDetails($id)
    {
        return $this->ads::with([
            'comments' => function ($query) {
                $query->with(['user:id,name']);
            }
        ])->find($id);
    }
}
