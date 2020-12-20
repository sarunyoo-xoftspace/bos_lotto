<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class HomePage extends Component
{

    public $summary_amount_bet;
    public $count_customer;
    
    public function mount()
    {
        /* 

        $this->count_customer = DB::table('bet_transactions')
        ->select(DB::raw(' count(distinct  bet_customer_name) as bet_customer_count '))
        ->get()[0]
        ->bet_customer_count;

        if($this->count_customer > 0) { 
            
            $this->summary_amount_bet = DB::table('bet_transactions')
            ->select(DB::raw('sum(bet_amount) as summary_amount_bet'))
            ->get()[0]
            ->summary_amount_bet;

        } else { 
            $this->summary_amount_bet = 0;
        }
        */

    }

    public function lotteryProcessCorrect()
    {
        
    }
    
    public function render()
    {
        return view('livewire.home-page');
    }
}
