<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Challenge extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = ['players_id'];

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
        return $this->belongsToMany(User::class)->wherePivot('player_team')->withTimestamps();
    }

    public function players()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function getPlayersIdAttribute()
    {
        return implode(",", $this->players->pluck('id')->all());
    }
}
