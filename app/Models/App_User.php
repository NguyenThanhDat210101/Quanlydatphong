<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App_User extends Model
{
    public $guarded = [];

    public function Participation_ticker(){
        return $this->hasMany(Participation_ticker::class);
    }

    public function Department(){
        return $this->belongsTo(Department::class);
    }
}
