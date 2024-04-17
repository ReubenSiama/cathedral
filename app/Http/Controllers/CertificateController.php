<?php

namespace App\Http\Controllers;

use App\Models\Baptism;
use App\Models\FirstCommunion;
use PDF;

class CertificateController extends Controller
{
    public function baptism(Baptism $baptism)
    {
        return PDF::loadView('certificates.baptism', compact('baptism'))
            ->setPaper('a5')
            ->stream('baptism-certificate.pdf');
    }

    public function firstCommunion(FirstCommunion $firstCommunion)
    {
        return PDF::loadView('certificates.first-communion', compact('firstCommunion'))
            ->setPaper('a4')
            ->stream("$firstCommunion->name Certificate.pdf");
    }
}
