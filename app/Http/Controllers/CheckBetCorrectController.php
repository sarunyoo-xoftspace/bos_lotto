<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckBetCorrectController extends Controller
{
    public function index() {
        return view('check-bet-correct.index');
    }
}
