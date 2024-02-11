<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Login - Dashboard</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito Sans:400,500,700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link href="{{url('themes/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('themes/assets/plugins/font-awesome/css/all.min.css')}}" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="{{url('themes/assets/css/connect.min.css')}}" rel="stylesheet">
    <link href="{{url('themes/assets/css/dark_theme.css')}}" rel="stylesheet">
    <link href="{{url('themes/assets/css/custom.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="auth-page sign-in">

    <div class='loader'>
        <div class='spinner-grow text-primary' role='status'>
            <span class='sr-only'>Loading...</span>
        </div>
    </div>
    <div class="connect-container align-content-stretch d-flex flex-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5">
                    <div class="auth-form">
                        <div class="row">
                            <div class="col">
                                <div class="logo-box"><a href="{{route('login')}}" class="logo-text">Masuk atau
                                        Daftar</a></div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <a href="{{route('login.google.redirect')}}" type="button"
                                        class="btn btn-danger btn-block btn-submit">
                                        <i class="fab fa-google"></i>
                                        Lanjutkan dengan Google</a>

                                    <div class="text-center py-4">atau</div>

                                    <input type="hidden" name="url" value="{{URL::previous()}}">
                                    <div class="form-group">
                                        <input type="email" id="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" aria-describedby="emailHelp"
                                            placeholder="Masukkan Email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            id="password" placeholder="Masukkan Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block btn-submit">Masuk</button>

                                    <div class="auth-options">
                                        <div class="custom-control custom-checkbox form-group">
                                            <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                                            <label class="custom-control-label" for="exampleCheck1">Remember me</label>
                                        </div>
                                        <a href="{{route('password.request')}}" class="forgot-link">Forgot Password?</a>
                                    </div>
                                </form>
                                <div class="text-center">

                                    <label class="" for="">Belum Memiliki Akun? </label>
                                    <a href="{{ route('register') }}" class="forgot-link">Daftar</a>

                                    {{-- <li><a href="{{ route('login') }}">Masuk</a></li>
                                    <li><a href="{{ route('register') }}">Daftar</a></li> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block d-xl-block">
                    <div class="auth-image"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascripts -->
    <script src="{{url('themes/assets/plugins/jquery/jquery-3.4.1.min.js')}}"></script>
    <script src="{{url('themes/assets/plugins/bootstrap/popper.min.js')}}"></script>
    <script src="{{url('themes/ssets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{url('themes/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{url('themes/assets/js/connect.min.js')}}"></script>
</body>

</html>
