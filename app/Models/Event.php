<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Image;

class Event extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function images() {
        return $this->hasMany(Image::class);
    }
}
