<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListBetNumber extends Component
{

    public $customer_name;
    public $mobile;
    public $number_bet;
    public $type_id;

    public function render()
    {
        return view('livewire.list-bet-number.index');
    }
}
