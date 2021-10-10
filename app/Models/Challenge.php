<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Challenge extends Model
{
    use HasFactory, SoftDeletes;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function teamA()
    {
        return $this->belongsTo(Team::class,'teamA_id');
    }

    public function teamB()
    {
        return $this->belongsTo(Team::class,'teamB_id');
    }

}
