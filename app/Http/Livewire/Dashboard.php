<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\Models\GovernmentLottery;
use App\Models\BetType;
use App\Models\BetTransaction;
use Debugbar;

class Dashboard extends Component
{
    public $summary_amount_bet;
    public $count_customer;

    // Css Display 
    public $cssDisplay;

    public $progresScore;

    public function mount()
    {
        // Config css properties
        $this->cssDisplay = "show";

        $this->progresScore = 0;

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
            
            Debugbar::info("Bet Type : " . $item->name );
            
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
                # code...
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
            
            case 'cal_32':
                
                break;
            
            case 'cal_42': 
                #
                break;

            default:
                # code...
                break;
        }
        
        $this->progresScore = 100;
    }

    private  function cal_three_digit_top($betType, $bet_trans)
    {
        # code...
        $lottery = GovernmentLottery::where("id" , "<>", "'")->first();

        $reward_three_digit = substr($lottery->first_prize, 3, 3);
        
        Debugbar::info("รางวัลที่ 1 > " . $lottery->first_prize . " 3 ตัวบน " .$reward_three_digit);

        foreach($bet_trans as $item) {
        
            if($item->bet_number == $reward_three_digit) { 
                Debugbar::info(" คุณถูกรางวัล 3 ตัวบน" . $item->bet_number );
                $correct_tran = BetTransaction::find($item->id);
                $correct_tran->payment_amount = $betType->reward_amount_baht * $correct_tran->bet_amount;
                $correct_tran->flag_is_correct = "YES";
                $correct_tran->payment_status = "NO";
                $correct_tran->save();   
            }   
        }
    }

    private  function cal_three_digit_bottom($betType, $bet_trans)
    {
        # code...
        $lottery = GovernmentLottery::where("id" , "<>", "'")->first();

        foreach($bet_trans as $item) {
        
            if(
                $item->bet_number == $lottery->three_digit_prefix_1 || $item->bet_number == $lottery->three_digit_prefix_2 ||
                $item->bet_number == $lottery->three_digit_suffix_1 || $item->bet_number == $lottery->three_digit_suffix_2
                ) { 

                Debugbar::info(" คุณถูกรางวัล 3 ตัวบน" . $item->bet_number );
                $correct_tran = BetTransaction::find($item->id);
                $correct_tran->payment_amount = $betType->reward_amount_baht * $correct_tran->bet_amount;
                $correct_tran->flag_is_correct = "YES";
                $correct_tran->payment_status = "NO";
                $correct_tran->save();   
            }            
        }
    }
    
    private  function cal_two_digit_top($betType, $bet_trans)
    {
        $lottery = GovernmentLottery::where("id" , "<>", "'")->first();
        $two_top_digit = substr($lottery->first_prize, 4, 2);   
        foreach($bet_trans as $item) {    
            if($item->bet_number ==  $two_top_digit) {
               
                Debugbar::info(" คุณถูกรางวัล 2 ตัวบน" . $item->bet_number );
                $correct_tran = BetTransaction::find($item->id);
                $correct_tran->payment_amount = $betType->reward_amount_baht * $correct_tran->bet_amount;
                $correct_tran->flag_is_correct = "YES";
                $correct_tran->payment_status = "NO";
                $correct_tran->save();   

            }
        }
    }
    
    
    private  function cal_two_digit_bottom($betType, $bet_trans)
    {
        $lottery = GovernmentLottery::where("id" , "<>", "'")->first();
        foreach($bet_trans as $item) {    
            if($item->bet_number ==  $lottery->two_digit_suffix) {
                Debugbar::info(" คุณถูกรางวัล 2 ตัวบน" . $item->bet_number );
                $correct_tran = BetTransaction::find($item->id);
                $correct_tran->payment_amount = $betType->reward_amount_baht * $correct_tran->bet_amount;
                $correct_tran->flag_is_correct = "YES";
                $correct_tran->payment_status = "NO";
                $correct_tran->save();   

            }
        }
    }

    

    
    public function render()
    {
        return view('livewire.dashboard');
    }
}
