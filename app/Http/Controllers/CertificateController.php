<?php

namespace App\Http\Controllers;

use App\Http\Requests\TemplateRequest;
use App\Models\Baptism;
use App\Models\Confirmation;
use App\Models\FirstCommunion;
use App\Models\Funeral;
use App\Models\Marriage;
use Illuminate\Support\Facades\Request;
use PDF;

class CertificateController extends Controller
{
    public function baptism(Baptism $baptism)
    {
        self::generateDateOfIssue($baptism);
        return PDF::loadView('certificates.baptism', compact('baptism'))
            ->setPaper('a5')
            ->stream('baptism-certificate.pdf');
    }

    public function firstCommunion(FirstCommunion $firstCommunion)
    {
        self::generateDateOfIssue($firstCommunion);
        return PDF::loadView('certificates.first-communion', compact('firstCommunion'))
            ->setPaper('a4')
            ->stream("$firstCommunion->name Certificate.pdf");
    }

    public function confirmation(Confirmation $confirmation)
    {
        self::generateDateOfIssue($confirmation);
        return PDF::loadView('certificates.confirmation', compact('confirmation'))
            ->setPaper('a4')
            ->stream('confirmation-certificate.pdf');
    }

    public function funeral(Funeral $funeral)
    {
        self::generateDateOfIssue($funeral);
        return PDF::loadView('certificates.funeral', compact('funeral'))
            ->setPaper('a5')
            ->stream('funeral-certificate.pdf');
    }
    
    public function marriage(Marriage $marriage)
    {
        self::generateDateOfIssue($marriage);
        return PDF::loadView('certificates.marriage', compact('marriage'))
            ->setPaper('a4', 'landscape')
            ->stream("$marriage->number.pdf");
    }

    public function certificateTemplate(TemplateRequest $request){
        return PDF::loadView('templates.'.$request->type)
            ->setPaper($request->size, $request->orientation)
            ->stream('certificate.pdf');
    }

    protected static function generateDateOfIssue($model)
    {
        if ($model->date_of_issue == null) {
            $model->date_of_issue = now();
            $model->save();
        }
    }
}
