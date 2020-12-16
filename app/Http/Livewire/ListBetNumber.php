<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListBetNumber extends Component
{

    public $bet_customer;
    public $bet_mobile;
    public $bet_number;
    public $bet_type;

    protected $listeners = [
        'customer_profile' => 'show_customer_profile',
        'bet_number' => 'show_bet_number'
    ];

    public function show_customer_profile($bet_customer, $bet_mobile) {
        $this->bet_customer = $bet_customer;
        $this->bet_mobile = $bet_mobile;
    }

    public function show_bet_number() {

    }

    public function render()
    {
        $this->customer_name = 'ไม่ได้ระบุ';
        $this->mobile = "ไม่ได้ระบุ";

        return view('livewire.list-bet-number.index');
    }
}
