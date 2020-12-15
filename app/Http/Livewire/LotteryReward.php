<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Batches;
use App\Models\GovernmentLottery as Model;

class LotteryReward extends Component
{

    public $lottery_reward_id;
    public $first_prize;
	public $three_digit_prefix_1;
	public $three_digit_prefix_2;
	public $three_digit_suffix_1;
	public $three_digit_suffix_2;
    public $two_digit_suffix;

    public $lottery_date;


    protected $rules = [
        'first_prize' => 'nullable|numeric|digits:6',
        'three_digit_prefix_1' => 'nullable|numeric|digits:3',
        'three_digit_prefix_2' => 'nullable|numeric|digits:3',
        'three_digit_suffix_1' => 'nullable|numeric|digits:3',
        'three_digit_suffix_2' => 'nullable|numeric|digits:3',
        'two_digit_suffix' => 'nullable|numeric|digits:2'
    ];

    public function mount()
    {
        if(Model::first() == null)
            $this->lottery_reward_id = '';
        else
            $this->lottery_reward_id  = Model::first()->id;

        $this->lottery_date =  Batches::first()->lottery_date;

        $model = Model::first();

        if($model != null) {

            $this->first_prize = $model->first_prize;
            $this->three_digit_prefix_1 = $model->three_digit_prefix_1;
            $this->three_digit_prefix_2 = $model->three_digit_prefix_2;
            $this->three_digit_suffix_1 = $model->three_digit_suffix_1;
            $this->three_digit_suffix_2 = $model->three_digit_suffix_2;
            $this->two_digit_suffix = $model->two_digit_suffix;
        }
    }

    public function render()
    {
        return view('livewire.lottery-reward.index');
    }

    public function update()
    {
        $this->validate();
        $model = Model::find($this->lottery_reward_id);

        if ($model === null) {
            $model = new Model();
        }

        $model->first_prize = $this->first_prize;
        $model->three_digit_prefix_1 = $this->three_digit_prefix_1;
	    $model->three_digit_prefix_2 = $this->three_digit_prefix_2;
        $model->three_digit_suffix_1 = $this->three_digit_suffix_1;
        $model->three_digit_suffix_2 = $this->three_digit_suffix_2;
        $model->two_digit_suffix = $this->two_digit_suffix;
        $model->save();

        $this->alert('success', __('label.msg_save_success', ['attribute' => __('label.lottery_rewards')]));
    }
}
