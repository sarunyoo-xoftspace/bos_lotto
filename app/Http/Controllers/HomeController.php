<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
 
    public function index()
    {
        
        $count_customer = DB::table('bet_transactions')
        ->select(DB::raw(' count(distinct  bet_customer_name) as bet_customer_count '))
        ->get()[0]
        ->bet_customer_count;

        if($count_customer > 0) { 
            
            $summary_amount_bet = DB::table('bet_transactions')
            ->select(DB::raw('sum(bet_amount) as summary_amount_bet'))
            ->get()[0]
            ->summary_amount_bet;

        } else { 
            $summary_amount_bet = 0;
        }

        return view("home.index",[
            'count_customer' => $count_customer,
            'summary_amount_bet' => $summary_amount_bet
        ]);
    }

}
