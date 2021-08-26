<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Oromia microfinance</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dist/img/omf_logo.jpg') }}" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">


</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#omf-background" class="nav-link">BACKGROUND</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#omf-about" class="nav-link">ABOUT</a>
                </li>
                {{-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="#job-vacancy" class="nav-link">JOB VACANCIES</a>
                </li> --}}
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#omf-contacts" class="nav-link">CONTACTS</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('login') }}" class="nav-link">SIGNIN</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-3">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="brand-link">
                <img src="{{ asset('dist/img/omf_logo.jpg') }}" alt="OMF Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">OMF</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="mt-3 pb-3 mb-3 d-flex">
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2" data-widget="treeview">

                    <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                <i class="fa fa-home"></i>
                                <p >Home</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#saving-services" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Saving services
                                </p>
                            </a>
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="#regular-saving" class="nav-link" id="">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p>Regular saving</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#handhura-saving" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p>Handhura saving</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#women-saving" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p>Women saving</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#sorema-saving" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p>Sorema saving</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#noninterest-saving" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p>Non-interest saving</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#loan-services" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Loan services
                                </p>
                            </a>
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="#solidarity-group-loan" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p>Solidarity group loan</p>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#bussiness-loan" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p>Bussiness loan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#msel" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p><abbr title="Micro and Small Enterprise loan">MSEL</abbr></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#wedpl" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p><abbr title="Women entrepreneur's development program loan">WEDPL</abbr></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#general-purpose-loan" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p>General purpose loan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#housing-loan" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p>Housing loan</p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            @yield('welcome_sidebar_content')
        </div>
        <div id="sidebar-overlay"></div>
        <footer class="main-footer">
            <div class="copyright text-center my-auto">
                <span> copy right
                    © 2019–2021</span>
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ ('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- Page specific script -->
    <script src="{{ asset('js/map-script.js') }}"></script>

</body>
</html>
