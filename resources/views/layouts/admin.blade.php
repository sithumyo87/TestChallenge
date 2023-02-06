
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('')}}">
    <title>MovieApp</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <!-- <link href="{{ asset('css/morris.css')}}" rel="stylesheet"> -->
    <!--Toaster Popup message CSS -->
    <!-- <link href="{{ asset('css/jquery.toast.css')}}" rel="stylesheet"> -->
    <!--c3 plugins CSS -->
    <!-- <link href="{{ asset('css/c3.min.css')}}" rel="stylesheet"> -->
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.min.css')}}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{ asset('css/dashboard1.css')}}" rel="stylesheet">
    <link href="{{ asset('css/admin-style.css')}}" rel="stylesheet">
    <link href="{{ asset('css/jquery.datetimepicker.min.css')}}" rel="stylesheet">
    <!-- <script src="{{asset('ckeditor/ckeditor.js')}}"></script> -->
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default-dark fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('admin.movie.index') }}">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                        </b>
                        <span>Movie App</span>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                        <!-- dark Logo text -->
                        {{-- <img src="{{ asset('img/logo-text.png') }}" alt="homepage" class="dark-logo" />
                        <!-- Light Logo text -->    
                        <img src="{{ asset('img/logo-light-text.png') }}" class="light-logo" alt="homepage" /></span> </a> --}}
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item hidden-sm-up"> <a class="nav-link nav-toggler waves-effect waves-light" href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="https://img.icons8.com/external-smashingstocks-glyph-smashing-stocks/40/000000/external-profile-web-smashingstocks-glyph-smashing-stocks.png"/></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow"><span class="bg-primary"></span></span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class=""><img src="https://img.icons8.com/external-smashingstocks-glyph-smashing-stocks/40/000000/external-profile-web-smashingstocks-glyph-smashing-stocks.png"/></div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0">{{ Auth::user()->name;}}</h4>
                                        <p class=" m-b-0">{{ Auth::user()->email;}}</p>
                                    </div>
                                </div>
                                {{-- <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a> --}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </a>
                                {{-- <div class="dropdown-divider"></div>
                                <div class="p-l-30 p-10"><a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a></div> --}}
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <div class="d-flex no-block nav-text-box align-items-center">
                <a class="nav-lock waves-effect waves-dark ml-auto hidden-md-down" href="javascript:void(0)"><i class="mdi mdi-toggle-switch"></i></a>
                <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            </div>
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                            <li> <a class="waves-effect waves-dark" href="{{ route('admin.movie.index') }}" aria-expanded="false"><i class="fa fa-circle-o text-default"></i><span class="hide-menu">Movie</span></a></li>

                            <li> <a class="waves-effect waves-dark" href="{{ route('admin.genre.index') }}" aria-expanded="false"><i class="fa fa-circle-o text-default"></i><span class="hide-menu">Genre</span></a></li>
                        
                        @can('permission-index')
                            <li> <a class="waves-effect waves-dark" href="{{ route('admin.permission.index') }}" aria-expanded="false"><i class="fa fa-circle-o text-success"></i><span class="hide-menu">Permission</span></a></li>
                        @endcan
                        @can('role-index')
                            <li> <a class="waves-effect waves-dark" href="{{ route('admin.role.index') }}" aria-expanded="false"><i class="fa fa-circle-o text-info"></i><span class="hide-menu">Roles</span></a></li>
                        @endcan
                        @can('user-index')
                            <li> <a class="waves-effect waves-dark" href="{{ route('admin.user.index') }}" aria-expanded="false"><i class="fa fa-circle-o text-info"></i><span class="hide-menu">Accounts</span></a></li>
                        @endcan
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            @yield('content')
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            &copy;{{ date('Y') }} Powered By <span style="color:rgb(255, 107, 9)">Dev Seeker</span> 
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script> -->
    <script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('js/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--Wave Effects -->
    <!-- <script src="{{ asset('js/waves.js')}}"></script> -->
    <!--Menu sidebar -->
    <script src="{{ asset('js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('js/custom.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <!-- <script src="{{ asset('js/raphael-min.js')}}"></script>
    <script src="{{ asset('js/morris.min.js')}}"></script>
    <script src="{{ asset('js/jquery.sparkline.min.js')}}"></script> -->
    <!--c3 JavaScript -->
    <script src="{{ asset('js/d3.min.js')}}"></script>
    <script src="{{ asset('js/c3.min.js')}}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('js/dashboard1.js')}}"></script>
    <script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <!-- <script>
    var allEditors = document.querySelectorAll('.ckeditor');
    for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(allEditors[i]);
    }
     </script> -->
     <script>
        CKEDITOR.replace('editor1');
     </script>
</body>

</html>