<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Team extends Model
{
    use HasFactory;

    protected $appends = ['user_names'];

    public function users(){
        return $this->belongsToMany(User::class)
            ->withTimestamps();
    }

    public function getUserNamesAttribute(){
        return implode(",",$this->users->pluck('name')->all());
    }
}
