<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Challenge extends Model
{
    use HasFactory, SoftDeletes;

    // protected $appends = ['users_id', 'players_id'];
    protected $appends = ['users_id'];
    // protected $appends = ['players_id'];

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
        return $this->belongsToMany(User::class)
        ->withTimestamps();
    }
    public function getUsersIdAttribute()
    {
        return implode(", ", $this->users->pluck('id')->all());
    }

    //use to show players_id & detach
    // public function players()
    // {
    //     return $this->belongsToMany(User::class)->withTimestamps();
    // }

    // public function getUsersIdAttribute()
    // {
    //     return implode(",", $this->pivot->player_team);
    // }
    // public function getPlayersIdAttribute()
    // {
    //     return implode(", ", $this->players->pluck('id')->all());
    // }
}
