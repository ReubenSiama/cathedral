<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $baptism->name }}</title>
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
                    DATE OF BAPTISM:
                </td>
                <td style="border-bottom: 1px solid black;">
                    {{ date('d/m/Y', strtotime($baptism->date_of_baptism)) }}
                </td>
            </tr>
            <tr>
                <td>
                    DATE OF BIRTH:
                </td>
                <td style="border-bottom: 1px solid black">
                    {{ date('d/m/Y', strtotime($baptism->date_of_birth)) }}
                </td>
            </tr>
            <tr>
                <td>
                    SEX:
                </td>
                <td style="border-bottom: 1px solid black">
                    {{ ucwords($baptism->gender) }}
                </td>
            </tr>
            <tr>
                <td>
                    NAME:
                </td>
                <td style="border-bottom: 1px solid black">
                    {{ $baptism->name }}
                </td>
            </tr>
            <tr>
                <td>
                    FATHER'S NAME:
                </td>
                <td style="border-bottom: 1px solid black">
                    {{ $baptism->father_name }}
                </td>
            </tr>
            <tr>
                <td>
                    MOTHER'S NAME:
                </td>
                <td style="border-bottom: 1px solid black">
                    {{ $baptism->mother_name }}
                </td>
            </tr>
            <tr>
                <td>
                    ABODE:
                </td>
                <td style="border-bottom: 1px solid black">
                    {{ $baptism->address }}
                </td>
            </tr>
            <tr>
                <td>
                    FATHER'S PROFESSION:
                </td>
                <td style="border-bottom: 1px solid black">
                    {{ $baptism->father_occupation }}
                </td>
            </tr>
            <tr>
                <td>
                    NATIONALITY:
                </td>
                <td style="border-bottom: 1px solid black">
                    {{ $baptism->nationality->name }}
                </td>
            </tr>
            <tr>
                <td>
                    GOD PARENTS:
                </td>
                <td style="border-bottom: 1px solid black">
                    {{ $baptism->god_father }} & {{ $baptism->god_mother }}
                </td>
            </tr>
            <tr>
                <td>
                    CLERGYMAN OFFICIATING:
                </td>
                <td style="border-bottom: 1px solid black">
                    {{ $baptism->priest->full_name }}
                </td>
            </tr>
        </table>
    <div style="text-align: center; font-style: italic">Certified that the above is a true extract
        from the Register of Baptisms kept at the <u>{{ $baptism->parish->name }}</u> Church</div>
    <div class="bottom">
        <div class="left">
            The {{ date('jS', strtotime($baptism->date_of_baptism)) }} of
            {{ date('F, Y', strtotime($baptism->date_of_baptism)) }}
        </div>
        <div class="right">Parish Priest</div>
    </div>
</body>
</html>
