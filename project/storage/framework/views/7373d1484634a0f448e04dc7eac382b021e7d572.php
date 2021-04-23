<?php $__env->startPush('top-scripts'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
<!-- datatale -->

<link rel="stylesheet" href="<?php echo e(asset('assets/DataTables/css/dataTables.bootstrap.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/DataTables/css/buttons.dataTables.min.css')); ?>" >
<link rel="stylesheet" href="<?php echo e(asset('assets/DataTables/css/jquery.dataTables.min.css')); ?>" >
<style>
    
      .dataTables_filter {

    padding-right: 100px
}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Fees Setup</h2>
    </header>
    <?php if(Session::has('success_message')): ?>
    <div class="alert alert-success text-success" style="text-align: center;">
        <?php echo e(Session::get('success_message')); ?>

    </div>
    <?php endif; ?>

    <?php if(Session::has('error_message')): ?>
    <div class="alert alert-success text-success" style="text-align: center;">
        <?php echo e(Session::get('error_message')); ?>

    </div>
    <?php endif; ?>


    <section class="panel">
        <header class="panel-heading">
            <a  class="modal-with-form  btn btn-success pull-right" href="#studentModalForm" style="font-size: 12px"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Fees Setup</a>
            <h2 class="panel-title">Fees Setup List</h2>
        </header>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-condensed mb-none" id="example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Session</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Month</th>
                            <th>Status</th>
                            <?php if($fees->isEmpty()): ?>
                            <th>Action</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($feesSetups->isNotEmpty()): ?>
                        <?php $__currentLoopData = $feesSetups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $feesSetup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><?php echo e(date('M-y', strtotime($feesSetup->session_start))); ?> to <?php echo e(date('M-y', strtotime($feesSetup->session_end))); ?></td>
                            <td><?php echo e($feesSetup->cat_name); ?></td>
                            <td><?php echo e($feesSetup->type); ?></td>
                            <td><?php echo e($feesSetup->value); ?></td>
                            <td><?php echo e(!empty($feesSetup->month) ? $feesSetup->month : '-'); ?></td>

                            <td><?php echo e($feesSetup->status == 1 ? 'Active' : 'Inactive'); ?></td>
                            
                            <?php if($fees->isEmpty()): ?>
                            <td> 
                                <a class="mb-xs  modal-basic btn-xs btn  btn-info openeditModal" href="#editstudentModalForm" data-id="<?php echo e($feesSetup->id); ?>" ><i class="fa fa-edit"></i></a>
                            </td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                <?php echo e($feesSetups->render()); ?>

            </div>
        </div>
    </section>
</section>


<!-- Create Category Modal Form -->
<div id="studentModalForm" class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
        <header class="panel-heading">
            <button type="button"  style="color: black; float: right;padding: 0px 7px;font-size: 16px;" class="btn btn-default modal-dismiss">&times;</button>
            <h2 class="panel-title">Create Fees Setup</h2>
        </header>
        <div class="panel-body">
            <form  id="demo-form" method="post" action="<?php echo e(route('fees.store')); ?>" class="form-horizontal mb-lg" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>


                <div class="form-group mt-lg">
                    <label class="col-md-3 control-label" for="inputSuccess">Session*</label>
                    <div class="col-md-9">
                        <select class="form-control" name="session_id" required="">
                            <?php $__currentLoopData = $session; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($session->id); ?>"><?php echo e(date('M-y', strtotime($session->session_start))); ?> to <?php echo e(date('M-y', strtotime($session->session_end))); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-md-3 control-label" for="inputSuccess">Fee Name*</label>
                    <div class="col-md-9">
                        <select class="form-control " name="cat_id" required="">
                            <?php $__currentLoopData = $feesCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feesCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($feesCategory->id); ?>"><?php echo e($feesCategory->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-md-3 control-label" for="inputSuccess">Fee Type*</label>
                    <div class="col-md-9">
                        <select class="form-control " name="type" id="type" required="">
                            <option value="">Select One</option>
                            <option value="Annual">Annual</option>
                            <option value="Monthly">Monthly</option>
                            <option value="One Time">One Time</option>
                        </select>
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Value*</label>
                    <div class="col-sm-9">
                        <input type="text" name="value" id="value" class="form-control" placeholder="" required="" />
                    </div>
                </div>

                <div class="form-group mt-lg" id="month" style="display: none">
                    <label class="col-sm-3 control-label">Month*</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control datetimepicker3" name="month"  placeholder="" />
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-md-3 control-label" for="inputSuccess">Status*</label>
                    <div class="col-md-9">
                        <select class="form-control " name="status" required="">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>

                <footer class="panel-footer" style="margin-top: 10px">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-success ">Create</button>
                            <button class="btn btn-default modal-dismiss">Cancel</button>
                        </div>
                    </div>
                </footer>
            </form>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('bottom-scripts'); ?> 

<!-- datatale -->
<script src="<?php echo e(asset('assets/DataTables/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/DataTables/js/dataTables.bootstrap.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/DataTables/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/DataTables/js/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/DataTables/js/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/DataTables/js/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/DataTables/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/DataTables/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/DataTables/js/buttons.colVis.min.js')); ?>"></script>

<!-- datetimepicker -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js" type="text/javascript" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>


<script type="text/javascript">
    $(function () {
        $('.datetimepicker3').datetimepicker({
            format: 'MMM'
        });

        $('#type').on('change', function() {
            var type = $('#type').find(":selected").val();
            if(type != 'Monthly'){
                $('#month').show();
            }else{
                $('#month').hide();
            }
        });
    });
</script> 
 <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip', 
                buttons: [
                'pdf', 'csv'
                ]
            } );
        } );
    </script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sms\project\resources\views/fees_setup.blade.php ENDPATH**/ ?>