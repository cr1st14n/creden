
<!doctype html>
<html class="no-js" lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>NAABOL | Creden</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="../favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="{{ asset('resources/plantilla/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('resources/plantilla/plugins/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{ asset('resources/plantilla/plugins/ionicons/dist/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{ asset('resources/plantilla/plugins/icon-kit/dist/css/iconkit.min.css')}}">
        <link rel="stylesheet" href="{{ asset('resources/plantilla/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}">
        <link rel="stylesheet" href="{{ asset('resources/plantilla/dist/css/theme.min.css')}}">
        <script src="{{ asset('resources/plantilla/src/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" style="background-image: url('resources/plantilla/img/auth/login-bg.jpg')">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div class="logo-centered">
                                <a href="../index.html"><img src="{{ asset('resources/plantilla/src/img/brand.svg')}}" alt=""></a>
                            </div>
                            <h3>Sign In to ThemeKit</h3>
                            <p>Happy to see you again!</p>
                            <form action="../index.html">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email" required="" value="johndoe@admin.com">
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" required="" value="123456">
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                            <span class="custom-control-label">&nbsp;Remember Me</span>
                                        </label>
                                    </div>
                                    <div class="col text-right">
                                        <a href="forgot-password.html">Forgot Password ?</a>
                                    </div>
                                </div>
                                <div class="sign-btn text-center">
                                    <button class="btn btn-theme">Sign In</button>
                                </div>
                            </form>
                            <div class="register">
                                <p>Don't have an account? <a href="register.html">Create an account</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
        <script src="{{ asset('resources/plantilla/src/js/vendor/jquery-3.3.1.min.js')}}"></script>
        <!-- <script>window.jQuery || document.write('<script src="../src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script> -->
        <script src="{{ asset('resources/plantilla/plugins/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{ asset('resources/plantilla/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('resources/plantilla/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
        <script src="{{ asset('resources/plantilla/plugins/screenfull/dist/screenfull.js')}}"></script>
        <script src="{{ asset('resources/plantilla/dist/js/theme.js')}}"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!-- <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script> -->
        <script>
        $("#formLogin").submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: "log1",
                data: $(this).serializeArray(),
                type: "POST",
                // dataType: 'json',
                success: function(e) {
                    console.log(e);
                    if (e == 'success') {
                        window.location.href = 'index';

                    } else if (e == 0) {
                        $.notific8('Usuario no registrado.', {
                            life: 3000,
                            heading: 'Advertencia.',
                            icon: 'info-circled',
                            theme: 'mustard',
                            family: 'atomic',
                            // sticky: true,
                            horizontalEdge: 'top',
                            // horizontalEdge: 'bottom',
                            verticalEdge: 'rigth',
                            zindex: 1500,
                        })
                    }else if (e == 1) {
                        $.notific8('Contraseña incorrecta.', {
                            life: 3000,
                            heading: 'Advertencia.',
                            icon: 'info-circled',
                            theme: 'tomato',
                            family: 'atomic',
                            // sticky: true,
                            horizontalEdge: 'top',
                            // horizontalEdge: 'bottom',
                            verticalEdge: 'rigth',
                            zindex: 1500,
                        })
                    }

                }
            }).fail();

        });
    </script>
    </body>
</html>
