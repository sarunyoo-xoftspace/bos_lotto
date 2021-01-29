<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\DB;
use App\Models\BetTransaction as Model;
use App\Models\Batches as Batches;

class BetOverLimit extends Component
{
    public $isShowDetail = false;
    public $bet_details;
    public $bet_customer;
    public $bet_mobile;

    public function showDetail($c, $m)
    {

        $this->isShowDetail = true;
        $this->bet_customer = $c;
        $this->bet_mobile = $m;
        
        $this->bet_details = DB::table('bet_transactions')
            ->join('bet_types', 'bet_types.id' , '=' , 'bet_transactions.bet_type_id')
            ->select(DB::raw("bet_transactions.id, bet_customer_name, bet_customer_mobile, bet_number, bet_amount, bet_types.name as bet_type_name, case when bet_amount > bet_types.payment_limit then bet_amount - bet_types.payment_limit  else 0 end as limit_amount_over, payment_limit"))
            // ->select("bet_transactions.id", "bet_customer_name", "bet_customer_mobile", "bet_number", "bet_amount", "bet_types.name as bet_type_name", "case when bet_amount > bet_types.payment_limit then bet_amount - bet_types.payment_limit  else 0 end as limit_amount_over")
            ->where('bet_transactions.bet_customer_name', '=', $c)
            ->where('bet_transactions.bet_customer_mobile', '=', $m)
            ->get();
    }

    public function backToMainPage(){
        $this->isShowDetail = false;
    }

    public function render()
    {
        return view('livewire.bet-over-limit',
        [
            'items' =>  DB::table('bet_transactions')
            ->select("bet_customer_name", "bet_customer_mobile",  DB::raw('sum(bet_amount) as sum_bet_amount'))
        //     ->where('bet_transactions.bet_customer_name', 'like', '%'.$this->search.'%')    
            ->groupBy('bet_customer_name', 'bet_customer_mobile')
            ->paginate(10)
        ]);

    }
}
