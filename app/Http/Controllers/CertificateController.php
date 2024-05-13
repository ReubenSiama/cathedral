<?php

namespace App\Http\Controllers;

use App\Models\Baptism;
use App\Models\Confirmation;
use App\Models\FirstCommunion;
use App\Models\Funeral;
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
        if ($firstCommunion->date_of_issue == null) {
            $firstCommunion->date_of_issue = now();
            $firstCommunion->save();
        }

        return PDF::loadView('certificates.first-communion', compact('firstCommunion'))
            ->setPaper('a4')
            ->stream("$firstCommunion->name Certificate.pdf");
    }

    public function confirmation(Confirmation $confirmation)
    {
        if ($confirmation->date_of_issue == null) {
            $confirmation->date_of_issue = now();
            $confirmation->save();
        }

        return PDF::loadView('certificates.confirmation', compact('confirmation'))
            ->setPaper('a4')
            ->stream('confirmation-certificate.pdf');
    }

    public function funeral(Funeral $funeral)
    {
        return PDF::loadView('certificates.funeral', compact('funeral'))
            ->setPaper('a5')
            ->stream('funeral-certificate.pdf');
    }
}
