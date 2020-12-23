<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BetType;

class LotteryBet extends Component
{

    public $customer_name;
    public $mobile;
    public $number;

    /** 
     * มี Master Data กำหนดในการใช้งาน
     */
    public $type;
    public $bet_type_title;

    // 19 ประตู 
    public $numberDoorInput;
    public $roodNumberArray;
    public $topOrBottom;

    // 3 ตัว
    public $threeNumbetBet; 

    // 2 ตัว
    public $twoNumbetBet;
    
    
    // จำนวนเงินบาทที่แทง
    public $bathBetPerNumber;

    // Master bet type
    public $bet_types;

    // แสดง Component Bet
    public $show_component_bet;

    // ใช้เก็บค่าว่าต้องการกลับเลขไหม ?
    public $is_revest = false;

    protected $rules = [
        'customer_name' => 'required',
    ];

    protected $messages = [
        'numberDoorInput.required' => 'กรุณากรอกข้อมูล'
    ];

    public function updatedNumberDoorInput() {
        $this->validate([
            'numberDoorInput' => 'required|numeric'
        ]);
    }

    public function updatedBathBetPerNumber(){
        $this->validate([
            'bathBetPerNumber' => 'required|numeric'
        ]);
    }

    public function genNumberRood(){

        $resultValidate = $this->validate([
            'numberDoorInput' => 'required|numeric'
        ]);

        if($resultValidate){
            $this->roodNumberArray = array();
        }

        $input_number = $this->numberDoorInput;

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

        $this->roodNumberArray = array_values(array_unique($bet_number_array));
    }

    public function mount() {
        // Hide bet component
        $this->show_component_bet = "none";
    }

    public function add_profile(){
        $this->validate();
        $this->show_component_bet = "show";
        $this->emitTo('list-bet-number', 'customer_profile', $this->customer_name, $this->mobile);
    }

    public function type_bet($type) {
        $this->bet_type_title =  BetType::where('flag_code', '=', $type)->first()->name;
        $this->type = $type;
    }

    public function confirm19Door() { 
        // 1. Validate Profile Name
        $this->validate([
            'customer_name' => 'required',
            'bathBetPerNumber' => 'required|numeric',
            'numberDoorInput' => 'required|numeric'
        ]);

        // 2. เพิ่มเลข ใส่ LIST
        $this->emitTo('list-bet-number', 'addBet19Door', $this->numberDoorInput, $this->bathBetPerNumber, $this->type);
    
        $this->alert('success', __('label.msg_confirm_bet_success'));

        // 3. Reset Form Bet 
        $this->type = "";
        $this->numberDoorInput = "";
        $this->bathBetPerNumber = "";
        $this->roodNumberArray = array();
    }
    
    public function render()
    {
        // กำหนดปุ๋ม Bet Type
        $this->bet_types = BetType::all();
        return view('livewire.lottery-bet.index');
    }

    public function addBetThreeDigit ()
    {
        $this->validate([
            'threeNumbetBet' => 'required|numeric|digits:3',
            'bathBetPerNumber' => 'required|numeric',
        ]);

        // $this->emitTo('list-bet-number', 'add_bet_number', $this->threeNumbetBet, $this->bathBetPerNumber, $this->type);
        
        if($this->is_revest == true){
        
            $a = $this->threeNumbetBet;
            $_a = str_split($a);
            
            $num= count($_a);
            $ele_amnt = $this->factorial($num);
            $output = array();
            
            while(count($output) < $ele_amnt){
                shuffle($_a);
                $justnumber = implode("",$_a);	
                if(!in_array( $justnumber , $output))
                    $output[] = $justnumber;
            
            }
            sort($output);
            
            foreach($output as $key => $val){
                $this->emitTo('list-bet-number', 'add_bet_number', $val, $this->bathBetPerNumber, $this->type);
            }
        
        } else {
            $this->emitTo('list-bet-number', 'add_bet_number', $this->threeNumbetBet, $this->bathBetPerNumber, $this->type);
        }

        $this->alert('success', __('label.msg_confirm_bet_success'));

        // Reset Form Bet 
        $this->type = "";
        $this->threeNumbetBet = "";
        $this->bathBetPerNumber = "";
        $this->is_revest = false;
    }
    
    public function addBetTwoDigit()
    {
        $this->validate([
            'twoNumbetBet' => 'required|numeric|digits:2',
            'bathBetPerNumber' => 'required|numeric',
        ]);

        
        if($this->is_revest == true){
        
            $a = $this->twoNumbetBet;
            $_a = str_split($a);
            
            $num= count($_a);
            $ele_amnt = $this->factorial($num);
            $output = array();
            
            while(count($output) < $ele_amnt){
                shuffle($_a);
                $justnumber = implode("",$_a);	
                if(!in_array( $justnumber , $output))
                    $output[] = $justnumber;
            
            }
            sort($output);
            
            foreach($output as $key => $val){
                $this->emitTo('list-bet-number', 'add_bet_number', $val, $this->bathBetPerNumber, $this->type);
            }
        
        } else {
            $this->emitTo('list-bet-number', 'add_bet_number', $this->twoNumbetBet, $this->bathBetPerNumber, $this->type);
        }

        $this->alert('success', __('label.msg_confirm_bet_success'));

        // Reset Form Bet 
        $this->type = "";
        $this->twoNumbetBet = "";
        $this->bathBetPerNumber = "";
        $this->is_revest = false;
    }

    
    public function factorial($n){
        if($n==1) return $n;
        else return $n* $this->factorial($n-1);
    }
    
}
