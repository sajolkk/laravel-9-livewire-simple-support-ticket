<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $counter;
    public function __construct()
    {
        $this->counter = 0;
    }
    public function render()
    {
        return view('livewire.counter');
    }

    public function increment()
    {
        $this->counter += 1;
    }

    public function decrement()
    {
        $this->counter -= 1;
    }
}
