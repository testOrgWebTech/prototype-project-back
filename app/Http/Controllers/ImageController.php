<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Facades\JWTAuth;

class ImageController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api');
    }
    public function store(Request $request)
    {
        $imageFullName = $request->file('image')->getClientOriginalName();

        $request->file('image')->storeAs('images', $imageFullName);

        $image = new Image();
        $image->name = $imageFullName;
        $image->path = Storage::url("images/" . $imageFullName);
        $user = JWTAuth::user();
        $image->user_id = $user->id;
        $image->save();

        return response()->json([
            'message' => 'Image Successfully Uploaded.',
            'images' => Image::get(),
        ]);
    }
}
