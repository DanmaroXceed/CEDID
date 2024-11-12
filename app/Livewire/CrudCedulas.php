<?php

namespace App\Livewire;

use Livewire\Component;

class CrudCedulas extends Component
{
    public $num = 3;

    public function render()
    {
        return view('livewire.crud-cedulas', compact('num'));
    }
}
