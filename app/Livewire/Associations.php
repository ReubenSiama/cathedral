<?php

namespace App\Livewire;

use App\Models\Association;
use App\Models\AssociationBranch;
use Livewire\Component;

class Associations extends Component
{
    public $associations;

    public $association;

    public $associationId;

    public $branches;

    public $selectedBranch;

    public $branchId;

    public function mount()
    {
        $this->associations = Association::all();
        $this->association = $this->associations->first();
        $this->associationId = $this->association->id;
        $this->changeAssociation($this->associationId);
        $this->changeBranch($this->branches->first()->id);
    }

    public function updatedAssociationId()
    {
        $this->association = Association::find($this->associationId);
        $this->branches = AssociationBranch::where('association_id', $this->associationId)->get();
        $this->selectedBranch = null;
        $this->changeBranch($this->branches?->first()?->id);
    }

    public function changeAssociation($associationId)
    {
        $this->associationId = $associationId;
        $this->updatedAssociationId();
    }

    public function changeBranch($branchId = null)
    {
        if ($branchId) {
            $this->selectedBranch = AssociationBranch::find($branchId);
        }
    }

    public function updatedBranchId()
    {
        $this->changeBranch($this->branchId);
    }

    public function render()
    {
        return view('livewire.associations');
    }
}
