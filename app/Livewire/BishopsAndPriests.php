<?php

namespace App\Livewire;

use Livewire\Component;

class BishopsAndPriests extends Component
{
    public $current = 'bishops';
    public $bishops;
    public $parishPriests;
    public $assistantParishPriests;

    public $links = [
        [
            'name' => 'Bishops',
            'slug' => 'bishops',
        ],
        [
            'name' => 'Parish Priests',
            'slug' => 'priests',
        ],
        [
            'name' => 'Assistant Parish Priests',
            'slug' => 'asst_priests',
        ]
    ];

    public function mount()
    {
        $this->bishops = \App\Models\Bishop::display()->orderBy('order')->get();
        $this->parishPriests = \App\Models\PriestInParish::parishPriest()->get();
        $this->assistantParishPriests = \App\Models\PriestInParish::assistantPriest()->get();
    }

    public function changeLink($slug){
        $this->current = $slug;
    }

    public function render()
    {
        return view('livewire.bishops-and-priests');
    }
}
