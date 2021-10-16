<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class MessageController extends Controller
{

    public function __construct(){
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $user = JWTAuth::user();
        $message = $user->messages()->get();
        return MessageResource::collection($message);
//        return $message;
    }
    public function getSentMessage(){
        $user = JWTAuth::user();
        $message = Message::where('sender_id',$user->id)->get();
//        return $message;
        return MessageResource::collection($message);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return MessageResource
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required|max:255',
            'receiver' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }


        $user = JWTAuth::user();
        $message = new Message();
        $message->message = $request->input('message');
        $message->sender_id = $user->id;
        $message->receiver_id = $request->input('receiver');
        $message->save();
        return new MessageResource($message);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
