<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DateTime;

class CreateController extends Controller
{
    public function index()
    {
        /*$days = array('Monday'  => array('open_at' => '09:00', 'close_at' => '18:00'),
              'Tuesday' => array('open_at' => '11:00', 'close_at' => '14:00')
        );*/

        $open_at = '00:00';
        $close_at = '23:59';

        $time = new DateTime($open_at);
        $close = new DateTime($close_at);

        while ($time < $close) {
            $hours[] = $time->format('H:i');

            $time->modify('+15 minutes');
        }

        //$hours = collect($hours);

        /*$ages['Peter'] = "35";
        $ages['Ben'] = "37";*/

        return view('create')->with('hours', $hours);
    }
}
