<?php

namespace App\Livewire;

use Livewire\Component;

class InfoCard extends Component
{
    public $items;

    public $clickable;

    public function mount($items, $clickable = false)
    {
        $this->items = $items;
        $this->clickable = $clickable;
    }

    public function render()
    {
        return view('livewire.info-card');
    }
}
