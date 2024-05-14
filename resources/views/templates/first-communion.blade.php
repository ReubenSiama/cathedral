<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style>
        @page{
            margin: 0;
            padding: 0;
        }

        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: url('{{ public_path('images/firstCommunion/frame.png') }}');
            background-size: cover;
        }

        .chalice{
            width: 350px;
            height: 350px;
            background-image: url('{{ public_path('images/firstCommunion/bread_and_wine.png') }}');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .bottom{
            background-image: url('{{ public_path('images/firstCommunion/bottom.png')}}');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            width: 100px;
            height: 100px;
        }

        .first-table{
            width: 80%;
            margin: 70px auto 20px auto;
            border-collapse: collapse;
        }

        th, td{
            padding: 7px;
        }

        .underline{
            border-bottom: 1px solid #CDAB3A;
        }

        .text-center{
            text-align: center;
        }

        .second-table{
            width: 80%;
            margin: auto;
            border-collapse: collapse;
        }

        .header{
            text-align: center;
            margin-top: 100px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 30px;
            font-weight: bold;
        }

        .inner-header{
            font-size: 38px;
            margin-top: -10px;
        }

        .middle{
            font-size: 25px;
        }

        .text-green{
            color: #617406;
        }
    </style>
</head>
<body>
    <table class="first-table">
        <caption></caption>
        <tr>
            <th colspan="6" class="header">
                CATHOLIC DIOCESE OF AIZAWL
            </th>
        </tr>
        <tr>
            <td colspan="6" class="text-center text-green">
                <span class="middle">
                    CERTIFICATE OF
                </span>
                <br>
                <span class="inner-header">
                    FIRST COMMUNION RECEPTION
                </span>
            </td>
        </tr>
        <tr>
            <td colspan="6" class="chalice"></td>
        </tr>
        <tr>
            <td class="no-underline">Name</td>
            <td style="width: 1%;">:</td>
            <td class="underline" colspan="4">
                
            </td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td style="width: 1%;">:</td>
            <td class="underline"></td>
            <td style="width: 5%;">Place</td>
            <td style="width: 1%;">:</td>
            <td class="underline" style="width: "></td>
        </tr>
        <tr>
            <td>Date of Baptism</td>
            <td style="width: 1%;">:</td>
            <td class="underline"></td>
            <td style="width: 5%;">Place</td>
            <td style="width: 1%;">:</td>
            <td class="underline"></td>
        </tr>
        <tr>
            <td>Father's Name</td>
            <td style="width: 1%;">:</td>
            <td colspan="4" class="underline">
              
            </td>
        </tr>
        <tr>
            <td>Mother's Name</td>
            <td style="width: 1%;">:</td>
            <td colspan="4" class="underline">
               
            </td>
        </tr>
        <tr>
            <td>Address</td>
            <td style="width: 1%;">:</td>
            <td colspan="4" class="underline"></td>
        </tr>
        <tr>
            <td style="width: 35%">Date of First Communion</td>
            <td style="width: 1%;">:</td>
            <td colspan="4" class="underline">
              
            </td>
        </tr>
        <tr>
            <td>Place of First Communion</td>
            <td style="width: 1%;">:</td>
            <td colspan="4" class="underline"></td>
        </tr>
        <tr>
            <td>Conferred by</td>
            <td style="width: 1%;">:</td>
            <td colspan="4" class="underline"></td>
        </tr>
        <tr>
            <td colspan="6" style="font-size: 13px; padding: 10px 0px; text-align: justify;">
                I hereby certify that this is the true extract from the Register
                of Sacrament of Communion kept in the Parish.
            </td>
        </tr>
    </table>
    <table class="second-table">
        <tr>
            <td style="width: 18%">Place</td>
            <td style="width: 1%;">:</td>
            <td class="underline">Cathedral, Aizawl</td>
            <td class="bottom" rowspan="4"></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td>Date of Issue</td>
            <td style="width: 1%;">:</td>
            <td class="underline"></td>
            <td colspan="2" class="underline"></td>
        </tr>
        <tr>
            <td>Reg. No.</td>
            <td style="width: 1%;">:</td>
            <td class="underline"></td>
            <td colspan="2" class="text-center">Parish Priest</td>
        </tr>
        <tr>
            <td colspan="6"></td>
        </tr>
    </table>
</body>
</html>
