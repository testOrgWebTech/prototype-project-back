<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $appends = ['challenges_id', 'imagePath'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $touches = ['teams'];

    public function isRole($role)
    {
        return $this->role === $role;
    }

    public function isReferee()
    {
        return $this->isRole('REFEREE');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [
            'name' => $this->name,
        ];
    }

    public function getChallengesIdAttribute()
    {
        return implode(",", $this->playerChallenges->pluck('id')->all());
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class)
            ->withTimestamps();
    }

    public function challenges()
    {
        return $this->belongsToMany(Challenge::class)->wherePivot('player_team')->withTimestamps();
    }

    public function playerChallenges()
    {
        return $this->belongsToMany(Challenge::class)->withTimestamps();
    }
    public function image(){
        return $this->hasOne(Image::class);
    }
    public function getImagePathAttribute(){
        if ($this->image !== null){
            return $this->image->path;
        }
        else{
            return ;
        }
    }
}
