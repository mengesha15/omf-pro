<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>OMF-Customer service officer only</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dist/img/omf_logo.jpg') }}" />

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->

        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/omf.css') }}">

        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    </head>

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="#" class="nav-link">USER GUIDE</a>
                    </li>
                </ul>
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Profile Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-user-circle fa-fw"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">
                                <div>
                                    <div class="image">
                                        <img src="{{ asset('uploads/employee_photo/'.Auth::user()->user_photo) }}"
                                            alt="User photo" width="60" height="65">
                                    </div>
                                </div>
                            </span>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('customerServiceOfficer.change_password_form') }}" class="dropdown-item">
                                <i class="fas fa-user-circle fa-fw"></i> Change password
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item dropdown-footer btn-danger" href="{{ route('login') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ url('/') }}" class="brand-link">
                    <img src="{{ asset('dist/img/omf_logo.jpg') }}" alt="OMF Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">OMF</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ asset('uploads/employee_photo/'.Auth::user()->user_photo) }}" alt="User photo">
                        </div>
                        <div class="info">
                            <a class="d-block">{{ Auth::user()->username}}</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2" data-widget="treeview">
                        <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="{{ url('admin/dashboard') }}" class="nav-link">
                                    <i class="fa fa-home"></i>
                                    <p>Home</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Borrowers
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{  route('customerServiceOfficer.add_new_request') }}"
                                            class="nav-link">
                                            <i class="far fa-plus nav-icon"></i>
                                            <p>Add new borrower</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{  route('customerServiceOfficer.borrowers_list') }}"
                                            class="nav-link">
                                            <i class="far fa-plus nav-icon"></i>
                                            <p>Borrowers list</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item ">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Loan management
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('customerServiceOfficer/requested_loan_list') }}" class="nav-link">
                                            <i class="far fa-plus nav-icon"></i>
                                            <p>View requsted loans</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('customerServiceOfficer/approved_loans_list') }}"
                                            class="nav-link">
                                            <i class="far fa-plus nav-icon"></i>
                                            <p>View approved loans</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Loan disbursement
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="#" type="button" class="nav-link" data-toggle="modal"
                                            data-target="#loan-disbursement">
                                            <i class="far fa-plus nav-icon"></i>
                                            <p>New disbursement</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('customerServiceOfficer.loan_disbursemet_lists') }}"
                                            class="nav-link">
                                            <i class="far fa-plus nav-icon"></i>
                                            <p>View disburses</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Loan ervices
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('customerServiceOfficer.view_loan_services') }}"
                                            class="nav-link" target="_blank">
                                            <i class="far fa-plus nav-icon"></i>
                                            <p>View loan service</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>
            </aside>
            <div class="content-wrapper">
                @yield('service_officer_content')
            </div>
            @include('dashboards.customerServiceOfficers.loan_disbursement.loan_disbursement_form')

            <div id="sidebar-overlay"></div>
            <footer class="main-footer">
                <div class="copyright text-center my-auto">
                    <span> copy right
                        © 2019–2021</span>
                </div>
            </footer>
            <!-- jQuery -->
            <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
            <!-- Bootstrap 4 -->
            <!-- AdminLTE for demo purposes -->
            <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <!-- DataTables  & Plugins -->
            <!-- AdminLTE App -->
            <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
            <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
            <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
            <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
            <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
            <script src="{{ 'plugins/datatables-buttons/js/buttons.colVis.min.js' }}"></script>
            <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

            <script src="{{ asset('dist/js/demo.js') }}"></script>
        </div>
    </body>
    <script>
        $(function() {
            $("#example1").DataTable({
                "ordering": false,
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
    </script>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

</script>

<script type="text/javascript">
    @if (count($errors) > 0)
        $('#loan-disbursement').modal('show');
    @endif
</script>

</html>
