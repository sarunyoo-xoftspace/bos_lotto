<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LotteryBetController extends Controller
{

    public function index()
    {
        return view('lottery-bet.index');
    }

}
