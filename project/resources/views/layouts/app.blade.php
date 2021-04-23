<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('favicon.ico') }}" />
    <title>Sms</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
    <!--test -->
    <!-- datatale -->
     <link rel="stylesheet" href="{{asset('assets/DataTables/css/dataTables.bootstrap.min.css')}}" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/jquery-ui/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/jquery-ui/jquery-ui.theme.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/select2/css/select2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/dropzone/basic.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/dropzone/dropzone.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/summernote/summernote.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/codemirror/lib/codemirror.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/codemirror/theme/monokai.css')}}" />



    <!-- end -->


    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/magnific-popup/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/stylesheets/theme.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/stylesheets/skins/default.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/stylesheets/theme-custom.css')}}">
    <script src="{{asset('assets/vendor/modernizr/modernizr.js')}}"></script>

    <!-- rabiul -->
    <link href="{{asset('assets/fileupload/bootstrap-fileupload.min.css')}}" rel="stylesheet">

    @stack('top-scripts')
</head>
<style type="text/css">

    .header{
        background-color: #095F5B;

    }
    .header .logo img {
        width: 150px;
        height: 25px;
    }
    ul.nav-main li .nav-children li a {
        padding: 5px 15px 6px 25px;
        overflow: hidden;
    </style>
    <body>
        <section class="body">
            <!-- start: header -->
            <header class="header">
                <div class="logo-container">
                    <a href="{{url('home')}}" class="logo">

                    </a>
                    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>

                <!-- start: search & user box -->
                <div class="header-right">

            <!--        <form action="pages-search-results.html" class="search nav-form">
                        <div class="input-group input-search">
                            <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form> -->

                 <!--    <span class="separator"></span>

                 

                    <span class="separator"></span> -->

                    <div id="userbox" class="userbox">
                        <a href="#" data-toggle="dropdown">
                            <figure class="profile-picture">
                                <img src="{{asset('/uploads/userphoto/default.png')}}" alt="Joseph Doe" class="img-circle" data-lock-picture="{{asset('/uploads/userphoto/default.png')}}" />

                            </figure>
                            <div  class="profile-info" data-lock-name="{{Auth::user()->name}}" data-lock-email="johndoe@okler.com">
                                <span style="color: #17bad4" class="name">{{Auth::user()->name}}</span>
                                <span class="role">{{Auth::user()->role}}</span>
                            </div>

                            <i class="fa custom-caret"></i>
                        </a>
                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                <li class="divider"></li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="{{url('profile')}}"><i class="fa fa-user"></i> My Profile</a>
                                </li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end: search & user box -->
            </header>
            <!-- end: header -->

            <div class="inner-wrapper">
                <!-- start: sidebar -->
                <aside id="sidebar-left" class="sidebar-left">

                    <div class="sidebar-header">
                        <div class="sidebar-title">
                            Navigation
                        </div>
                        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                        </div>
                    </div>

                    <div class="nano">
                        <div class="nano-content">
                            <nav id="menu" class="nav-main" role="navigation">
                                <ul class="nav nav-main">

                                    <li class="{{ Request::is('home') ? 'nav-active ' : '' }}">
                                        <a href="{{url('home')}}">
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                       <li class="{{ Request::is('student/list') ? 'nav-active' : '' }}">
                                        <a href="{{url('student/list')}}"><i class="fa fa-users"></i>
                                            Student
                                        </a>
                                    </li>


                                   <!--  <li class="nav-parent {{ Request::is('class') ? 'nav-active nav-expanded' : '' }}">
                                        <a><i class="fa fa-users"></i>Student Management</a>
                                        <ul class="nav nav-children">
                                            <li class="{{ Request::is('class') ? 'nav-active' : '' }}">
                                                <a href="{{url('class')}}">Class</a>
                                            </li>
                                        </ul>
                                    </li> -->

                                    <li class="{{ Request::is('student/feesSetup/list') ? 'nav-active' : '' }}">
                                        <a href="{{url('student/feesSetup/list')}}"><i class="fa fa-list-alt"></i>
                                            Fees Setup
                                        </a>
                                    </li>


                                    <li class="{{ Request::is('student/feesBook/list') ? 'nav-active' : '' }}">
                                        <a href="{{url('student/feesBook/list')}}"><i class="fa fa-print"></i>
                                            Fees BooK
                                        </a>
                                    </li>
                                </ul>

                            </nav>
                        </div>


                        <script>
                            if (typeof localStorage !== 'undefined') {
                                if (localStorage.getItem('sidebar-left-position') !== null) {
                                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                                    sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                                    sidebarLeft.scrollTop = initialPosition;
                                }
                            }
                        </script>


                    </div>

                </aside>
                <!-- end: sidebar -->

                @yield('content')

            </div>

            <aside id="sidebar-right" class="sidebar-right">
                <div class="nano">
                    <div class="nano-content">
                        <a href="#" class="mobile-close visible-xs">
                            Collapse <i class="fa fa-chevron-right"></i>
                        </a>

                        <div class="sidebar-right-wrapper">

                            <div class="sidebar-widget widget-calendar">
                                <h6>Upcoming Tasks</h6>
                                <div data-plugin-datepicker data-plugin-skin="dark" ></div>

                                <ul>
                                    <li>
                                        <time datetime="2016-04-19T00:00+00:00">04/19/2016</time>
                                        <span>Company Meeting</span>
                                    </li>
                                </ul>
                            </div>

                           

                        </div>
                    </div>
                </div>
            </aside>
        </section>
        <input type="hidden" class="site_url" value="{{url('/')}}">
        

        <script src="{{asset('assets/vendor/jquery/jquery.js')}}"></script>
        <script src="{{asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>

        <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{asset('assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('assets/vendor/magnific-popup/jquery.magnific-popup.js')}}"></script>
        <script src="{{asset('assets/javascripts/theme.js')}}"></script>
        <script src="{{asset('assets/javascripts/theme.custom.js')}}"></script>
        <script src="{{asset('assets/javascripts/theme.init.js')}}"></script>
        <!-- test -->
        <script src="{{asset('assets/vendor/jquery-ui/jquery-ui.js')}}"></script>
        <script src="{{asset('assets/vendor/jqueryui-touch-punch/jqueryui-touch-punch.js')}}"></script>

        <script src="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
        <script src="{{asset('assets/vendor/jquery-maskedinput/jquery.maskedinput.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap-timepicker/bootstrap-timepicker.js')}}"></script>
        <script src="{{asset('assets/vendor/fuelux/js/spinner.js')}}"></script>
        <script src="{{asset('assets/vendor/dropzone/dropzone.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap-markdown/js/markdown.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap-markdown/js/to-markdown.js')}}"></script>
        <script src="{{asset('assets/vendor/codemirror/lib/codemirror.js')}}"></script>
        <script src="{{asset('assets/vendor/codemirror/addon/selection/active-line.js')}}"></script>
        <script src="{{asset('assets/vendor/codemirror/addon/edit/matchbrackets.js')}}"></script>
        <script src="{{asset('assets/vendor/codemirror/mode/javascript/javascript.js')}}"></script>
        <script src="{{asset('assets/vendor/codemirror/mode/xml/xml.js')}}"></script>
        <script src="{{asset('assets/vendor/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
        <script src="{{asset('assets/vendor/codemirror/mode/css/css.js')}}"></script>
        <script src="{{asset('assets/vendor/summernote/summernote.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
        <script src="{{asset('assets/vendor/ios7-switch/ios7-switch.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap-confirmation/bootstrap-confirmation.js')}}"></script>

        <!-- test end -->

        <!-- modal rabiul  -->
        <script src="{{asset('assets/javascripts/ui-elements/examples.modals.js')}}"></script>
        <script src="{{asset('assets/fileupload/bootstrap-fileupload.min.js')}}"></script>
        <script src="{{asset('assets/vendor/jquery-placeholder/jquery-placeholder.js')}}"></script>
        <script src="{{asset('assets/vendor/select2/js/select2.full.min.js')}}"></script>
        <script src="{{asset('assets/javascripts/forms/examples.advanced.form.js')}}"></script>

        @stack('bottom-scripts')

    </body>
    </html>
