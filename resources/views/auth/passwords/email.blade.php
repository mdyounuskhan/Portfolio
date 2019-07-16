<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('admin')}}/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/css/main.css">
    <!--===============================================================================================-->
</head>

<body>
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                <span class="login100-form-title p-b-37">
                    Reset Password
                </span>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter email address">
                    <input class="input100" type="text" name="email" placeholder="Enter email address">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Forgot Password
                    </button>
                </div>
                <br>
                <br>
                <div class="text-center">
                    <a href="{{url('/login')}}" class="txt2 hov1">
                        Sign In
                    </a>
                </div>
            </form>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
    <!--===============================================================================================-->
    <script src="{{asset('admin')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{asset('admin')}}/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{asset('admin')}}/vendor/bootstrap/js/popper.js"></script>
    <script src="{{asset('admin')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{asset('admin')}}/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{asset('admin')}}/vendor/daterangepicker/moment.min.js"></script>
    <script src="{{asset('admin')}}/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="{{asset('admin')}}/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="{{asset('admin')}}/js/main.js"></script>

</body>

</html>
