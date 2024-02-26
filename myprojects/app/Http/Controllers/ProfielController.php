<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfielController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index(){
        return view("profile"); 
    }
    
    public function update(){
        $userId = auth()->id();
        $data = request()->validate([
            "name" => ["required", "min:3"],
            "email" => ["required", "email"],
            "password" => ["nullable", "confirmed", "min:8"],
            "image" => ["mimes:jpeg,jpg,png"]
        ]);
        if(request()->has("password")){
            $data["password"] = Hash::make(request("password"));
        }
        if(request()->hasFile("image")){
            $path = request("image")->store("users");
            $data["image"] = $path;
            if(auth()->user()->image != "users/default.png"){
                Storage::delete(auth()->user()->image);
            }
        }
        
        User::findOrFail($userId)->update($data);
        return back();
    }
}
