<?php

namespace App\Http\Middleware;

use App\Models\Participation_ticker;
use Closure;
use DateTime;
use Illuminate\Http\Request;

class BookroomMiddle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $isTrue = true;

        $meet = url()->previous();
        $array = explode('/',$meet);
        $ticket = Participation_ticker::where('meet_id',$array[4])->get();
        $hourbook = $request->input('hourbook');
        $hourStart =  explode('?',$hourbook);
        $startHour = $hourStart[0];
        $startbook = $request->input('datebook').' '. $startHour;
        foreach($ticket as $item){
          if(strtotime($item->start_date)-strtotime($startbook) == 0 ){
              $isTrue = false;
          }
        }
        if($isTrue){
            $date = new DateTime('Asia/Ho_Chi_Minh');
            if(strtotime($date->format('Y-m-d H:i')) - strtotime($startbook) <0){
                return $next($request);
            }
            else{
                $request->session()->flash('messError','Ngày bạn đã chọn đã qua rồi');
                return redirect()->route('book-room');
            }
        }
        else{
            $request->session()->flash('messError','Lịch đó đã có người đặt rồi');
            return redirect()->route('book-room');
        }


    }
}
