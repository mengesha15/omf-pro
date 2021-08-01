@include('includes.header')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{url('admin/dashboard')}}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Requested loans</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> ayana
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> Mamo
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> bekalu
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All</a>
                    </div>
                </li>
                <!-- Profile Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user-circle fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">
                        <div >
                    <div class="image">
                        <img src="{{ asset('uploads/employee_photo/'.Auth::user()->user_photo) }}" alt="User photo" width="60" height="65">
                    </div>
                </div></span>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> Settings
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> Change profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> Change password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item dropdown-footer btn-danger" href="{{ route('login') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                <img src="{{ asset('dist/img/omf_logo.jpg') }}" alt="OMF Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
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
                    <ul class="nav nav-pills nav-sidebar flex-column"  role="menu"
                        data-accordion="false">
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
                                    Employee management
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{  route('admin.employee_registration') }}" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p>Add new employee</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p>Delete employee</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/boxed.html" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p>Edit employee</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p>View employees</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Loan management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>
                                            Approved loan
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="pages/charts/chartjs.html" class="nav-link">
                                                <i class="far fa-plus nav-icon"></i>
                                                <i class="far fa-plus nav-icon"></i>
                                                <p>View approved</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/charts/flot.html" class="nav-link">
                                                <i class="far fa-plus nav-icon"></i>
                                                <i class="far fa-plus nav-icon"></i>
                                                <p>Approved detail</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/charts/inline.html" class="nav-link">
                                                <i class="far fa-plus nav-icon"></i>
                                                <i class="far fa-plus nav-icon"></i>
                                                <p>Delete approved</p>
                                            </a>
                                        </li>

                                    </ul>
                                     <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-plus nav-icon"></i>
                                            <i class="nav-icon fas fa-edit"></i>
                                            <p>
                                                Requested loan
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="pages/charts/chartjs.html" class="nav-link">
                                                    <i class="far fa-plus nav-icon"></i>
                                                    <i class="far fa-plus nav-icon"></i>
                                                    <p>Approve requests</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="pages/charts/flot.html" class="nav-link">
                                                    <i class="far fa-plus nav-icon"></i>
                                                    <i class="far fa-plus nav-icon"></i>
                                                    <p>Reques loan detail</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="pages/charts/inline.html" class="nav-link">
                                                    <i class="far fa-plus nav-icon"></i>
                                                    <i class="far fa-plus nav-icon"></i>
                                                    <p>Delete requsted</p>
                                                </a>
                                            </li>

                                        </ul>
                                
                                   </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Users management
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/UI/general.html" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p>Edit user detail</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/UI/icons.html" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p>Reset user password</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/UI/buttons.html" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p>View users</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/UI/sliders.html" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p>Delete user</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/UI/modals.html" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p>View user detail</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/UI/modals.html" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p>Deactivate user</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/UI/modals.html" class="nav-link">
                                        <i class="far fa-plus nav-icon"></i>
                                        <p>Reactivate user</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Manage services
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon fas fa-edit"></i>
                                            <p>
                                                Loan service
                                                <i class="fas fa-angle-left right"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="pages/forms/general.html" class="nav-link">
                                                    <i class="far fa-plus nav-icon"></i>
                                                    <p>Add new loan service</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="pages/forms/editors.html" class="nav-link">
                                                    <i class="far fa-plus nav-icon"></i>
                                                    <p>Edit loan service</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="pages/forms/validation.html" class="nav-link">
                                                    <i class="far fa-plus nav-icon"></i>
                                                    <p>View loan service</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="pages/forms/validation.html" class="nav-link">
                                                    <i class="far fa-plus nav-icon"></i>
                                                    <p>Loan service detail</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="pages/forms/validation.html" class="nav-link">
                                                    <i class="far fa-plus nav-icon"></i>
                                                    <p>Delete loan service</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </li>
                             <li class="nav-item">
                             <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Saving service
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="pages/forms/general.html" class="nav-link">
                                            <i class="far fa-plus nav-icon"></i>
                                            <p>Add new saving service</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/forms/editors.html" class="nav-link">
                                            <i class="far fa-plus nav-icon"></i>
                                            <p>Edit saving service</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/forms/validation.html" class="nav-link">
                                            <i class="far fa-plus nav-icon"></i>
                                            <p>View saving service</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/forms/validation.html" class="nav-link">
                                            <i class="far fa-plus nav-icon"></i>
                                            <p>Saving service detail</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/forms/validation.html" class="nav-link">
                                            <i class="far fa-plus nav-icon"></i>
                                            <p>Delete saving service</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            @yield('admin_content')
        </div>


