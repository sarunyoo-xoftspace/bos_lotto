<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackEndController extends Controller
{
    //

    public function listBetTransactions()
    {
        return view('backend.list-bet-transactions');
    }

    public function batche()
    {
        return view('backend.batche');
    }
    


}
