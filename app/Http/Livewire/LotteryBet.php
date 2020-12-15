<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LotteryBet extends Component
{

    public $customer_name;
    public $mobile;
    public $number_bet;
    public $type_id;

    public function mount() {

    }

    public function render()
    {
        return view('livewire.lottery-bet.index');
    }
}
