<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Batches as Model;

class Batche extends Component
{

    public $lotterId;
    public $lotterDate;
    public $lotterTime;
    public $isExisting = false;
    
    // Store Id for Delete
    public $confirming;
    
    public function mount()
    {
        // Check has data
        $count = Model::where("id", "<>", "")->count();
        if($count > 0){ 
            $this->isExisting = true;
        }   

        // Finding Data
        $model = Model::where("id", "<>", "")->first();
        
        if($model){
            $this->lotterId = $model->id;
            $this->lotterDate = $model->lottery_date;
            $this->lotterTime = $model->lottery_time;    
        }
    }

    protected $rules = [
        'lotterDate' => 'required',
        'lotterTime' => 'required'
    ];
    
    public function save()
    {
        $this->validate();
        
        $model = Model::find($this->lotterId);
        
        if($model) { 
            $model->lottery_date = $this->lotterDate;
            $model->lottery_time = $this->lotterTime;
            $model->save();
            
            $this->lotterId = $model->id;
            
        } else { 
            
            $modelCreate = Model::create([
                'lottery_date' => $this->lotterDate,
                'lottery_time' => $this->lotterTime
            ]);

            $this->lotterId = $modelCreate->id;
        }

        $this->confirming = "";

        $this->emitTo('show-lottery-date', 'show_lottery_date');
        
        $this->alert('success', __('label.msg_save_success', ['attribute' => __('label.batche')]));
    }

    public function confirmDestoy()
    {
        $this->confirming = $this->lotterId;
    }
    
    public function destoy()
    {
        $model = Model::find($this->confirming);
        $model->delete();

        $this->confirming = "";
        $this->lotterId = "";

        $this->emitTo('show-lottery-date', 'show_lottery_date');
        $this->isExisting = false;
        $this->alert('success', __('label.msg_delete_success', ['attribute' => __('label.batche')]));
    }

    public function create()
    {
        $this->lotterDate = "";
        $this->lotterTime = "";
        $this->isExisting = true;
    }

    public function render()
    {
        return view('livewire.batche');
    }


}
