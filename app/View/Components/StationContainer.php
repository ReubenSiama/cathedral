<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StationContainer extends Component
{
    public $stations;
    /**
     * Create a new component instance.
     */
    public function __construct($stations)
    {
        $this->stations = $stations;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.station-container');
    }
}
