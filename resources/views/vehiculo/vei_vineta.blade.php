<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>
    <style>
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        body {
            /* border-style: solid;
            border-width: 1px;
            border-left-width: 1px;
            border-right-width: 1px;
            border-color: black; */
        }

        table {
            font-size: ;
        }

        table tr td {
            font-size: 10px
        }

        .gray {
            background-color: lightgray
        }
        .img_1{
            width: 100px;
            height: 50px;
        }
    </style>
</head>

<body>
    <table width="100%" style="border:1px solid black;border-collapse:collapse;">
        <tr>
            <td style="font-size:5px; border:1px solid black;">EMPRESA</td>
            <td colspan="2" style="border:1px solid black;">**** </td>
        </tr>
        <tr>
            <td style="font-size:5px; border:1px  solid black;">PLACA</td>
            <td style="border:1px solid black;">-------</td>
            <th rowspan="5" style="border:1px solid black;">
                {!! '<img class="img_1" src="data:image/png;base64,' . DNS1D::getBarcodePNG('255','C39+') . '" alt="barcode"   />' !!}
                <br>654654
            </th>
        </tr>
        <tr>
            <td style="font-size:5px; border:1px  solid black;">MARCA</td>
            <td style="border:1px solid black;">-----</td>
        </tr>
        <tr>
            <td style="font-size:5px; border:1px  solid black;">TIPO/COLOR</td>
            <td style="border:1px solid black;">-----</td>
        </tr>
        <tr>
            <td style="font-size:5px; border:1px  solid black;">VENCE</td>
            <td style="border:1px solid black;">-----</td>
        </tr>
        <tr>
            <td style="font-size:5px; border:1px  solid black;">AREAS</td>
            <td style="border:1px solid black;">----</td>
        </tr>
    </table>

</body>

</html>
