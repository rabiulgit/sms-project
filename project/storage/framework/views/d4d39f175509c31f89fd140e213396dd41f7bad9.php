<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>" />
    <title>Sms</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
    <!--test -->

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/jquery-ui/jquery-ui.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/jquery-ui/jquery-ui.theme.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/select2/css/select2.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/dropzone/basic.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/dropzone/dropzone.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/summernote/summernote.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/codemirror/lib/codemirror.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/codemirror/theme/monokai.css')); ?>" />


    <!-- end -->


    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/bootstrap/css/bootstrap.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/font-awesome/css/font-awesome.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/magnific-popup/magnific-popup.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/stylesheets/theme.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/stylesheets/skins/default.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/stylesheets/theme-custom.css')); ?>">
    <script src="<?php echo e(asset('assets/vendor/modernizr/modernizr.js')); ?>"></script>

    <!-- rabiul -->
    <link href="<?php echo e(asset('assets/fileupload/bootstrap-fileupload.min.css')); ?>" rel="stylesheet">

    <?php echo $__env->yieldPushContent('top-scripts'); ?>
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
                    <a href="<?php echo e(url('home')); ?>" class="logo">

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

                    <span class="separator"></span>

                    <ul class="notifications">
                        <li>
                            <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="badge">4</span>
                            </a>

                            <div class="dropdown-menu notification-menu">
                                <div class="notification-title">
                                    <span class="pull-right label label-default">230</span>
                                    Messages
                                </div>

                                <div class="content">
                                    <ul>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <figure class="image">
                                                    <img src="assets/images/!sample-user.jpg" alt="Joseph Doe Junior" class="img-circle" />
                                                </figure>
                                                <span class="title">Joseph Doe</span>
                                                <span class="message">Lorem ipsum dolor sit.</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <figure class="image">
                                                    <img src="assets/images/!sample-user.jpg" alt="Joseph Junior" class="img-circle" />
                                                </figure>
                                                <span class="title">Joseph Junior</span>
                                                <span class="message truncate">Truncated message. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam, nec venenatis risus. Vestibulum blandit faucibus est et malesuada. Sed interdum cursus dui nec venenatis. Pellentesque non nisi lobortis, rutrum eros ut, convallis nisi. Sed tellus turpis, dignissim sit amet tristique quis, pretium id est. Sed aliquam diam diam, sit amet faucibus tellus ultricies eu. Aliquam lacinia nibh a metus bibendum, eu commodo eros commodo. Sed commodo molestie elit, a molestie lacus porttitor id. Donec facilisis varius sapien, ac fringilla velit porttitor et. Nam tincidunt gravida dui, sed pharetra odio pharetra nec. Duis consectetur venenatis pharetra. Vestibulum egestas nisi quis elementum elementum.</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <figure class="image">
                                                    <img src="assets/images/!sample-user.jpg" alt="Joe Junior" class="img-circle" />
                                                </figure>
                                                <span class="title">Joe Junior</span>
                                                <span class="message">Lorem ipsum dolor sit.</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <figure class="image">
                                                    <img src="assets/images/!sample-user.jpg" alt="Joseph Junior" class="img-circle" />
                                                </figure>
                                                <span class="title">Joseph Junior</span>
                                                <span class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam.</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <hr />

                                    <div class="text-right">
                                        <a href="#" class="view-more">View All</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                                <i class="fa fa-bell"></i>
                                <span class="badge">3</span>
                            </a>

                            <div class="dropdown-menu notification-menu">
                                <div class="notification-title">
                                    <span class="pull-right label label-default">3</span>
                                    Alerts
                                </div>

                                <div class="content">
                                    <ul>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <div class="image">
                                                    <i class="fa fa-thumbs-down bg-danger"></i>
                                                </div>
                                                <span class="title">Server is Down!</span>
                                                <span class="message">Just now</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <div class="image">
                                                    <i class="fa fa-lock bg-warning"></i>
                                                </div>
                                                <span class="title">User Locked</span>
                                                <span class="message">15 minutes ago</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <div class="image">
                                                    <i class="fa fa-signal bg-success"></i>
                                                </div>
                                                <span class="title">Connection Restaured</span>
                                                <span class="message">10/10/2016</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <hr />

                                    <div class="text-right">
                                        <a href="#" class="view-more">View All</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <span class="separator"></span>

                    <div id="userbox" class="userbox">
                        <a href="#" data-toggle="dropdown">
                            <figure class="profile-picture">
                                <img src="<?php echo e(asset('/uploads/userphoto/default.png')); ?>" alt="Joseph Doe" class="img-circle" data-lock-picture="<?php echo e(asset('/uploads/userphoto/default.png')); ?>" />

                            </figure>
                            <div  class="profile-info" data-lock-name="<?php echo e(Auth::user()->name); ?>" data-lock-email="johndoe@okler.com">
                                <span style="color: #17bad4" class="name"><?php echo e(Auth::user()->name); ?></span>
                                <span class="role"><?php echo e(Auth::user()->role); ?></span>
                            </div>

                            <i class="fa custom-caret"></i>
                        </a>
                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                <li class="divider"></li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="<?php echo e(url('profile')); ?>"><i class="fa fa-user"></i> My Profile</a>
                                </li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo e(csrf_field()); ?>

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

                                    <li class="<?php echo e(Request::is('home') ? 'nav-active ' : ''); ?>">
                                        <a href="<?php echo e(url('home')); ?>">
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                       <li class="<?php echo e(Request::is('student/list') ? 'nav-active' : ''); ?>">
                                        <a href="<?php echo e(url('student/list')); ?>"><i class="fa fa-users"></i>
                                            Student
                                        </a>
                                    </li>


                                   <!--  <li class="nav-parent <?php echo e(Request::is('class') ? 'nav-active nav-expanded' : ''); ?>">
                                        <a><i class="fa fa-users"></i>Student Management</a>
                                        <ul class="nav nav-children">
                                            <li class="<?php echo e(Request::is('class') ? 'nav-active' : ''); ?>">
                                                <a href="<?php echo e(url('class')); ?>">Class</a>
                                            </li>
                                        </ul>
                                    </li> -->

                                    <li class="<?php echo e(Request::is('student/feesSetup/list') ? 'nav-active' : ''); ?>">
                                        <a href="<?php echo e(url('student/feesSetup/list')); ?>"><i class="fa fa-list-alt"></i>
                                            Fees Category
                                        </a>
                                    </li>


                                    <li class="<?php echo e(Request::is('student/feesBook/list') ? 'nav-active' : ''); ?>">
                                        <a href="<?php echo e(url('student/feesBook/list')); ?>"><i class="fa fa-print"></i>
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

                <?php echo $__env->yieldContent('content'); ?>

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

                            <div class="sidebar-widget widget-friends">
                                <h6>Friends</h6>
                                <ul>
                                    <li class="status-online">
                                        <figure class="profile-picture">
                                            <img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                        </figure>
                                        <div class="profile-info">
                                            <span class="name">Joseph Doe Junior</span>
                                            <span class="title">Hey, how are you?</span>
                                        </div>
                                    </li>
                                    <li class="status-online">
                                        <figure class="profile-picture">
                                            <img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                        </figure>
                                        <div class="profile-info">
                                            <span class="name">Joseph Doe Junior</span>
                                            <span class="title">Hey, how are you?</span>
                                        </div>
                                    </li>
                                    <li class="status-offline">
                                        <figure class="profile-picture">
                                            <img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                        </figure>
                                        <div class="profile-info">
                                            <span class="name">Joseph Doe Junior</span>
                                            <span class="title">Hey, how are you?</span>
                                        </div>
                                    </li>
                                    <li class="status-offline">
                                        <figure class="profile-picture">
                                            <img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                        </figure>
                                        <div class="profile-info">
                                            <span class="name">Joseph Doe Junior</span>
                                            <span class="title">Hey, how are you?</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </aside>
        </section>
        <input type="hidden" class="site_url" value="<?php echo e(url('/')); ?>">

        <script src="<?php echo e(asset('assets/vendor/jquery/jquery.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')); ?>"></script>

        <script src="<?php echo e(asset('assets/vendor/bootstrap/js/bootstrap.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/nanoscroller/nanoscroller.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/magnific-popup/jquery.magnific-popup.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/javascripts/theme.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/javascripts/theme.custom.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/javascripts/theme.init.js')); ?>"></script>
        <!-- test -->
        <script src="<?php echo e(asset('assets/vendor/jquery-ui/jquery-ui.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/jqueryui-touch-punch/jqueryui-touch-punch.js')); ?>"></script>

        <script src="<?php echo e(asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/jquery-maskedinput/jquery.maskedinput.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/bootstrap-timepicker/bootstrap-timepicker.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/fuelux/js/spinner.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/dropzone/dropzone.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/bootstrap-markdown/js/markdown.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/bootstrap-markdown/js/to-markdown.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/codemirror/lib/codemirror.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/codemirror/addon/selection/active-line.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/codemirror/addon/edit/matchbrackets.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/codemirror/mode/javascript/javascript.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/codemirror/mode/xml/xml.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/codemirror/mode/htmlmixed/htmlmixed.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/codemirror/mode/css/css.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/summernote/summernote.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/ios7-switch/ios7-switch.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/bootstrap-confirmation/bootstrap-confirmation.js')); ?>"></script>

        <!-- test end -->

        <!-- modal rabiul  -->
        <script src="<?php echo e(asset('assets/javascripts/ui-elements/examples.modals.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/fileupload/bootstrap-fileupload.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/jquery-placeholder/jquery-placeholder.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendor/select2/js/select2.full.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/javascripts/forms/examples.advanced.form.js')); ?>"></script>

        <?php echo $__env->yieldPushContent('bottom-scripts'); ?>

    </body>
    </html>
<?php /**PATH C:\xampp\htdocs\sms\project\resources\views/layouts/app.blade.php ENDPATH**/ ?>