<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PriceSetups as Model;
use App\Models\BetType;
use Debugbar;

class PaymentLimit extends Component
{

     // For model
     public $betTypes;
     
     // For Attribute
     public $betTypeId;
     public $betTypeName;
     public $paymentLimitAmount;
     
     // For confirm delete data
     public $confirming;
     
     // For mode action
     public $mode;
 
     protected $rules = [
        'paymentLimitAmount' => 'required|numeric'
     ];
 
     public function mount()
     {
         $this->mode = "list";
         $this->betTypes = BetType::where('flag_calculate', '=', 'YES')->get();
     }
 
     public function update()
     {
         $this->validate();
         
         $model = BetType::find($this->betTypeId);
         if($model){ 
             $model->payment_limit = $this->paymentLimitAmount;
             $model->save();
             $this->alert('success', __('label.msg_save_success', ['attribute' => __('label.price_setup_title')]));
         } else { 
             $this->alert('success', __('label.ex_exception'));
         }
 
         $this->mode = "list";        
         // $this->betTypes = BetType::all();
         $this->betTypes = BetType::where('flag_calculate', '=', 'YES')->get();
     }
 
     public function edit($id) { 
        $model= BetType::find($id);
        $this->betTypeId = $model->id;
        $this->betTypeName = $model->name;
        $this->paymentLimitAmount = $model->payment_limit;
        $this->mode = "update";
     }


    public function render()
    {
        return view('livewire.payment-limit');
    }
}
