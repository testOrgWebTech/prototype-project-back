<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = ['challenge_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function challenge()
    {
        return $this->hasOne(Challenge::class);
    }

    public function getChallengeIdAttribute()
    {
        if ($this->challenge !== null) {
            return $this->challenge->id;
        } else {
            return "";
        }
    }
}
