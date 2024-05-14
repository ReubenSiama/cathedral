<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $marriage->bridegroom->name }} & {{ $marriage->bride->name }}</title>
    <style>
        @page{
            margin: 0;
            padding: 0;
        }
        body{
            font-size: 12px;
            padding: 6rem;
            font-family: Arial, Helvetica, sans-serif;
            background-image: url('{{ public_path('images/marriage/frame.png') }}');
            background-size: cover;
        }
        .dotted-border{
            border-bottom: 1px dotted #000;
            padding: 10px;
        }
        table{
            border-collapse: collapse;
        }
        .mt{
            margin-top: 3rem;
        }
        /* td{
            border: 1px solid black;
        } */
    </style>
</head>
<body>
    <div class="mt">
        <table style="width: 30%">
            <tr>
                <td style="width: 40%">Marriage No.</td>
                <td style="width: 5%">:</td>
                <td style="width: 50%" class="dotted-border">
                    {{ $marriage->number }}
                </td>
            </tr>
            <tr>
                <td>Date of Marriage</td>
                <td>:</td>
                <td class="dotted-border">
                    {{ date('d-m-Y', strtotime($marriage->date_of_marriage)) }}
                </td>
            </tr>
        </table>
        <br>
        <table style="width: 100%">
            <tr>
                <td></td>
                <td></td>
                <td style="text-align: center; font-weight: bold">BRIDEGROOM</td>
                <td></td>
                <td style="text-align: center; font-weight: bold">BRIDE</td>
            </tr>
            <tr>
                <td colspan="2">Name & Surname</td>
                <td class="dotted-border" style="width: 30%">
                    {{ $marriage->bridegroom->name }} {{ $marriage->bridegroom->surname }}
                </td>
                <td style="width: 20px;"></td>
                <td class="dotted-border" style="width: 30%">
                    {{ $marriage->bride->name }} {{ $marriage->bride->surname }}
                </td>
            </tr>
            <tr>
                <td colspan="2">Date of Birth/Age</td>
                <td class="dotted-border">
                    {{ date('d-m-Y', strtotime($marriage->bridegroom->date_of_birth)) }}
                </td>
                <td></td>
                <td class="dotted-border">
                    {{ date('d-m-Y', strtotime($marriage->bride->date_of_birth)) }}
                </td>
            </tr>
            <tr>
                <td style="width: 10%;">Name of Parents</td>
                <td style="width: 5%;">: Father</td>
                <td class="dotted-border">
                    {{ $marriage->bridegroom->father }}
                </td>
                <td></td>
                <td class="dotted-border">
                    {{ $marriage->bride->father }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td>: Mother</td>
                <td class="dotted-border">
                    {{ $marriage->bridegroom->mother }}
                </td>
                <td></td>
                <td class="dotted-border">
                    {{ $marriage->bride->mother }}
                </td>
            </tr>
            <tr>
                <td colspan="2">Address</td>
                <td class="dotted-border">
                    {{ $marriage->bridegroom->domicile }}
                </td>
                <td></td>
                <td class="dotted-border">
                    {{ $marriage->bride->domicile }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style="text-align: center; padding-top: 10px; font-weight: bold">WITNESS I</td>
                <td></td>
                <td style="text-align: center; padding-top: 10px; font-weight: bold">WITNESS II</td>
            </tr>
            <tr>
                <td colspan="2">Name & Surname</td>
                <td class="dotted-border" style="width: 30%">
                    {{ $marriage->firstWitness->name }} {{ $marriage->firstWitness->surname }}
                </td>
                <td style="width: 20px;"></td>
                <td class="dotted-border" style="width: 30%">
                    {{ $marriage->secondWitness->name }} {{ $marriage->secondWitness->surname }}
                </td>
            </tr>
            <tr>
                <td colspan="2">Address</td>
                <td class="dotted-border">
                    {{ $marriage->firstWitness->domicile }}
                </td>
                <td></td>
                <td class="dotted-border">
                    {{ $marriage->secondWitness->domicile }}
                </td>
            </tr>
            <tr>
                <td colspan="2">Place of Marriage</td>
                <td class="dotted-border">
                    {{ $marriage->parish->name }}
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">Minister</td>
                <td class="dotted-border">
                    {{ $marriage->priest->full_name }}
                </td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <br>
        <table style="width: 100%">
            <tr>
                <td style="width: 5%">
                    Date: 
                </td>
                <td style="width: 20%" class="dotted-border">
                    {{ date('d-m-Y', strtotime($marriage->date_of_issue)) }}
                </td>
                <td style="width: 60%"></td>
                <td style="text-align: center">
                    Parish Priest
                    <br>
                    (Seal & Signature)
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
