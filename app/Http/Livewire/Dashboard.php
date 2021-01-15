<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\Models\GovernmentLottery;
use App\Models\BetType;
use App\Models\BetTransaction;
use App\Models\NumberLimit;
use Debugbar;

class Dashboard extends Component
{
    public $summary_amount_bet;
    public $count_customer;

    // Css Display 
    public $cssDisplay;

    public $progresScore;

    protected $listeners = [
        'update_darhboard' => 'update_darhboard'
    ];

    public function update_darhboard() {    
        // load summary darhboard 
        $this->load_summary_dashboard();
    }
    
    public function mount()
    {
        // Config css properties
        $this->cssDisplay = "show";

        $this->progresScore = 0;

        // load summary darhboard 
        $this->load_summary_dashboard();
    }


    private function load_summary_dashboard()
    {
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
    }
    
    public function processBetNumber()
    {
        // Step
        $step1 = true;
        
        // 1. Get all BET TYPE
        foreach(BetType::all() as $item){
            
            // Step 1
            if($step1 == true){
                $this->progresScore = 20;
            }
                
            $bet_trans = BetTransaction::where("bet_type_id", '=', $item->id)->get();
            
            foreach($bet_trans as $bet_item) { 
                $this->process($item, $bet_trans);
            }
            
            $step1 = false;
        }
    }

    private  function process($betType, $bet_trans)
    {
        
        Debugbar::info("Cal Type : " . $betType->cal_type );

        switch ($betType->cal_type) {
            case 'cal_three_digit_top':
                $this->cal_three_digit_top($betType, $bet_trans);
                $this->progresScore = 30;
                break;

            case 'cal_three_digit_bottom':
                $this->cal_three_digit_bottom($betType, $bet_trans);
                $this->progresScore = 40;
                break;

            case 'cal_two_digit_top':
                $this->cal_two_digit_top($betType, $bet_trans);
                $this->progresScore = 50;
                break;
            
            case 'cal_two_digit_bottom':
                $this->cal_two_digit_bottom($betType, $bet_trans);
                $this->progresScore = 60;
                break;
            
            case 'cal_tod':
                $this->cal_tod($betType, $bet_trans);
                $this->progresScore = 70;
                break;

            case 'cal_run_top':
                $this->cal_run_top($betType, $bet_trans);
                $this->progresScore = 80;
                break;
            
            default:
                break;
        }
        
        $this->progresScore = 100;
    }

    private  function cal_three_digit_top($betType, $bet_trans)
    {
        $lottery = GovernmentLottery::where("id" , "<>", "'")->first();
        $reward_three_digit = substr($lottery->first_prize, 3, 3);
        foreach($bet_trans as $item) {
        
            if($item->bet_number == $reward_three_digit) { 
                
                $correct_tran = BetTransaction::find($item->id);
                $reward_amount = 0;

                // Check Price Limit
                if($model_number = NumberLimit::where("number_limit", '=', $item->bet_number)->first())
                {
                    $correct_tran->payment_amount = (( $betType->reward_amount_baht * $correct_tran->bet_amount ) * $model_number->payment_amount_percent ) / 100;
                } else {
                    $correct_tran->payment_amount = $betType->reward_amount_baht * $correct_tran->bet_amount;
                }
                
                $correct_tran->flag_is_correct = "YES";
                $correct_tran->payment_status = "NO";
                $correct_tran->save();   
            }   
        }
    }

    private  function cal_three_digit_bottom($betType, $bet_trans)
    {
        $lottery = GovernmentLottery::where("id" , "<>", "'")->first();

        foreach($bet_trans as $item) {
        
            if(
                $item->bet_number == $lottery->three_digit_prefix_1 || $item->bet_number == $lottery->three_digit_prefix_2 ||
                $item->bet_number == $lottery->three_digit_suffix_1 || $item->bet_number == $lottery->three_digit_suffix_2
                ) { 

                /*
                Debugbar::info(" คุณถูกรางวัล 3 ตัวบน" . $item->bet_number );
                $correct_tran = BetTransaction::find($item->id);
                $correct_tran->payment_amount = $betType->reward_amount_baht * $correct_tran->bet_amount;
                $correct_tran->flag_is_correct = "YES";
                $correct_tran->payment_status = "NO";
                $correct_tran->save();
                */

                $correct_tran = BetTransaction::find($item->id);
                $reward_amount = 0;

                // Check Price Limit
                if($model_number = NumberLimit::where("number_limit", '=', $item->bet_number)->first())
                {
                    $correct_tran->payment_amount = (( $betType->reward_amount_baht * $correct_tran->bet_amount ) * $model_number->payment_amount_percent ) / 100;
                } else {
                    $correct_tran->payment_amount = $betType->reward_amount_baht * $correct_tran->bet_amount;
                }
                
                $correct_tran->flag_is_correct = "YES";
                $correct_tran->payment_status = "NO";
                $correct_tran->save();   
            }            
        }
    }
    
