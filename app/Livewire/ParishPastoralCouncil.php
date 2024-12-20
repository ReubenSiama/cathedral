<?php

namespace App\Livewire;

use App\Enums\ObAndCommitteeType;
use App\Models\ParishPastoralCouncil as ModelsParishPastoralCouncil;
use App\Models\PpcTerm;
use Livewire\Component;

class ParishPastoralCouncil extends Component
{
    public $current = 'about_us';
    public $parishPastoralCouncil;
    public $terms;

    public $links = [
        [
            'name' => 'About Us',
            'slug' => 'about_us',
        ],
        [
            'name' => 'Office Bearers',
            'slug' => 'office_bearers',
        ],
        [
            'name' => 'Committees',
            'slug' => 'committees',
        ]
    ];

    public function mount(){
        $this->parishPastoralCouncil = ModelsParishPastoralCouncil::first();
        $this->terms = PpcTerm::with(['ppcObAndCommittees' => function($query){
            $query->with('members');
        }])->get();
    }

    public function changeLink($slug){
        $this->current = $slug;
    }

    public function render()
    {
        return view('livewire.parish-pastoral-council');
    }
}
