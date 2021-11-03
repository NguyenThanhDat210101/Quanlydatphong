<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation_ticker extends Model
{
    public $guarded = [];

    public function App_User(){
        return $this->belongsTo(App_User::class);
    }

    public function Meet_room(){
        return $this->belongsTo(Meet_room::class);
    }
}
