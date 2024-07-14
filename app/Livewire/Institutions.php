<?php

namespace App\Livewire;

use App\Models\Institution;
use Livewire\Component;

class Institutions extends Component
{
    public $institutions;

    public $institution;

    public function mount()
    {
        $this->institution = $this->institutions->first();
    }

    public function changeInstitution(Institution $institution)
    {
        $this->institution = $institution;
    }

    public function render()
    {
        return view('livewire.institutions');
    }
}
