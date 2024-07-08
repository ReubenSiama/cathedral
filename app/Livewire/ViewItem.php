<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

class ViewItem extends ModalComponent
{
    public $item;

    public function mount($item)
    {
        $this->item = $item;
    }

    public static function modalMaxWidth(): string
    {
        return '6xl';
    }

    public function render()
    {
        return view('livewire.view-item');
    }
}
