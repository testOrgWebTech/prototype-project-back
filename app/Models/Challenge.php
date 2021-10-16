<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Challenge extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = ['users_id', 'teamA_players_id', 'teamB_players_id','teamA_name','teamB_name'];

    protected $touches = ['post', 'teamA', 'teamB', 'users'];

    public static $challenge_modes = ['1V1', '2v2', '3v3', '4v4', '5v5', '6v6', '7v7'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function teamA()
    {
        return $this->belongsTo(Team::class, 'teamA_id');
    }

    public function teamB()
    {
        return $this->belongsTo(Team::class, 'teamB_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('player_team')
            ->withTimestamps();
    }

    public function getUsersIdAttribute()
    {
        return implode(", ", $this->users->pluck('id')->all());
    }

    // public function getPlayerTeamByUserId($user_id)
    // {
    //     return $this->belongsToMany(User::class)->withPivot('player_team')->where('user_id', $user_id)->first()->pivot->player_team;
    // }

    public function teamAplayers()
    {
        return $this->belongsToMany(User::class)->wherePivot('player_team', 'A')->withTimestamps();
    }
    public function teamBplayers()
    {
        return $this->belongsToMany(User::class)->wherePivot('player_team', 'B')->withTimestamps();
    }

    public function getTeamAplayersIdAttribute()
    {
        return implode(", ", $this->teamAplayers->pluck('id')->all());
    }
    public function getTeamBplayersIdAttribute()
    {
        return implode(", ", $this->teamBplayers->pluck('id')->all());
    }
    public function getTeamANameAttribute()
    {
        return $this->teamA()->pluck('name')->first();
    }
    public function getTeamBNameAttribute()
    {
        return $this->teamB()->pluck('name')->first();
    }
}
