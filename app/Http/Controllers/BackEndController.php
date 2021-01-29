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
    
    public function listCheat()
    {
        return view('backend.list-cheat');
    }

    public function paymentLimit()
    {
        return view('backend.payment-limit');
    }

    public function printBetCorrect()
    {
        return view('backend.print-bet-correct');
    }

    public function PrintBetTransaction()
    {
        return view('backend.print-bet-transaction');
    }

    public function SummaryByType()
    {
        return view("backend.summary-by-type");
    }

    public function BetOverLimit()
    {
        return view("backend.bet-over-limit");
    }

}
