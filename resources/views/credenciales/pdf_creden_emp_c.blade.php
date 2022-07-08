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
            background-image: url("{{asset('resources/plantilla/CREDENCIALESFOTOS/SANTACRUZAMVERSO.jpg')}}");
            background-size: cover;
            background-repeat: no-repeat;
        }

        p.a {
            position: relative;
            top: 400px;
            left: 90px;
            font-size: 30px;
        }

        p.b {
            position: fixed;

            left: 17px;
            width: 10px;
            word-wrap: break-word;
            text-align: center;
            line-height: 45px;
            font-size: 50px;
            top: 80px;

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
            right: 75px;
            top: 253px;
            font-size: 25px;
            color: black;
            font-weight: bold;
        }


        img.img_b {
            position: fixed;
            top: 117px;
            left: 75px;
            width: 230px;
            height: 305px;

        }

        .ci {
            position: fixed;
            top: 555px;
            left: 20px;
            font-size: 40px;
        }

        .per {
            position: fixed;
            top: 555px;
            right: 20px;
            font-size: 40px;
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
        <p class="e">DIC<br>2022</p>
        <p class="f">01234</p>
        <p class="a"> {{$data->Nombre}} <br>{{$data->Paterno}} {{$data->Materno}}<br>ADMINISTRADOR <br>CAC</p>
        <p class="b">1234567890</p>
        <p class="ci">{{$data->CI}}</p>
        <p class="per">H <br> D</p>5

        <img class="s2dapag" src="{{asset('resources/plantilla/CREDENCIALESFOTOS/TODOSREVERSO.jpg')}}"  alt="">

</body>

</html>