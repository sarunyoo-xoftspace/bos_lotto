<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LotteryBet extends Component
{

    public $customer_name;
    public $mobile;
    public $number;
    public $type;

    /** 19 ประตู */

    public $numberDoorInput;

    protected $rules = [
        'customer_name' => 'required',
        'mobile' => 'required|numeric'
    ];

    protected $messages = [
        'numberDoorInput.required' => 'กรุณากรอกข้อมูล'
    ];


    public function updatedNumberDoorInput() {
        $this->validate([
            'numberDoorInput' => 'required|numeric'
        ]);
    }

    public function roodFront(){
        $this->validate([
            'numberDoorInput' => 'required|numeric'
        ]);

        // TODO




    }

    public function roodBack() {
        $this->validate([
            'numberDoorInput' => 'required|numeric'
        ]);

        // TODO

    }

    public function mount() {

    }

    public function add_profile(){
        $this->validate();
        $this->emitTo('list-bet-number', 'customer_profile', $this->customer_name, $this->mobile);
    }

    public function type_bet($type) {
        $this->type = $type;
    }

    public function render()
    {
        return view('livewire.lottery-bet.index');
    }
}
