<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation_ticker extends Model
{
    public $guarded = [];

    public function Participation_Ticker_Detail(){
        return $this->hasMany(Participation_Ticket_Detail::class);
    }

    public function Meet_room(){
        return $this->belongsTo(Meet_room::class);
    }
}
