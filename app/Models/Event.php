<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;


    protected $fillable=['datestart'];


    // event remembers which user created it
    public function user() {
        return $this->belongsTo(User::class, 'creator_id');
    }

    // one event may have many images
    public function images() {
        return $this->hasMany(Image::class);
    }

    // pivot table tickets
    public function tickets() {
        return $this->belongsToMany(User::class)->as('tickets');
    }

    // pivot table observers
    public function observers() {
        return $this->belongsToMany(User::class)->as('observers')->withPivot('color');
    }
}
