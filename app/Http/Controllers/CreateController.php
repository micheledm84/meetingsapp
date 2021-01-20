<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DateTime;

class CreateController extends Controller
{
    public function index()
    {

        $open_at = '00:00';
        $close_at = '23:59';

        $time = new DateTime($open_at);
        $close = new DateTime($close_at);

        while ($time < $close) {
            $hours[] = $time->format('H:i');

            $time->modify('+15 minutes');
        }

        return view('create')->with('hours', $hours);
    }
}
