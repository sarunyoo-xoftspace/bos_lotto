<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LotteryRewardController extends Controller
{
    //
    public function index()
    {
        return view('lottery-reward.index');
    }
}
