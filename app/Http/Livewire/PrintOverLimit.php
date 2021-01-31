<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PrintOverLimit extends Component
{
    /** Summary Display */
    public $sumaryBetAmount = 0;
    public $summaryPaymentOverLimit = 0;
    public $summaryTrans = [];

    private function summaryByType() { 
        
        $dbDummaryByType = DB::table("bet_transactions")
            ->join("bet_types", "bet_transactions.bet_type_id",  "=" , "bet_types.id")
            ->select(DB::raw("bet_types.name as type_name, bet_transactions.bet_number, sum(bet_transactions.bet_amount) as bet_amount,  sum( distinct bet_types.reward_amount_baht ) * sum(bet_transactions.bet_amount)  as reward_amount_total , case when  sum( distinct bet_types.payment_limit ) < sum(bet_transactions.bet_amount) then  sum(bet_transactions.bet_amount) -  sum( distinct bet_types.payment_limit )  else 0 end as payment_over_limit , sum(distinct bet_types.payment_limit) as limit_payment"))
            ->groupBy("bet_types.name", "bet_transactions.bet_number")
            ->havingRaw(" sum(bet_transactions.bet_amount) -  sum( distinct bet_types.payment_limit )  > 1 ")
            ->orderBy(DB::raw("sum(bet_transactions.bet_amount)"), "desc")
        ->get();

        $this->summaryTrans = $dbDummaryByType;

        foreach ($this->summaryTrans as $item){
            $this->sumaryBetAmount += $item->bet_amount;
            $this->summaryPaymentOverLimit += $item->payment_over_limit;
        }
                
    }

    public function render()
    {
        $this->summaryByType();
        return view('livewire.print-over-limit');
    }
}
