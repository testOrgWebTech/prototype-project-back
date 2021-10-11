<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChallengeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', [
            'except' => ['show','index']
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $challenges = Challenge::get();
        return $challenges;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'location' => 'required|string|between:2,20',
            'post_id' => 'required|integer',
            //mode
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $challenge = new Challenge();
        $challenge->location = $request->input('location');
        $challenge->post_id  = $request->input('post_id');
        $challenge->teamA_id = $request->input('teamA_id');
        $challenge->match_progress = $request->input('match_progress');
        //$challenge->mode = $request->input('mode');
        $challenge->save();

        $userId = $request->input('user_id');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Challenge $challenge)
    {
        return $challenge;
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
        // change mode ?
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
