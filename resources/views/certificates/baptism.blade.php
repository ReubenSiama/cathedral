<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $baptism->name }} {{ $baptism->surname }}</title>
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
        <div style="font-weight: 400; font-size: 20px">CERTIFICATE OF BAPTISM</div>
    </div>
        <table style="width: 100%; margin: 20 0">
            <caption></caption>
            <tr>
                <th></th>
            </tr>
            <tr>
                <td style="padding: 10px">
                    DATE OF BAPTISM
                </td>
                <td style="width: 1%;">:</td>
                <td style="border-bottom: 1px solid black;">
                    {{ date('d/m/Y', strtotime($baptism->date_of_baptism)) }}
                </td>
            </tr>
            <tr>
                <td style="width: 40%">
                    DATE OF BIRTH
                </td>
                <td style="width: 1%;">:</td>
                <td style="border-bottom: 1px solid black">
                    {{ date('d/m/Y', strtotime($baptism->date_of_birth)) }}
                </td>
            </tr>
            <tr>
                <td style="width: 40%">
                    SEX
                </td>
                <td style="width: 1%;">:</td>
                <td style="border-bottom: 1px solid black">
                    {{ ucwords($baptism->gender) }}
                </td>
            </tr>
            <tr>
                <td style="width: 40%">
                    NAME
                </td>
                <td style="width: 1%;">:</td>
                <td style="border-bottom: 1px solid black">
                    {{ $baptism->name }} {{ $baptism->surname }}
                </td>
            </tr>
            <tr>
                <td style="width: 40%">
                    FATHER'S NAME
                </td>
                <td style="width: 1%;">:</td>
                <td style="border-bottom: 1px solid black">
                    {{ $baptism->father_name }} {{ $baptism->father_surname }}
                </td>
            </tr>
            <tr>
                <td style="width: 40%">
                    MOTHER'S NAME
                </td>
                <td style="width: 1%;">:</td>
                <td style="border-bottom: 1px solid black">
                    {{ $baptism->mother_name }} {{ $baptism->mother_surname }}
                </td>
            </tr>
            <tr>
                <td style="width: 40%">
                    ABODE
                </td>
                <td style="width: 1%;">:</td>
                <td style="border-bottom: 1px solid black;
                font-size: {{ strlen($baptism->father_occupation) > 30 ? '12px' : '14px' }}">
                    {{ $baptism->place_of_birth }}
                </td>
            </tr>
            <tr>
                <td style="width: 40%">
                    FATHER'S PROFESSION
                </td>
                <td style="width: 1%;">:</td>
                <td style="border-bottom: 1px solid black;
                font-size: {{ strlen($baptism->father_occupation) > 30 ? '12px' : '14px' }}">
                    {{ $baptism->father_occupation }}
                </td>
            </tr>
            <tr>
                <td style="width: 40%">
                    NATIONALITY
                </td>
                <td style="width: 1%;">:</td>
                <td style="border-bottom: 1px solid black">
                    {{ $baptism->nationality->name }}
                </td>
            </tr>
            <tr>
                <td style="width: 40%">
                    GOD PARENTS
                </td>
                <td style="width: 1%;">:</td>
                <td style="border-bottom: 1px solid black;
                font-size: {{ strlen($baptism->god_father.' & '.$baptism->god_mother) > 50 ? '12px' : '14px' }}
                ">
                    {{ $baptism->god_father }} & {{ $baptism->god_mother }}
                </td>
            </tr>
            <tr>
                <td style="width: 40%">
                    CLERGYMAN OFFICIATING
                </td>
                <td style="width: 1%;">:</td>
                <td style="border-bottom: 1px solid black">
                    {{ $baptism->priest->full_name }}
                </td>
            </tr>
        </table>
    <div style="text-align: center; font-style: italic">Certified that the above is a true extract
        from the Register of Baptisms kept at the <u>Christ the King Cathedral, Kulikawn</u> Church</div>
    <div class="bottom">
        <div class="left">
            The {{ date('jS', strtotime($baptism->date_of_baptism)) }} of
            {{ date('F, Y', strtotime($baptism->date_of_baptism)) }}
        </div>
        <div class="right">Parish Priest</div>
    </div>
</body>
</html>
