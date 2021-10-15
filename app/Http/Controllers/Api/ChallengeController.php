<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChallengeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', [
            'except' => ['show', 'index']
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
            // 'post_id' => 'required|integer',
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
        $challenge->mode = $request->input('mode');
        $challenge->save();

        $usersEmailWithComma = trim($request->input('teamA_players'));
        $this->updateTeamPlayers($challenge, $usersEmailWithComma, $request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Challenge  $challenge
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
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Challenge $challenge)
    {
        $challenge = Challenge::findOrFail($challenge->id);
        $challenge->location = $request->input('location');
        $challenge->teamB_id = $request->input('teamB_id');
        $challenge->victory_team = $request->input('victory_team');
        $challenge->match_progress = $request->input('match_progress');
        $challenge->mode = $request->input('mode');
        $challenge->save();

        $usersWithComma = trim($request->input('players'));
        $this->updateTeamPlayers($challenge, $usersWithComma, $request);

        return $this->show($challenge);
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

    //Many-To-Many dont have synce with pivot value that can contain array data so using attach instead lmao sadlife.
    public function updateTeamPlayers($challenge, $usersEmailWithComma, $request)
    {
        if ($usersEmailWithComma) {
            $user_emails = explode(',', $usersEmailWithComma);
            if (strtolower($request->input('player_team')) === strtolower("teamA")) {
                foreach ($user_emails as $email) {
                    $email = trim($email);
                    if ($email) {
                        $user = User::where('email', 'LIKE', $email)->first();
                    }
                    $challenge->users()->attach($user->id, ['player_team' => 'A']);
                }
            } else {
                foreach ($user_emails as $email) {
                    $email = trim($email);
                    if ($email) {
                        $user = User::where('email', 'LIKE', $email)->first();
                    }
                    $challenge->users()->attach($user->id, ['player_team' => 'B']);
                }
            }
        }
    }
}