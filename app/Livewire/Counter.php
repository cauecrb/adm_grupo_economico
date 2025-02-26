<?php

// app/Livewire/Counter.php
namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Counter extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}