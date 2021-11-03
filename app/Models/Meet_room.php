<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meet_room extends Model
{
    public $guarded = [];

    public function Participation_ticker(){
        return $this->hasMany(Participation_ticker::class);
    }
}
