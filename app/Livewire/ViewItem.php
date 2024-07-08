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

    public function close(): void
    {
        $this->dispatch('closeModal');
        $this->dispatch('modalClosed');
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public function render()
    {
        return view('livewire.view-item');
    }
}
