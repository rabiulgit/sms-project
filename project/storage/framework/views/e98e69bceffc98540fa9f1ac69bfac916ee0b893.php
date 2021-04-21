<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/bootstrap/css/bootstrap.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/font-awesome/css/font-awesome.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/magnific-popup/magnific-popup.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')); ?>" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/stylesheets/theme.css')); ?>" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/stylesheets/skins/default.css')); ?>" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/stylesheets/theme-custom.css')); ?>">

    <!-- Head Libs -->
    <script src="<?php echo e(asset('assets/vendor/modernizr/modernizr.js')); ?>"></script>
</head>
<body>

    <!-- start: page -->
    <section class="body-sign">
        <div class="center-sign">
            <div class="text-center" style="color: white;padding: 10px;background: #0088cc;">
            <a href="<?php echo e(url('/')); ?>" style="color: black;font-size: 20px">Login</a>
        </div>

        <div class="panel panel-sign">
            <div class="panel-body" style="border-radius: 2px 0 5px 5px;">

                <form action="<?php echo e(route('login')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group mb-lg">
                        <label>Email</label>
                        <div class="input-group input-group-icon <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <input id="email" type="email" class="form-control input-lg" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

                            <?php if($errors->has('email')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                            <?php endif; ?>
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="fa fa-user"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group mb-lg">
                        <div class="clearfix">
                            <label class="pull-left">Password</label>
                        </div>
                        <div class="input-group input-group-icon <?php echo e($errors->has('password') ? ' has-error' : ''); ?> ">
                            <input id="password" type="password" class="form-control input-lg " name="password" required autocomplete="current-password">
                            <?php if($errors->has('password')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                            <?php endif; ?>

                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12 ">
                            <button type="submit" class="btn btn-primary btn-block btn-lg hidden-xs">Sign In</button>
                            <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <p class="text-center text-muted mt-md mb-md">&copy; Copyright <?php echo e(date('Y')); ?>.  all Rights Reserved.</p>
    </div>
</section>
<!-- end: page -->

<!-- Vendor -->
<script src="<?php echo e(asset('assets/vendor/jquery/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/bootstrap/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/nanoscroller/nanoscroller.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/magnific-popup/jquery.magnific-popup.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/jquery-placeholder/jquery-placeholder.js')); ?>"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?php echo e(asset('assets/javascripts/theme.js')); ?>"></script>

<!-- Theme Custom -->
<script src="<?php echo e(asset('assets/javascripts/theme.custom.js')); ?>"></script>

<!-- Theme Initialization Files -->
<script src="<?php echo e(asset('assets/javascripts/theme.init.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\sms\project\resources\views/auth/login.blade.php ENDPATH**/ ?>