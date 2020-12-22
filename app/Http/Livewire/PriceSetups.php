<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PriceSetups as Model;
use App\Models\BetType;
use Debugbar;

class PriceSetups extends Component
{

    // For model
    public $betTypes;
    // public $betType;
    
    // For Attribute
    public $betTypeId;
    public $betTypeName;
    public $betTypeRewardAmount;
    
    // For confirm delete data
    public $confirming;
    
    // For mode action
    public $mode;

    protected $rules = [
        'betTypeRewardAmount' => 'required|numeric'
    ];

    public function mount()
    {
        $this->mode = "list";
        $this->betTypes = BetType::all();
    }

    public function update()
    {
        $this->validate();
        
        $model = BetType::find($this->betTypeId);
        if($model){ 
            $model->reward_amount_baht = $this->betTypeRewardAmount;
            $model->save();
            $this->alert('success', __('label.msg_save_success', ['attribute' => __('label.price_setup_title')]));
        } else { 
            $this->alert('success', __('label.ex_exception'));
        }

        $this->mode = "list";        
        $this->betTypes = BetType::all();
    }

    public function edit($id) { 
        $model= BetType::find($id);
        $this->betTypeId = $model->id;
        $this->betTypeName = $model->name;
        $this->betTypeRewardAmount = $model->reward_amount_baht;
        $this->mode = "update";
    }

    public function render()
    {
        return view('livewire.price-setups.index');
    }

}
