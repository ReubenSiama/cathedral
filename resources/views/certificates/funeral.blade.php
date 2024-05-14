<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $funeral->name }} {{ $funeral->surname }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            font-size: 14px;
        }

        td {
            padding: 10px;
        }

        .bottom{
            margin-top: 50px;
            font-style: italic;
        }

        .left{
            width: 50%;
            float: left;
        }

        .right{
            width: 50%;
            text-align: right;
            float: right;
        }
    </style>
</head>
<body>
    <div style="text-align: center">
        <div style="font-weight: bold; font-size: 20px; margin-bottom: 10px;">CATHOLIC DIOCESE OF AIZAWL</div>
        <div style="font-weight: 400; font-size: 20px">CERTIFICATE OF BURIAL</div>
    </div>
        <table style="width: 100%; margin: 20 0">
            <caption></caption>
            <tr>
                <th></th>
            </tr>
            <tr>
                <td style="width: 40%">
                    NAME
                </td>
                <td style="width: 1%;">:</td>
                <td style="border-bottom: 1px solid black">
                    {{ $funeral->name }} {{ $funeral->surname }}
                </td>
            </tr>
            <tr>
                <td style="width: 40%">
                    AGE
                </td>
                <td style="width: 1%;">:</td>
                <td style="border-bottom: 1px solid black">
                    {{ ucwords($funeral->age) }}
                </td>
            </tr>
            <tr>
                <td style="width: 40%">
                    DOMICILE
                </td>
                <td style="width: 1%;">:</td>
                <td style="border-bottom: 1px solid black;">
                    {{ $funeral->domicile }}
                </td>
            </tr>
            <tr>
                <td style="width: 40%">
                    DATE OF DEATH
                </td>
                <td style="width: 1%;">:</td>
                <td style="border-bottom: 1px solid black">
                    {{ date('d/m/Y', strtotime($funeral->date_of_death)) }}
                </td>
            </tr>
            <tr>
                <td style="width: 40%">
                    CAUSE OF DEATH
                </td>
                <td style="width: 1%;">:</td>
                <td style="border-bottom: 1px solid black">
                    {{ date('d/m/Y', strtotime($funeral->cause_of_death)) }}
                </td>
            </tr>
            <tr>
                <td style="padding: 10px">
                    DATE OF BURIAL
                </td>
                <td style="width: 1%;">:</td>
                <td style="border-bottom: 1px solid black;">
                    {{ date('d/m/Y', strtotime($funeral->date_of_burial)) }}
                </td>
            </tr>
            <tr>
                <td style="width: 40%">
                    PLACE OF BURIAL
                </td>
                <td style="width: 1%;">:</td>
                <td style="border-bottom: 1px solid black">
                    {{ date('d/m/Y', strtotime($funeral->place_of_burial)) }}
                </td>
            </tr>
            <tr>
                <td style="width: 40%">
                    CVE/INFANT
                </td>
                <td style="width: 1%;">:</td>
                <td style="border-bottom: 1px solid black">
                    {{ $funeral->cve_or_infants }}
                </td>
            </tr>
            <tr>
                <td style="width: 40%">
                    {{
                        strToUpper($funeral->relationship->value)
                    }}
                </td>
                <td style="width: 1%;">:</td>
                <td style="border-bottom: 1px solid black;
                font-size: {{ strlen($funeral->god_father.' & '.$funeral->god_mother) > 50 ? '12px' : '14px' }}
                ">
                    {{ $funeral->parent_spouse_name[0] }} {{ count($funeral->parent_spouse_name) > 1 ? ' & '.$funeral->parent_spouse_name[1] : '' }}
                </td>
            </tr>
            <tr>
                <td style="width: 40%; font-size:12px;">
                    CLERGYMAN OFFICIATING
                </td>
                <td style="width: 1%;">:</td>
                <td style="border-bottom: 1px solid black">
                    {{ $funeral->priest->full_name }}
                </td>
            </tr>
        </table>
    <div style="text-align: center; font-style: italic">Certified that the above is a true extract
        from the Register of Funeral kept at the <u>Christ the King Cathedral, Kulikawn</u> Church</div>
    <div class="bottom">
        <div class="left">
            No.: {{ $funeral->number }}
        </div>
        <div class="right">Parish Priest</div>
    </div>
</body>
</html>