    /** คำนวน เลข 2 ตัวบน */
    private  function cal_two_digit_top($betType, $bet_trans)
    {
        $lottery = GovernmentLottery::where("id" , "<>", "")->first();
        $two_top_digit = substr($lottery->first_prize, 4, 2);   
        foreach($bet_trans as $item) {    
            if($item->bet_number ==  $two_top_digit) {
                
                $correct_tran = BetTransaction::find($item->id);
                $reward_amount = 0;

                // Check Price Limit
                if($model_number = NumberLimit::where("number_limit", '=', $item->bet_number)->first())
                {
                    $correct_tran->payment_amount = (( $betType->reward_amount_baht * $correct_tran->bet_amount ) * $model_number->payment_amount_percent ) / 100;
                } else {
                    $correct_tran->payment_amount = $betType->reward_amount_baht * $correct_tran->bet_amount;
                }
                
                $correct_tran->flag_is_correct = "YES";
                $correct_tran->payment_status = "NO";
                $correct_tran->save();  
            }
        }
    }
    
    /** คำนวน เลข 2 ตัววล่าง */
    private  function cal_two_digit_bottom($betType, $bet_trans)
    {
        $lottery = GovernmentLottery::where("id" , "<>", "")->first();
        foreach($bet_trans as $item) {    
            if($item->bet_number ==  $lottery->two_digit_suffix) {
                $correct_tran = BetTransaction::find($item->id);
                $reward_amount = 0;

                // Check Price Limit
                if($model_number = NumberLimit::where("number_limit", '=', $item->bet_number)->first())
                {
                    $correct_tran->payment_amount = (( $betType->reward_amount_baht * $correct_tran->bet_amount ) * $model_number->payment_amount_percent ) / 100;
                } else {
                    $correct_tran->payment_amount = $betType->reward_amount_baht * $correct_tran->bet_amount;
                }
                
                $correct_tran->flag_is_correct = "YES";
                $correct_tran->payment_status = "NO";
                $correct_tran->save();  
            }
        }
    }

    /** คำนวน เลข วิ่งบน */
    private  function cal_run_top($betType, $bet_trans)
    {
        
        $lottery = GovernmentLottery::where("id" , "<>", "")->first();
        $reward_three_digit = substr($lottery->first_prize, 3, 3);

        foreach($bet_trans as $item) {    
            
            // if($item->bet_number ==  $lottery->two_digit_suffix) {
            $pos = strpos($reward_three_digit, $item->bet_number);
            if($pos !== false) {
                   
                $correct_tran = BetTransaction::find($item->id);
                $reward_amount = 0;

                // Check Price Limit
                if($model_number = NumberLimit::where("number_limit", '=', $item->bet_number)->first())
                {
                    $correct_tran->payment_amount = (( $betType->reward_amount_baht * $correct_tran->bet_amount ) * $model_number->payment_amount_percent ) / 100;
                } else {
                    $correct_tran->payment_amount = $betType->reward_amount_baht * $correct_tran->bet_amount;
                }
                
                $correct_tran->flag_is_correct = "YES";
                $correct_tran->payment_status = "NO";
                $correct_tran->save();  
            }
        }
    }
    
    
    /** คำนวนเลข วิ่งล่าง */
    private  function cal_run_bottom($betType, $bet_trans)
    {
        
        $lottery = GovernmentLottery::where("id" , "<>", "")->first();
        

        foreach($bet_trans as $item) {    
            
            $pos = strpos($lottery->two_digit_suffix, $item->bet_number);
            
            if($pos !== false) {
                   
                $correct_tran = BetTransaction::find($item->id);
                $reward_amount = 0;

                // Check Price Limit
                if($model_number = NumberLimit::where("number_limit", '=', $item->bet_number)->first())
                {
                    $correct_tran->payment_amount = (( $betType->reward_amount_baht * $correct_tran->bet_amount ) * $model_number->payment_amount_percent ) / 100;
                } else {
                    $correct_tran->payment_amount = $betType->reward_amount_baht * $correct_tran->bet_amount;
                }
                
                $correct_tran->flag_is_correct = "YES";
                $correct_tran->payment_status = "NO";
                $correct_tran->save();  
            }
        }
    }
    
