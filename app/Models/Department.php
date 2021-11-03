<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $guarded = [];

    public function App_User(){
        return $this->hasMany(App_User::class);
    }
}
