<?php

namespace App\Livewire;

use App\Models\Parish;
use LivewireUI\Modal\ModalComponent;

class ViewItem extends ModalComponent
{
    public $item;
    public $model;

    public function mount($item, $model)
    {
        $this->model = "App\Models\\$model";
        $this->item = $this->model::find($item['id']);
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
