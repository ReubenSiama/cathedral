<?php

namespace App\Exports;

use App\Models\FirstCommunion;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FirstCommunionExport implements FromView, ShouldAutoSize
{
    public function __construct(public $from, public $to)
    {
    }

    public function view(): View
    {
        return view('exports.first-communion', [
            'firstCommunions' => FirstCommunion::whereBetween('date_of_first_communion', [$this->from, $this->to])->get(),
        ]);
    }
}
