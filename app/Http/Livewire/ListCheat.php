<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\BetTransaction as Model;
use App\Models\Batches as Batches;


class ListCheat extends Component
{
    
    use WithPagination;
    
    /** Configuration Paginate */
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    
    /** Batches */
    public $batches;

    public $isShowDetail = false;

    public $bet_details;

    public $bet_customer;
    public $bet_mobile;

    public function mount()
    {
        $this->batches = Batches::first();
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function showDetail($c, $m)
    {
        $this->isShowDetail = true;
        $this->bet_customer = $c;
        $this->bet_mobile = $m;
        
        $this->bet_details = DB::table('bet_transactions')
            ->join('bet_types', 'bet_types.id' , '=' , 'bet_transactions.bet_type_id')
            // ->select("bet_transactions.*")
            ->select("bet_transactions.id", "bet_customer_name", "bet_customer_mobile", "bet_number", "bet_amount", "bet_types.name as bet_type_name")
            ->where('bet_transactions.bet_customer_name', '=', $c)
            ->where('bet_transactions.bet_customer_mobile', '=', $m)
            ->get();

    }
    
    public function render()
    {
        return view('livewire.list-cheat',[
            'items' =>  DB::table('bet_transactions')
                        ->select("bet_customer_name", "bet_customer_mobile")
                        ->where('bet_transactions.bet_customer_name', 'like', '%'.$this->search.'%')
                        ->groupBy('bet_customer_name', 'bet_customer_mobile')
                        ->paginate(10)
                        
        ]);
    }
}
