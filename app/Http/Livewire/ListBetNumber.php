<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BetType;
use App\Models\BetTransaction;
use App\Models\BetTemp;

/** 
 * Class เป็น component ทางด้านขวามือ เป็นการแสดงรายละเอียด ในการแทงหวย
 */
class ListBetNumber extends Component
{

    // User Profile Bet Number
    public $bet_customer;
    public $bet_mobile;

    // Store rood number render
    public $roodNumberArray;

    // for confirm delete
    public $confirming = false;

    // เก็บข้อมูลเลขการแทง
    public $list_bet_number = [];

    protected $listeners = [
        'customer_profile' => 'show_customer_profile',
        'bet_number' => 'show_bet_number',
        'addBet19Door' => 'add_bet_19_door',
        'add_bet_number' => 'add_bet_number',
        'add_bet_run' => 'add_bet_run'
    ];

    public function show_customer_profile($bet_customer, $bet_mobile) {
        $this->bet_customer = $bet_customer;
        $this->bet_mobile = $bet_mobile;
    }

    public function add_bet_number($input_number, $amount_bet, $bet_type)
    {
        $model = BetType::where('flag_code', '=', $bet_type)->first();

        BetTemp::create([
            'bet_number' =>  (string)$input_number,
            'amount_baht' => $amount_bet,
            'bet_type' =>  $model->name,
            'bet_type_id' => $model->id, // for referent
            'amount_reward' => ($model->reward_amount_baht * $amount_bet) 
        ]);        
    }

    public function add_bet_19_door($input_number, $amount_bet, $bet_type)
    {

        $this->roodNumberArray = array();
        
        $bet_number_array = array();

        // Display บนหน้าจอ
        for($i = 0; $i <= 99; $i++) {

            $numberForBet = '';

            if(strlen($i.'') == 1) {
                $numberForBet = '0'.$i;
            } else {
                $numberForBet = $i;
            }

            $val1 = substr($numberForBet, 0, 1);
            if($input_number == $val1){
                array_push($bet_number_array, $numberForBet);
            }

            $val2 = substr($numberForBet, 1, 1);
            if($input_number == $val2){
                array_push($bet_number_array, $numberForBet);
            }

            $val3 = substr($numberForBet,0,2);
            if($input_number == $val3){
                array_push($bet_number_array, $numberForBet);
            }

        }

        // sort order
        $this->roodNumberArray = array_values(array_unique($bet_number_array));

        // Add Bet Number to List
        for($i = 0; $i <= count($this->roodNumberArray) - 1; $i++) { 

            $model = BetType::where('flag_code', '=', $bet_type)->first();
           
            BetTemp::create([
                'bet_number' => (string)$this->roodNumberArray[$i],
                'amount_baht' => $amount_bet,
                'bet_type' =>  $model->name,
                'bet_type_id' => $model->id, // for referent
                'amount_reward' => ($model->reward_amount_baht * $amount_bet) 
            ]);    

        }
    
    }
    
    public function clearBet()
    {
        $bet_types = BetTemp::all();
        foreach($bet_types as $item) {
            $model = BetTemp::find($item->id);
            $model->delete();
        }
        $this->confirming = false;
    }

    public function confirmClearBet()
    {
        $this->confirming = true;
    }
    
    public function clearCancel()
    {
        $this->confirming = false;
    }

    public function remove($id)
    {
        $model = BetTemp::find($id);
        $number_delete = $model->bet_number;
        $model->delete();
        $this->alert('success', __('label.msg_delete_success', ['attribute' => $number_delete]));
    }

    public function confirmBet()
    {
        if(BetTemp::count() == 0){
            $this->alert('warning', __('label.msg_confirm_bet_warninng'));
            return;
        }

        if($this->bet_customer == "") { 
            $this->alert('error', __('กรุณาตรวจสอบชื่อโพย'));
            return;
        }
        
        foreach(BetTemp::all() as $item) { 
            
            BetTransaction::create([
                'bet_customer_name' => $this->bet_customer,
                'bet_customer_mobile' => !empty($this->bet_mobile) ? $this->bet_mobile : "",
                'bet_number' => $item->bet_number,
                'bet_amount' => $item->amount_baht,
                'bet_type_id' => $item->bet_type_id,
                'payment_status' => 'NO'
            ]);
            
        }
        
        // Call Clear Bet
        $this->clearBet();
        
        // Clear customer
        $this->bet_customer = "";
        $this->bet_mobile = "";
        
        $this->alert('success', __('label.msg_send_bet_success'));
    }
    
    public function render()
    {
        $this->customer_name = 'ไม่ได้ระบุ';
        $this->mobile = "ไม่ได้ระบุ";
        return view('livewire.list-bet-number.index',['bet_temps' => BetTemp::all()]);
    }
}
