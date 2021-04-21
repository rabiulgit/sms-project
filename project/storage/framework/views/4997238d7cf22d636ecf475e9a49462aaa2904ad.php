<?php $__env->startSection('content'); ?>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Dashboard</h2>
        <div class="right-wrapper pull-right">
            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

    <div class="col-md-12 col-lg-12 col-xl-6">
        <div class="row">           
            <div class="col-md-12 col-lg-12 col-xl-6" >
                <h3 class="mt-lg">Dashboard</h3> <p><i class="fa fa-user"></i> <?php echo e(Auth::user()->name); ?>,  <i class="fa fa-map-marker"></i> Dhaka, Bangladesh | <i class="fa fa-clock-o"></i> <?php echo e(date('h:i:s')); ?> - <?php echo e(date('D')); ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-6">
                <section class="panel panel-featured-left panel-featured-primary">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-primary">
                                    <i class="fa fa-users"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Students</h4>
                                    <div class="info">
                                        <strong class="amount"></strong>
                                        <span class="text-primary"></span>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="<?php echo e(route('studentList')); ?>" class="text-muted text-uppercase">(View All)</a>
                                </div>
                            </div>
                        </div>
                    </div>   
                </section>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-6">
                <section class="panel panel-featured-left panel-featured-secondary">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-secondary">
                                    <i class="fa fa-list-alt"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Fees Category</h4>
                                    <div class="info">
                                        <strong class="amount"></strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="<?php echo e(route('feesList')); ?>" class="text-muted text-uppercase">(View All)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-6">
                <section class="panel panel-featured-left panel-featured-tertiary">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-tertiary">
                                    <i class="fa fa-print"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Fees Book</h4>
                                    <div class="info">
                                        <strong class="amount"></strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a href="<?php echo e(route('feesBookList')); ?>" class="text-muted text-uppercase">(View All)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
         
        </div>
    </div>

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sms\project\resources\views/home.blade.php ENDPATH**/ ?>