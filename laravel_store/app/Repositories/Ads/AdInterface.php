<?php

namespace App\Repositories\Ads;

interface AdInterface
{
    public function store($request);

    public function storeImage($ad, $request);

    public function getById($id);

    public function update($ad, $request);

    public function getByUser($userId);

    public function getByCategory($categoryId);

    public function delete($id);

    public function search($request);

    public function getCommonAds();

    public function getDetails($id);
}
