<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BetTransaction;
use App\Models\NumberLimit;
use App\Models\GovernmentLottery;

class ClearTransaction extends Component
{
    public $processScoreClear = 0;
    public $cssDisplayClear;

    public $confirmingStatus = false;

    public function getConfirmStatus() { 
        $this->confirmingStatus = true;    
    }
    
    public function confirimingAction()
    {
        // 1. Clear Transaction 
        BetTransaction::truncate();
        $this->processScoreClear = 40;

        // 2. Clear Number Limit
        NumberLimit::truncate();
        $this->processScoreClear = 80;
        
        // 3. Clear reward
        GovernmentLottery::truncate();
        $this->processScoreClear = 100;
    
    }

    public function clearProcessScore()
    {
        $this->processScoreClear = 0;
        $this->confirmingStatus = false;
    }

    public function render()
    {
        return view('livewire.clear-transaction');
    }
}
