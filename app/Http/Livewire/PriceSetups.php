<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PriceSetups as Model;
use Debugbar;

class PriceSetups extends Component
{

    public $priceSetups;

    public $price_setups_id;
    public $three_top_baht;
    public $three_tod_baht;
    public $three_bottom_baht;
    public $three_prefix_baht;
    public $two_top_baht;
    public $two_bottom_baht;
    public $run_top_baht;
    public $run_bottom_baht;

    public $isOpen = 0;
    public $actionMode = '';

    protected $rules = [
        'three_top_baht' => 'required|numeric',
        'three_tod_baht' => 'required|numeric',
        'three_bottom_baht' => 'required|numeric',
        'three_prefix_baht' => 'required|numeric',
        'two_top_baht' => 'required|numeric',
        'two_bottom_baht' => 'required|numeric',
        'run_top_baht' => 'required|numeric',
        'run_bottom_baht' => 'required|numeric'
    ];

    public function render()
    {
        $this->priceSetups =  Model::all();
        return view('livewire.price-setups.index');
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
        $this->three_top_baht = '';
        $this->three_tod_baht = '';
        $this->three_bottom_baht = '';
        $this->three_prefix_baht = '';
        $this->two_top_baht = '';
        $this->two_bottom_baht = '';
        $this->run_top_baht = '';
        $this->run_bottom_baht= '';
    }

    public function store()
    {
        $this->validate();

        $model = new Model;
        $model->three_top_baht = $this->three_top_baht;
        $model->three_tod_baht = $this->three_tod_baht;
        $model->three_bottom_baht = $this->three_bottom_baht;
        $model->three_prefix_baht = $this->three_prefix_baht;
        $model->two_top_baht = $this->two_top_baht;
        $model->two_bottom_baht = $this->two_bottom_baht;
        $model->run_top_baht = $this->run_top_baht;
        $model->run_bottom_baht= $this->run_bottom_baht;
        $model->save();

        $this->closeModal();
        $this->resetInputFields();

        $this->alert('success', __('label.msg_save_success', ['attribute' => __('label.price_setup_title')]));
    }

    public function edit($id)
    {
        $model = Model::findOrFail($id);
        $this->three_top_baht = $model->three_top_baht;
        $this->three_tod_baht = $model->three_tod_baht;
        $this->three_bottom_baht = $model->three_bottom_baht;
        $this->three_prefix_baht = $model->three_prefix_baht;
        $this->two_top_baht = $model->two_top_baht;
        $this->two_bottom_baht = $model->two_bottom_baht;
        $this->run_top_baht = $model->run_top_baht;
        $this->run_bottom_baht = $model->run_bottom_baht;

        // Set Id
        $this->price_setups_id = $id;

        // Set Mode
        $this->actionMode = "update";

        $this->openModal();
    }

    public function update($id)
    {
        $this->validate();

        $model = Model::find($id);
        $model->three_top_baht = $this->three_top_baht;
        $model->three_tod_baht = $this->three_tod_baht;
        $model->three_bottom_baht = $this->three_bottom_baht;
        $model->three_prefix_baht = $this->three_prefix_baht;
        $model->two_top_baht = $this->two_top_baht;
        $model->two_bottom_baht = $this->two_bottom_baht;
        $model->run_top_baht = $this->run_top_baht;
        $model->run_bottom_baht= $this->run_bottom_baht;
        $model->save();

        $this->closeModal();
        $this->resetInputFields();

        $this->alert('success', __('label.msg_update_success', ['attribute' => __('label.price_setup_title')]));
    }

    public function delete($id)
    {
        Model::find($id)->delete();
        $this->alert('success', __('label.msg_delete_success', ['attribute' => __('label.price_setup_title')]));
    }

}
