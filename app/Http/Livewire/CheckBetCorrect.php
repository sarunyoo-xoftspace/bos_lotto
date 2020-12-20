<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\BetTransaction as Model;
use App\Models\Batches as Batches;

class CheckBetCorrect extends Component
{
    use WithPagination;
    
    /** Configuration Paginate */
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    
    /** Batches */
    public $batches;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->batches = Batches::first();
    }

    public function render()
    {
        
        return view('livewire.check-bet-correct',[
            'items' => DB::table('bet_transactions')
            ->join('bet_types', 'bet_types.id' , '=' , 'bet_transactions.bet_type_id')
            ->select("bet_transactions.id", "bet_customer_name", "bet_customer_mobile", "bet_number", "bet_amount", "bet_types.name as bet_type_name", "payment_amount")
            ->where('bet_transactions.bet_customer_name', 'like', '%'.$this->search.'%')
            ->where("flag_is_correct" , '=', 'YES')
            ->paginate(10)
        ]);

    }
}
