<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;

class InfoCard extends Component
{
    public $items;

    public $clickable;

    #[Url]
    public $station;

    public $model = 'Parish';

    public function mount($items, $clickable = false)
    {
        $this->items = $items;
        $this->clickable = $clickable;
        if($this->station){
            $model = 'App\\Models\\' . $this->model;
            $station = $model::where('slug', $this->station)->first();
            $this->dispatch('openModal', component: 'view-item', arguments: ['item' => $station, 'model' => $this->model]);
        }
    }

    #[On('modalClosed')]
    public function modalClosed()
    {
        if($this->station){
            $this->station = '';
        }
    }

    public function render()
    {
        return view('livewire.info-card');
    }
}
