<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::get();
        return $teams;
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
            'name' => 'required|string|between:2,100',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $team = new Team();
        $team->name = $request->input('name');
        $team->save();

        $userId = $request->input('user_id');
        $team->users()->attach($userId);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return $team;
    }

    public function updateMembers($team, $usersWithComma)
    {
        if ($usersWithComma) {
            $user_ids = [];
            $user_names = explode(',', $usersWithComma);
            foreach ($user_names as $name) {
                $name = trim($name);
                if ($name) {
                    $user = User::where('name', 'LIKE', $name)->first();
                    array_push($user_ids, $user->id);
                }
            }
            $team->users()->syncWithoutDetaching($user_ids);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $team = Team::findOrFail($team->id);
        $team->name = $request->input('name');
        $team->save();

        $usersWithComma = trim($request->input('users'));
        $this->updateMembers($team, $usersWithComma);

        return $this->show($team);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }
}