<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmation</title>
    <style>
        @page{
            margin: 0;
        }

        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: white;
            background-image: url('{{ public_path('images/confirmation/frame.png') }}');
            background-size: cover;
        }

        .bottom{
            background-image: url('{{ public_path('images/confirmation/dove.png')}}');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            width: 100px;
            height: 100px;
        }

        table, th, td {
            padding: 8px;
        }

        .first-table{
            width: 80%;
            margin: 70px auto 20px auto;
            border-collapse: collapse;
        }

        .text-center{
            text-align: center;
        }

        .crucifix{
            position: relative;
            height: 250px;
            background-image: url('{{ public_path('images/confirmation/crucifix.png') }}');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .text-red{
            color: #B41325;
        }

        .text-gold{
            color: #CDAB3A;
        }

        .text-sm{
            font-size: 12px;
        }

        .text-lg{
            font-size: 20px;
        }

        .text-xl{
            font-size: 30px;
        }

        .text-right{
            text-align: right;
        }

        .font-bold{
            font-weight: bold;
        }

        .width-1{
            width: 1%;
        }

        .width-25{
            width: 25%;
        }

        .underline{
            border-bottom: 1px solid black;
        }

        .second-table{
            width: 80%;
            margin: auto;
            border-collapse: collapse;
        }

        .left{
            position: absolute;
            left: 7rem;
            bottom: 0;
        }

        .right{
            position: absolute;
            right: 5rem;
            bottom: 0;
        }
    </style>
</head>
<body>
    <table class="first-table">
        <caption></caption>
        <tr>
            <th colspan="7" class="text-lg font-bold">CATHOLIC DIOCESE OF AIZAWL</th>
        </tr>
        <tr>
            <td colspan="7" class="text-lg text-center text-red font-bold">
                CERTIFICATE OF
                <div class="text-xl">
                    SACRAMENT <small class="text-lg">OF</small> CONFIRMATION
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="7" style="padding: 20px 0px;">
                <div class="crucifix">
                    <div class="left text-gold text-sm">
                        <span class="font-bold">
                            THLARAU
                            <br>
                            THIANGHLIM
                        </span>
                        <br>
                        RAH 12-TE
                        <br>
                        Hmangaihna
                        <br>
                        Hlimna
                        <br>
                        Remna
                        <br>
                        Dawhtheihna
                        <br>
                        Ngilneihna
                        <br>
                        Thatna
                        <br>
                        Thilphalna
                        <br>
                        Zaidamna
                        <br>
                        Rinawmna
                        <br>
                        Thuhnuairawlhna
                        <br>
                        Insum theihna
                        <br>
                        Thianghlimna
                    </div>
                    <div class="right text-gold text-sm">
                        <span class="font-bold">
                            THLARAU
                            <br>
                            THIANGHLIM
                        </span>
                        <br>
                        THILPEK 7-TE
                        <br>
                        Finna
                        <br>
                        Hriatthiamna
                        <br>
                        Thurawn
                        <br>
                        Tuarchhelna
                        <br>
                        Hriatna
                        <br>
                        Pathian Ngaihsakna
                        <br>
                        Lalpa Tihna
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>Name</td>
            <td colspan="2" class="width-1 text-right">:</td>
            <td colspan="4" class="underline"></td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td colspan="2" class="width-1 text-right">:</td>
            <td class="underline">
               
            </td>
            <td style="width: 10%">Place</td>
            <td class="width-1 text-right">:</td>
            <td class="underline" style="width: 30%;">
             
            </td>
        </tr>
        <tr>
            <td>Father's Name</td>
            <td colspan="2" class="width-1 text-right">:</td>
            <td colspan="4" class="underline">
           
            </td>
        </tr>
        <tr>
            <td>Mother's Name</td>
            <td colspan="2" class="width-1 text-right">:</td>
            <td colspan="4" class="underline">
           
            </td>
        </tr>
        <tr>
            <td>Address</td>
            <td colspan="2" class="width-1 text-right">:</td>
            <td colspan="4" class="underline">
            
            </td>
        </tr>
        <tr>
            <td>Date of Confirmation</td>
            <td colspan="2" class="width-1 text-right">:</td>
            <td colspan="4" class="underline">
            
            </td>
        </tr>
        <tr>
            <td>Place of Confirmation</td>
            <td colspan="2" class="width-1 text-right">:</td>
            <td colspan="4" class="underline">
            
            </td>
        </tr>
        <tr>
            <td>Sponsor's Name</td>
            <td class="width-1">1)</td>
            <td class="width-1 text-right">:</td>
            <td colspan="4" class="underline">
            
            </td>
        </tr>
        <tr>
            <td></td>
            <td class="width-1">2)</td>
            <td class="width-1 text-right">:</td>
            <td colspan="4" class="underline">
             
            </td>
        </tr>
        <tr>
            <td style="font-size: 14px;">Minister of Confirmation</td>
            <td colspan="2" class="width-1 text-right">:</td>
            <td colspan="4" class="underline">
             
            </td>
        </tr>
        <tr>
            <td colspan="7" class="text-sm">
                I hereby certify that this is the true extract
                from the Register of Sacrament of Confirmation kept in the Parish.
            </td>
        </tr>
    </table>
    <table class="second-table">
        <tr>
            <td style="width: 18%">Place</td>
            <td style="width: 1%;">:</td>
            <td class="underline" style="width: 20%">Aizawl</td>
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
