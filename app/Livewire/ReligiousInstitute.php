<?php

namespace App\Livewire;

use App\Models\ReligiousInstitute as ModelsReligiousInstitute;
use Livewire\Component;

class ReligiousInstitute extends Component
{
    public $institutes;

    public $selectedInstituteId;

    public $selectedInstitute;

    public function mount()
    {
        $this->institutes = ModelsReligiousInstitute::all();
        $this->selectedInstitute = ModelsReligiousInstitute::first();
    }

    public function changeInstitute($id)
    {
        $this->selectedInstitute = ModelsReligiousInstitute::find($id);
    }

    public function updatedSelectedInstituteId()
    {
        $this->changeInstitute($this->selectedInstituteId);
    }

    public function render()
    {
        return view('livewire.religious-institute');
    }
}
