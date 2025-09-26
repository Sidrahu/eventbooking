<?php

namespace App\Models;
use App\Models\Event;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = [];

    public function event(){

        return $this->belongsTo(Event::class);
    }
}
