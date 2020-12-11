<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriceSetupController extends Controller
{
    public function index()
    {
        return view('prices-setups.index');
    }
}
