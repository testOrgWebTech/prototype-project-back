<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    //protected $appends = ['users_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getNameAttribute($value)
    {
        return Storage::url("images/" . $value);
    }
}
