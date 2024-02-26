<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\helper;
use App\Models\User;
use App\Models\Image;
use App\Models\Comment;
use Illuminate\Http\Request;

class Ad extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'text', 'price', 'user_id', 'currency_id', 'country_id', 'category_id'
    ];
    public function setSlugAttribute($value)
    {
        $slug = helper::slug($value);
        $uniqueslug = helper::uniqueSlug($slug, 'ads');
        $this->attributes['slug'] = $uniqueslug;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->where('parent_id', null);
    }
    public function scopeFilter($query, Request $request)
    {
        if ($request->country) {
            $query->whereCountry_id($request->country);
        }
        if ($request->category) {
            $query->whereCategory_id($request->category);
        }
        if ($request->keyword) {
            $query->where('title', 'LIKE', '%' . $request->keyword . '%');
        }
        return $query->with('images')->get();
    }
}
