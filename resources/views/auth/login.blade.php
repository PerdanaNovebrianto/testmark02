<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Masuk | Calon Pengantin</title>
        <!-- Icon-->
        <link rel="icon" href="#" type="image/x-icon">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <!-- StyleSheets -->
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/node-waves/waves.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/animate-css/animate.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="logo-login">
                <h1>CATIN</h1>
                <small>CALON PENGANTIN</small>
            </div>
            <div class="card">
                <div class="bg-pink" style="padding:20px; text-align: center;">
                    <h2>MASUK</h2>
                </div>
                <div class="body">
                    @if ($errors->has('email') || $errors->has('password'))
                        <div class="alert bg-red" role="alert" align="center">
                            E-mail atau Password salah.
                        </div>
                    @endif
                    <form id="sign_in" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">mail</i>
                            </span>
                            <div class="form-line">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail" required autofocus>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="input-group">
                            <input type="submit" class="btn btn-block bg-pink waves-effect" value="Masuk">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- JavaScripts -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.js') }}"></script>
        <script src="{{ asset('assets/plugins/node-waves/waves.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.js') }}"></script>
        <script src="{{ asset('assets/js/admin.js') }}"></script>
        <script src="{{ asset('assets/js/pages/examples/sign-in.js') }}"></script>
    </body>
</html>