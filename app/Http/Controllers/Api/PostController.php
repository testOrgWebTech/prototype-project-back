<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::join('users', 'users.id', '=', 'posts.user_id')->paginate(10);
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
        $post->category = $request->category;
        //$post = $request->message;
        //$post = $request->img;
        $post->save();
        /*return redirect()->route('apartments.show', [
            'apartment' => $room->apartment_id
        ]);*/
        return response()->json([
            'message' => 'Post successfully created',
            'post' => $post
        ], 200);
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
        return $post;
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
        $post->category = $request->category;
        //$post = $request->message;
        //$post = $request->img;
        $post->save();
        return response()->json([
            'message' => 'Post successfully updated',
            'post' => $post
        ], 200);
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
    }
}
