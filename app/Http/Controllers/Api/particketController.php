<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Participation_ticker;
use Illuminate\Http\Request;

class particketController extends Controller
{
    public function getAll($id){
        return Participation_ticker::where('meet_id',$id)->get();
    }
}
