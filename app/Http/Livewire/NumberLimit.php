<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\NumberLimit as Model;
use App\Models\Batches as Batches;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class NumberLimit extends Component
{

    use WithPagination;

    public $number_limit_id;
    public $number_limit;
    public $payment_amount_percent;
    public $payment_amount_baht;
    public $batch_id;

    public $isOpen = 0;
    public $actionMode = '';

    public $models;
    public $model;

    /** Configuration Paginate */
    protected $paginationTheme = 'bootstrap';
    public $search = '';

    /** Batches */
    public $batches;

    /** revest */
    public $is_revest;

    public function mount()
    {
        # code...
        $this->batches = Batches::first();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $rules = [
        'number_limit' => 'required|numeric',
        'payment_amount_percent' => 'numeric',
        'payment_amount_baht' => 'numeric'
    ];

    public function render()
    {
        return view('livewire.number-limit.index',[
            // 'items' => Model::where('number_limit', 'like', '%'.$this->search.'%')->paginate(3)
            'items' => DB::table('number_limits')
                    ->join('batches', 'batches.id', '=', 'number_limits.batch_id')
                    ->select('batches.lottery_date',  'number_limit' , 'payment_amount_percent' , 'payment_amount_baht', 'number_limits.id')
                    ->where('number_limits.number_limit', 'like', '%'.$this->search.'%')
                    ->paginate(10)
        ]);
    }

    public function create(){
        $this->actionMode = "insert";
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->number_limit = '';
        $this->payment_amount_percent = '';
        $this->payment_amount_baht = '';
        $this->is_revest = false;
    }

    private function factorial($n){
        if($n==1) return $n;
        else return $n * $this->factorial($n-1);
    }

    public function store()
    {
        $this->validate();

        if($this->is_revest){

            $a = $this->number_limit;
            $_a = str_split($a);
            $num= count($_a);
            $ele_amnt = $this->factorial($num);
            $output = array();
            
            //while(count($output) < $ele_amnt){
            for($i = 0; $i < 200; $i++){
                shuffle($_a);
                $justnumber = implode("",$_a);	
                if(!in_array( $justnumber , $output))
                    $output[] = $justnumber;
            
            }
            
            sort($output);

            foreach($output as $key => $val) {
                $model = new Model;
                $model->number_limit = $val;
                $model->payment_amount_percent = !empty($this->payment_amount_percent) ? $this->payment_amount_percent : 0;
                $model->payment_amount_baht = !empty($this->payment_amount_baht) ? $this->payment_amount_baht : 0;
                $model->batch_id = $this->batches->id;
                $model->save();   
            }
            
        } else {
            $model = new Model;
            $model->number_limit = $this->number_limit;
            $model->payment_amount_percent = !empty($this->payment_amount_percent) ? $this->payment_amount_percent : 0;
            $model->payment_amount_baht = !empty($this->payment_amount_baht) ? $this->payment_amount_baht : 0;
            $model->batch_id = $this->batches->id;
            $model->save();
        }

        $this->closeModal();
        $this->resetInputFields();

        $this->alert('success', __('label.msg_save_success', ['attribute' => __('label.number_limit_title')]));
    }

    public function edit($id)
    {
        $model = Model::findOrFail($id);
        $this->number_limit = $model->number_limit;
        $this->payment_amount_percent = $model->payment_amount_percent;
        $this->payment_amount_baht = $model->payment_amount_baht;

        // Set Id
        $this->number_limit_id = $id;

        // Set Mode
        $this->actionMode = "update";

        $this->openModal();
    }

    public function update($id)
    {
        $this->validate();

        $model = Model::find($id);
        $model->number_limit = $this->number_limit;
        $model->payment_amount_percent = $this->payment_amount_percent;
        $model->payment_amount_baht = $this->payment_amount_baht;
        $model->save();

        $this->closeModal();
        $this->resetInputFields();

        $this->alert('success', __('label.msg_update_success', ['attribute' => __('label.number_limit_title')]));
    }

    public function delete($id)
    {
        Model::find($id)->delete();
        $this->alert('success', __('label.msg_delete_success', ['attribute' => __('label.number_limit_title')]));
    }

}
