<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::with(['user', 'comments', 'category', 'challenge'])->orderBy('created_at', 'DESC')->get();
        //Post::join('users', 'users.id', '=', 'posts.user_id')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->message = $request->message;
        $post->category_id = $request->category_id;
        $post->user_id = $request->user_id;

        $post->save();
        // return Post::with(['user', 'comment', 'category'])->where("id", "=", $post->id)->get()->first();
        return Post::with(['user', 'category'])->where("id", "=", $post->id)->get()->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return Post::with(['user', 'comments', 'category'])->where("id", "=", $post->id)->get()->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->message = $request->message;
        $post->category_id = $request->category_id;
        $post->user_id = $request->user_id;

        $post->save();
        return Post::with(['user', 'comments', 'category'])->where("id", "=", $post->id)->get()->first();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return Post::get();
    }

    public function getPostsByCateId($cate_id)
    {
        return Post::with(['user', 'comments', 'category', 'challenge'])->where('category_id', '=', $cate_id)->get();
    }
}
