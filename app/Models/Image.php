<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'event_id'];

    // to which event this event belongs
    public function event() {
        return $this->belongsTo(Event::class);
    }
}
