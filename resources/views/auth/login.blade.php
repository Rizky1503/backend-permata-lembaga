<!DOCTYPE html>
<html lang="en">
<head>
    <title>INVESTAPLANNING</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{!! asset('public/assets-login/vendor/bootstrap/css/bootstrap.min.css') !!}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{!! asset('public/assets-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') !!}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{!! asset('public/assets-login/vendor/animate/animate.css') !!}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{!! asset('public/assets-login/vendor/css-hamburgers/hamburgers.min.css') !!}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{!! asset('public/assets-login/vendor/select2/select2.min.css') !!}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{!! asset('public/assets-login/css/util.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('public/assets-login/css/main.css') !!}">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{!! asset('public/assets-login/images/img-01.png') !!}" alt="IMG">
                </div>

                <form class="login100-form validate-form"  method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title">
                        Member Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "input email yang terdaftar ex@email.com">
                        <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    @error('email')
                    <div class="wrap-input100" style="font-size: 12px; color: #f00">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="wrap-input100 validate-input" data-validate = "Masukan password">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    @error('password')
                    <div class="wrap-input100" style="font-size: 12px; color: #f00">
                        {{ $message }}
                    </div>
                    @enderror
                    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    <div class="text-center p-t-136">
                        <a class="txt2" href="#">
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>    
<!--===============================================================================================-->  
    <script src="{!! asset('public/assets-login/vendor/jquery/jquery-3.2.1.min.js') !!}"></script>
<!--===============================================================================================-->
    <script src="{!! asset('public/assets-login/vendor/bootstrap/js/popper.js') !!}"></script>
    <script src="{!! asset('public/assets-login/vendor/bootstrap/js/bootstrap.min.js') !!}"></script>
<!--===============================================================================================-->
    <script src="{!! asset('public/assets-login/vendor/select2/select2.min.js') !!}"></script>
<!--===============================================================================================-->
    <script src="{!! asset('public/assets-login/vendor/tilt/tilt.jquery.min.js') !!}"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
<!--===============================================================================================-->
    <script src="{!! asset('public/assets-login/js/main.js') !!}"></script>

</body>
</html>