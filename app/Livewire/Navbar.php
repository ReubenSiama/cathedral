<?php

namespace App\Livewire;

use App\Models\SpiritualResourceCategory;
use Livewire\Component;

class Navbar extends Component
{
    public $spiritualResourceCategories;

    public function mount()
    {
        $this->spiritualResourceCategories = SpiritualResourceCategory::all();
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
