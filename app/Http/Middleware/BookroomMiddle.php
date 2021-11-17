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
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $isTrue = true;

        $meet = url()->previous();
        $array = explode('/', $meet);
        $ticket = Participation_ticker::where('meet_id', $array[4])->get();
        $hourbook = $request->input('hourbook');
        $hourStart =  explode('?', $hourbook);
        $startHour = $hourStart[0];
        $startbook = new DateTime($request->input('datebook').' '. $startHour);

        foreach($ticket as $item){
            $check_Start = new DateTime($item->start_date);
            if($startbook->format('Y-m-d H:i:s') == $check_Start->format('Y-m-d H:i:s') ) {
                $isTrue = false;
            }
        }
        if($isTrue) {
            $date = new DateTime('Asia/Ho_Chi_Minh');
            if($date->format('Y-m-d H:i:s') < $startbook->format('Y-m-d H:i:s')) {
                return $next($request);
            }

            $request->session()->flash('messError', 'Ngày bạn đã chọn đã qua rồi');
            return redirect()->back();

        }

        $request->session()->flash('messError', 'Lịch đó đã có người đặt rồi');
        return redirect()->back();



    }
}
