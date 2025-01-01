<?php

namespace App\Exports;

use App\Models\Marriage;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MarriageExport implements FromView, ShouldAutoSize
{
    public function __construct(public $from, public $to)
    {
    }

    public function view(): View
    {
        return view('exports.marriage', [
            'marriages' => Marriage::whereBetween('date_of_marriage', [$this->from, $this->to])->get(),
        ]);
    }
}
