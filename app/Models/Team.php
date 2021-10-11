<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Team extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = ['users_id', 'users_name', 'asTeamAchallengesId','asTeamBchallengesId'];

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps();
    }

    public  function  getUsersIdAttribute()
    {
        return implode(", ", $this->users->pluck('id')->all());
    }

    public function getUsersNameAttribute()
    {
        return implode(", ", $this->users->pluck('name')->all());
    }

    //get all challenge that challenge as team A
    public function asTeamA_Challenges()
    {
        return $this->hasMany(Challenge::class, 'teamA_id');
    }

    //get all challenge that challenge as team B
    public function asTeamB_Challenges()
    {
        return $this->hasMany(Challenge::class, 'teamB_id');
    }

    public  function  getAsTeamAChallengesIdAttribute()
    {
        return implode(", ", $this->asTeamA_Challenges->pluck('id')->all());
    }

    public  function  getAsTeamBChallengesIdAttribute()
    {
        return implode(", ", $this->asTeamB_Challenges->pluck('id')->all());
    }
}
