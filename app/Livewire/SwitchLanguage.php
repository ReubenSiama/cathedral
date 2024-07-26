<?php

namespace App\Livewire;

use App\Models\Language;
use Livewire\Component;

class SwitchLanguage extends Component
{
    public $languages;

    public $id;

    public function mount()
    {
        $this->languages = Language::all();
    }

    public function switchLanguage($locale)
    {
        session(['locale' => $locale]);
        app()->setLocale($locale);

        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.switch-language');
    }
}
