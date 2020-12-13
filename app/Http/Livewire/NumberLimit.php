<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\NumberLimit as Model;

class NumberLimit extends Component
{

    public $number_limit_id;
    public $number_limit;
    public $payment_amount_percent;
    public $payment_amount_baht;
    public $batch_id;

    public $isOpen = 0;
    public $actionMode = '';

    public $models;
    public $model;

    protected $rules = [
        'number_limit' => 'required|numeric',
        'payment_amount_percent' => 'numeric',
        'payment_amount_baht' => 'numeric'
    ];

    public function render()
    {
        $this->models = Model::all();
        return view('livewire.number-limit.index');
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
    }

    public function store()
    {
        $this->validate();

        $model = new Model;
        $model->number_limit = $this->number_limit;
        $model->payment_amount_percent = $this->payment_amount_percent;
        $model->payment_amount_baht = $this->payment_amount_baht;
        $model->save();

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
