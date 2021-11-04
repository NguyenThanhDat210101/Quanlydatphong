<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation_Ticket_Detail extends Model
{
    public $guarded = [];

    public function App_User(){
        return $this->belongsTo(App_User::class);
    }

    public function Participation_ticker(){
        return $this->belongsTo(Participation_ticker::class);
    }
}
