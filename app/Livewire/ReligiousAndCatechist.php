<?php

namespace App\Livewire;

use Livewire\Component;

class ReligiousAndCatechist extends Component
{
    public $current = 'catechists';
    public $links = [
        [
            'name' => 'Catechists',
            'slug' => 'catechists',
        ],
        [
            'name' => 'Missionaries From The Parish',
            'slug' => 'missionaries',
        ],
        [
            'name' => 'Religious Institutes',
            'slug' => 'religious-institutes',
        ]
    ];

    public $dioceseCatechists;
    public $localTillNow;
    public $localPast;
    public $localCatechistWriteup;

    public $parishSisters;
    public $parishBrothers;
    public $parishPriests;

    public function mount()
    {
        $this->dioceseCatechists = \App\Models\Catechist::diocese()->get();
        $this->localTillNow = \App\Models\Catechist::localTillNow()->first();
        $this->localPast = \App\Models\Catechist::pastLocal()->get();
        $this->localCatechistWriteup = \App\Models\Setting::where('key', 'local-catechists-writeup')->first();

        $this->parishSisters = \App\Models\ParishMissionary::sisters()->get();
        $this->parishBrothers = \App\Models\ParishMissionary::brothers()->get();
        $this->parishPriests = \App\Models\ParishMissionary::priests()->get();
    }

    public function changeLink($slug){
        $this->current = $slug;
    }

    public function render()
    {
        return view('livewire.religious-and-catechist');
    }
}
