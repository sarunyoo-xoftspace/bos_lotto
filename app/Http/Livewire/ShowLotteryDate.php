<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Batches;

class ShowLotteryDate extends Component
{
    public $showLotteryDate;
    public $showLotteryTime;

    protected $listeners = [
        'show_lottery_date' => 'showLotteryDate'
    ];

    public function showLotteryDate(){
        $model = Batches::where("id", "<>", "")->first();

        if($model){
            $this->showLotteryDate = __("label.lotterDate").' '.$model->lottery_date;    
            $this->showLotteryTime = __("label.lotterTime").' '.$model->lottery_time;
        } else {
            $this->showLotteryDate = '--ยังไม่ได้กำหนด--';
            $this->showLotteryTime = '';
        }
    }

    public function render()
    {
        $this->showLotteryDate();
        return view('livewire.show-lottery-date');
    }
}
