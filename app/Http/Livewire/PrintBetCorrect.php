<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PrintBetCorrect extends Component
{
    public function render()
    {
        return view('livewire.print-bet-correct',[

            'items' => DB::table('bet_transactions')
            ->join('bet_types', 'bet_types.id' , '=' , 'bet_transactions.bet_type_id')
            ->select("bet_transactions.id", "bet_customer_name", "bet_customer_mobile", "bet_number", "bet_amount", "bet_types.name as bet_type_name", "payment_amount", "separate_bet_amount", "separate_payment_amount")
            ->where("flag_is_correct" , '=', 'YES')
            ->get()

        ]);
    }
}
