<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TestWire extends Component
{

    public function doSomething()
    {
        # code...
        dd("welcome");
        
    }
    public function render()
    {
        return view('livewire.test-wire');
    }
}
