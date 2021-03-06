<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Blank Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="/css/admin_lte_panel.css">
    <link rel="stylesheet" href="/css/admin_custom.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="../../index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('/') }}">Researcher</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Auth::check() ? Auth::user()->role->name : '' }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    Users - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::check() ? Auth::user()->role->name : '' }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview @include('components.is_active', ['url' => 'admin/dashboard'])">
                    <a href="{{ route('dashboard.index') }}">
                        <i class="fa fa-dashboard"></i><span>Dashboard</span>
                    </a>

                </li>
                <hr>
                @can('fullAccess')
                <li class="@include('components.is_active', ['url' => 'admin/users'])">
                    <a href="{{ route('users.index') }}">
                        <i class="fa fa-users"></i><span>Users</span>
                    </a>
                </li>
                <li class="@include('components.is_active', ['url' => 'admin/roles'])">
                    <a href="{{ route('roles.index') }}">
                        <i class="fa fa-user"></i><span>Roles</span>
                    </a>
                </li>
                <li class="@include('components.is_active', ['url' => 'admin/permissions'])">
                    <a href="{{ route('permissions.index') }}">
                        <i class="fa fa-check"></i><span>Permissions</span>
                    </a>
                </li>
                <li class="@include('components.is_active', ['url' => 'admin/assign_permissions'])">
                    <a href="{{ route('assign_permissions.index') }}">
                        <i class="fa fa-check-circle-o"></i><span>Assign permissions</span>
                    </a>
                </li>
                <hr>
                @endcan
                @can('seeProfiles')
                    <li class="@include('components.is_active', ['url' => 'admin/profiles'])">
                        <a href="{{ route('profiles.index') }}">
                            <i class="fa fa-files-o"></i><span>Profiles</span>
                        </a>
                    </li>
                    <hr>
                @endcan
                @can('fullAccess')
                    <li class="@include('components.is_active', ['url' => 'admin/blank_users'])">
                        <a href="{{ route('blank_users.index') }}">
                            <i class="fa fa-circle-thin"></i><span>Blank Users</span>
                        </a>
                    </li>
                    <hr>
                @endcan
                <li class="@include('components.is_active', ['url' => 'admin/faculties'])">
                <a href="{{ route('faculties.index') }}">
                <i class="fa fa-graduation-cap"></i><span>Faculties</span>
                    </a>
                    </li>
                <li class="@include('components.is_active', ['url' => 'admin/departments'])">
                <a href="{{ route('departments.index') }}">
                <i class="fa fa-clone"></i><span>Departments</span>
                    </a>
                    </li>
                <hr>
                <li class="@include('components.is_active', ['url' => 'admin/positions'])">
                    <a href="{{ route('positions.index') }}">
                        <i class="fa fa-paper-plane"></i><span>Positions</span>
                    </a>
                </li>
                <li class="@include('components.is_active', ['url' => 'admin/academic_degrees'])">
                    <a href="{{ route('academic_degrees.index') }}">
                        <i class="fa fa-circle-thin"></i><span>Academic Degrees</span>
                    </a>
                </li>
                <li class="@include('components.is_active', ['url' => 'admin/academic_titles'])">
                    <a href="{{ route('academic_titles.index') }}">
                        <i class="fa fa-circle-thin"></i><span>Academic Titles</span>
                    </a>
                </li>
                <hr>
                <li class="header">PUBLICATIONS</li>
                <li class="@include('components.is_active', ['url' => 'admin/authors'])">
                    <a href="{{ route('admin.authors.index') }}">
                        <i class="fa fa-circle-thin"></i><span>Authors</span>
                    </a>
                </li>
                <li class="@include('components.is_active', ['url' => 'admin/articles'])">
                    <a href="{{ route('articles.index') }}">
                        <i class="fa fa-circle-thin"></i><span>Articles</span>
                    </a>
                </li>
                <li class="@include('components.is_active', ['url' => 'admin/patents'])">
                    <a href="{{ route('patents.index') }}">
                        <i class="fa fa-circle-thin"></i><span>Patents</span>
                    </a>
                </li>
                <li class="@include('components.is_active', ['url' => 'admin/theses'])">
                    <a href="{{ route('theses.index') }}">
                        <i class="fa fa-circle-thin"></i><span>Theses</span>
                    </a>
                </li>
                <li class="header">EDITIONS</li>
                <li class="@include('components.is_active', ['url' => 'admin/journals'])">
                    <a href="{{ route('admin.journals.index') }}">
                        <i class="fa fa-circle-thin"></i><span>Journals</span>
                    </a>
                </li>
                <li class="@include('components.is_active', ['url' => 'admin/patents'])">
                    <a href="#">
                        <i class="fa fa-circle-thin"></i><span>Patents</span>
                    </a>
                </li>
                <li class="@include('components.is_active', ['url' => 'admin/theses'])">
                    <a href="#">
                        <i class="fa fa-circle-thin"></i><span>Theses</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->

    @yield('content')

    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.7
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com/">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="/js/admin.js"></script>
</body>
</html>