    /** คำนวน 3 ตัวโต๊ด */
    private  function cal_tod($betType, $bet_trans)
    {
        $lottery = GovernmentLottery::where("id" , "<>", "")->first();
        $reward_three_digit = substr($lottery->first_prize, 3, 3);

        foreach($bet_trans as $item) {    
            
            $isCorrect = $this->calTod3Number($item->bet_number, $reward_three_digit);
            
            if($isCorrect) {

                $correct_tran = BetTransaction::find($item->id);
                $reward_amount = 0;

                // Check Price Limit
                if($model_number = NumberLimit::where("number_limit", '=', $item->bet_number)->first())
                {
                    $correct_tran->payment_amount = (( $betType->reward_amount_baht * $correct_tran->bet_amount ) * $model_number->payment_amount_percent ) / 100;
                } else {
                    $correct_tran->payment_amount = $betType->reward_amount_baht * $correct_tran->bet_amount;
                }
                
                $correct_tran->flag_is_correct = "YES";
                $correct_tran->payment_status = "NO";
                $correct_tran->save();  
            }
        }
       
    }

    
    // วิธีการคำนวน 3 ตัวโต๊ด
    public function calTod3Number($number,  $numCorrect) {

        $arrNumber = str_split($number);

        $tod1 =  "";
        $tod2 =  "";
        $tod3 =  "";
        $tod4 =  "";
        $tod5 =  "";


        if ($arrNumber[0] != $arrNumber[1] && $arrNumber[0] != $arrNumber[2] && $arrNumber[1] != $arrNumber[2]) //เลขไม่ซ้ำกัน 243
        {
            $tod1 = $arrNumber[0] . $arrNumber[2] . $arrNumber[1]; //  (234)
            $tod2 = $arrNumber[1] . $arrNumber[0] . $arrNumber[2]; //  (423)
            $tod3 = $arrNumber[1] . $arrNumber[2] . $arrNumber[0]; //  (432)
            $tod4 = $arrNumber[2] . $arrNumber[0] . $arrNumber[1]; //  (324)
            $tod5 = $arrNumber[2] . $arrNumber[1] . $arrNumber[0]; //  (342)

        } else if ($arrNumber[0] == $arrNumber[1]) { //ตำแหน่ง 1 2 เป็นเลขเดียวกัน 223

            $tod1 = $arrNumber[0] . $arrNumber[2] . $arrNumber[1];
            $tod2 = $arrNumber[2] . $arrNumber[1] . $arrNumber[0];

        } else if ($arrNumber[1] == $arrNumber[2]) { //ตำแหน่ง 2 3 เป็นเลขเดียวกัน 244

            $tod1 = $arrNumber[1] . $arrNumber[0] . $arrNumber[2];
            $tod2 = $arrNumber[1] . $arrNumber[2] . $arrNumber[0];

        } else if ($arrNumber[1] == $arrNumber[2]) { //ตำแหน่ง 2 3 เป็นเลขเดียวกัน 242

            $tod1 = $arrNumber[0] . $arrNumber[2] . $arrNumber[1];
            $tod2 = $arrNumber[1] . $arrNumber[0] . $arrNumber[2];

        } else if ($arrNumber[1] == $arrNumber[2]) { //เลขตอง

            $tod1 = $numCorrect;
        }

        if($numCorrect == $tod1) {
            return true;

        } else if($numCorrect == $tod2) {
            return true;

        }else if($numCorrect == $tod3) {
            return true;

        } else if($numCorrect == $tod4) {
            return true;

        } else if($numCorrect == $tod5) {
            return true;

        } else {
            return false;
        }
    }
    
    public function render()
    {
        return view('livewire.dashboard');
    }
}
