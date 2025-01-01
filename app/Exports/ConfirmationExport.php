<?php

namespace App\Exports;

use App\Models\Confirmation;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ConfirmationExport implements FromView, ShouldAutoSize
{
    public function __construct(public $from, public $to)
    {
    }

    public function view(): View
    {
        return view('exports.confirmation', [
            'confirmations' => Confirmation::whereBetween('confirmation_date', [$this->from, $this->to])->get(),
        ]);
    }
}
