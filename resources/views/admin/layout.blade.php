<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>{{ $title }} | Calon Pengantin</title>
        <!-- Favicon-->
        <link rel="icon" href="#" type="image/x-icon">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <!-- CSS -->
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/node-waves/waves.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/animate-css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/themes/theme-pink.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    </head>
    <body class="theme-pink">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-pink">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- End Page Loader -->
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- End Overlay For Sidebars -->
        <!-- Top NavBar -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">CALON PENGANTIN</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                <i class="material-icons">settings</i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">PENGATURAN</li>
                                <li class="body" style="height: 45px;">
                                    <ul class="menu">
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="logout()">
                                                <div class="icon-circle bg-pink">
                                                    <i class="material-icons">exit_to_app</i>
                                                </div>
                                                <div class="menu-info">
                                                    <h4>KELUAR</h4>
                                                    <p>__________</p>
                                                </div>
                                            </a>
                                            <form method="POST" action="{{ route('logout') }}" id="logout" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Top NavBar -->
        <!-- Left Sidebar -->
        <section>
            <aside id="leftsidebar" class="sidebar">
                <!-- User Info -->
                <div class="user-info">
                    <div class="image">
                        <img src="{{ asset('assets/image/user-white.png') }}" width="48" height="48" alt="User" />
                    </div>
                    <div class="info-container">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->email }}</div>
                        <div class="email">{{ Auth::user()->role }}</div>
                    </div>
                </div>
                <!-- End User Info -->
                <!-- Menu -->
                <div class="menu">
                    <ul class="list">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="material-icons">home</i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.index') }}">
                                <i class="material-icons">person</i>
                                <span>Manajemen Pengguna</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('assesment.index') }}">
                                <i class="material-icons">assignment</i>
                                <span>Manajemen Assesment</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('question.index') }}">
                                <i class="material-icons">create</i>
                                <span>Manajemen Soal</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Menu -->
                <!-- Footer -->
                <div class="legal">
                    <div class="copyright">
                        &copy; <?php date('Y'); ?> <a href="javascript:void(0);">Calon Pengantin</a>.
                    </div>
                </div>
                <!-- End Footer -->
            </aside>
        </section>
        <!-- End Left Sidebar -->
        <!-- Content -->
        @yield('content')
        <!-- End Content -->
        <!-- JavaScript -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
        <script src="{{ asset('assets/plugins/node-waves/waves.js') }}"></script>
        <script src="{{ asset('assets/js/pages/ui/modals.js') }}"></script>
        <script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
        <script src="{{ asset('assets/js/admin.js') }}"></script>
        <script src="{{ asset('assets/js/demo.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>
    </body>
</html>