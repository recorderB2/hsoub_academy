<?php

namespace App\Http\Controllers;

use App\Repositories\Favorites\FavoriteInterface;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    protected $favorite;
    public function __construct(FavoriteInterface $favorite)
    {
        $this->favorite = $favorite;
    }
    public function index()
    {
        $ads = $this->favorite->all();
        return view('ads.userFavorites', compact('ads'));
    }
    public function store(Request $request)
    {
        $this->favorite->store($request);
    }
    public function destroy(string $id)
    {
        $this->favorite->delete($id);
    }
}
