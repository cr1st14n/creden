<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @page {
            margin-left: 0;
            margin-right: 0;
            margin-top: 0;
            margin-bottom: 0;
        }

        html {
            background-color: white;
        }

        body {
            background-color: papayawhip;
            /* background-image: url("{{asset('resources/plantilla/CREDENCIALESFOTOS/NACIONALAMVERSO.jpg')}}"); */
            background-image: url("{{asset($ruta)}}");
            background-size: cover;
            background-repeat: no-repeat;
        }

        p.a {
            position: relative;
            top: 400px;
            left: 70px;
            font-size: 30px;
            color: rgb(0, 0, 0);
            text-transform: uppercase;
            font-family: sans-serif;
            font-weight: bold;
        }

        p.b {
            position: fixed;

            left: 17px;
            width: 10px;
            word-wrap: break-word;
            text-align: center;
            line-height: 58px;
            font-size: 50px;
            top: 80px;
            font-family: sans-serif;
            font-weight: bold;

        }

        p.e {
            position: fixed;
            right: 10px;
            top: 50px;
            font-size: 55px;
            color: red;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
        }

        p.f {
            position: fixed;
            right: 80px;
            top: 253px;
            font-size: 25px;
            color: black;
            font-weight: bold;
        }


        img.img_b {
            position: fixed;
            top: 119px;
            left: 72px;
            width: 230px;
            height: 305px;

        }

        .ci {
            position: fixed;
            top: 570px;
            left: 5px;
            font-size: 30px;
            font-family: sans-serif;
            font-weight: bold;
        }

        .per {
            position: fixed;
            top: 555px;
            right: 20px;
            font-size: 40px;
            font-family: sans-serif;
            font-weight: bold;
        }

        img.s2dapag {
            /* position: fixed; */
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;

        }
    </style>
</head>

<body>
    <div class="ri">

        <!-- <img class="img_a" src="{{asset('resources/plantilla/CREDENCIALESFOTOS/LAPAZAMVERSO.jpg')}}"  alt=""> -->
        <img class="img_b" src="{{asset($data->urlphoto)}}" alt="">
        <p class="e">{{$M}}<br>{{$Y}}</p>
        <p class="f">{{$data->Codigo}}</p>
        <p class="a"> {{$data->Nombre}} <br>{{$data->Paterno}} {{$data->Materno}}<br>{{$data->Cargo}} <br>{{$em}}</p>
        <p class="b">{{$data->AreasAut}}</p>
        <p class="ci">N° Cedula Id.{{$data->CI}}</p>
        <p class="per"><strong style="color: red ;"> @if($data->Herramientas != '') H @endif</strong> <br> @if($data->NroRenovacion != 0) D @endif</p>
        <img class="s2dapag" src="{{asset('resources/plantilla/CREDENCIALESFOTOS/TODOSREVERSO.jpg')}}" alt="">
</body>

</html>
