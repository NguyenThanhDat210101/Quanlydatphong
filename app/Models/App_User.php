<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App_User extends Model
{
    public $guarded = [];

    public function Participation_Ticker_Detail(){
        return $this->hasMany(Participation_Ticket_Detail::class);
    }

    public function Department(){
        return $this->belongsTo(Department::class);
    }
}
