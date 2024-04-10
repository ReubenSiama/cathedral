<?php

namespace App\Http\Controllers;

use App\Models\Baptism;
use PDF;

class CertificateController extends Controller
{
    public function baptism(Baptism $baptism)
    {
        // return view('certificates.baptism', compact('baptism'));

        return PDF::loadView('certificates.baptism', compact('baptism'))
            ->setPaper('a5')
            ->stream('baptism-certificate.pdf');
    }
}
