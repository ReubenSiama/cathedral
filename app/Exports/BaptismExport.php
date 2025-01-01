<?php

namespace App\Exports;

use App\Models\Baptism;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BaptismExport implements FromView, ShouldAutoSize
{
    public function __construct(public $from, public $to)
    {
    }

    /**
     * @return \Illuminate\Support\View
     */
    public function view(): View
    {
        return view('exports.baptism', [
            'baptisms' => Baptism::whereBetween('date_of_baptism', [$this->from, $this->to])->get(),
        ]);
    }
}
