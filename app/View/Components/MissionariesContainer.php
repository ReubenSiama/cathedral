<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MissionariesContainer extends Component
{
    public $missionaries;

    /**
     * Create a new component instance.
     */
    public function __construct($missionaries)
    {
        $this->missionaries = $missionaries;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.missionaries-container');
    }
}
