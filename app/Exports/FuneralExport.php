<?php

namespace App\Exports;

use App\Models\Funeral;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FuneralExport implements FromView, ShouldAutoSize
{
    public function __construct(public $from, public $to){}
    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {
        return view('exports.funeral', [
            'funerals' => Funeral::whereBetween('date_of_burial', [$this->from, $this->to])->get()
        ]);
    }
}
