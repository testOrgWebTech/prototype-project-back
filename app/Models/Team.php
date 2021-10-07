<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Team extends Model
{
    use HasFactory;

    protected $appends = ['users_id','users_name'];

    public function users(){
        return $this->belongsToMany(User::class)
            ->withTimestamps();
    }

    public  function  getUsersIdAttribute(){
        return implode(",",$this->users->pluck('id')->all());
    }
    public function getUsersNameAttribute(){
        return implode(",",$this->users->pluck('name')->all());
    }


}
