<?php $__env->startPush('top-scripts'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
<!-- datatale -->

<link rel="stylesheet" href="<?php echo e(asset('assets/DataTables/css/dataTables.bootstrap.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/DataTables/css/buttons.dataTables.min.css')); ?>" >
<link rel="stylesheet" href="<?php echo e(asset('assets/DataTables/css/jquery.dataTables.min.css')); ?>" >
<style>
    .select2-container {
        width: 100% !important;
    }

    .select2-container .select2-selection--single {
        height: 34px !important;
        padding-top: 3px;
    }
      .dataTables_filter {

    padding-right: 100px
}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Fees Book</h2>
    </header>
    <?php if(Session::has('success_message')): ?>
    <div class="alert alert-success text-success" style="text-align: center;">
        <?php echo e(Session::get('success_message')); ?>

    </div>
    <?php endif; ?>

    <?php if(Session::has('error_message')): ?>
    <div class="alert alert-danger text-danger" style="text-align: center;">
        <?php echo e(Session::get('error_message')); ?>

    </div>
    <?php endif; ?>


    <section class="panel">
        <header class="panel-heading">
            <a  class="modal-with-form  btn btn-success pull-right" href="#studentModalForm" style="font-size: 12px"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Fees Book</a>

            <h2 class="panel-title">Fees Book List</h2>
        </header>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-condensed mb-none " id="example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Session</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Roll</th>
                            <th>Class</th>
                            <th>Section</th>
                            <th>Group</th>
                            <th>Particular</th>
                            <th>Amount</th>
                            <th>Month</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($fees->isNotEmpty()): ?>
                        <?php $__currentLoopData = $fees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $fee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><?php echo e(date('M-y', strtotime($fee->session_start))); ?> to <?php echo e(date('M-y', strtotime($fee->session_end))); ?></td>
                            <td><?php echo e($fee->student_unique_id); ?></td>
                            <td><?php echo e($fee->student_name); ?></td>
                            <td><?php echo e($fee->roll); ?></td>
                            <td><?php echo e($fee->class); ?></td>
                            <td><?php echo e($fee->section); ?></td>
                            <td><?php echo e($fee->group); ?></td>
                            <td><?php echo e($fee->cat_name); ?></td>
                            <td><?php echo e($fee->value); ?></td>
                            <td><?php echo e($fee->month); ?></td>

                            <td><a class="mb-xs  btn-xs btn  btn-info 
                                " href="<?php echo e(url('student/feesBook/voucher/'. $fee->id)); ?>"  ><i class="fa fa-print"></i></a></td>

                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <?php echo e($fees->render()); ?>

                </div>
            </div>
        </section>
    </section>


    <!-- Create Book Modal Form -->
    <div id="studentModalForm" class="modal-block modal-block-primary mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <button type="button"  style="color: black; float: right;padding: 0px 7px;font-size: 16px;" class="btn btn-default modal-dismiss">&times;</button>
                <h2 class="panel-title">Create Fees Book</h2>
            </header>
            <div class="panel-body">
                <form  id="demo-form" method="post" action="<?php echo e(route('feesBook.store')); ?>" class="form-horizontal mb-lg" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>


                    <div class="form-group mt-lg">
                        <label class="col-md-3 control-label" for="inputSuccess">Session*</label>
                        <div class="col-md-9">
                            <select class="form-control" name="session_id" id="session_id" required="">
                                <?php $__currentLoopData = $session; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($session->id); ?>"><?php echo e(date('M-y', strtotime($session->session_start))); ?> to <?php echo e(date('M-y', strtotime($session->session_end))); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-lg">
                        <label class="col-md-3 control-label" for="inputSuccess">Student ID*</label>
                        <div class="col-md-9">
                            <select class="form-control select2" name="student_id" id="student_id" required="">
                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($student->id); ?>"><?php echo e($student->student_id); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-lg">
                        <label class="col-md-3 control-label" for="inputSuccess">Fee Name*</label>
                        <div class="col-md-9">
                            <select class="form-control " name="cat_id" id="cat_id" required="">
                                <option value="">Select One</option>
                                <?php $__currentLoopData = $feesCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feesCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($feesCategory->id); ?>"><?php echo e($feesCategory->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Value*</label>
                        <div class="col-sm-9">
                            <input type="text" name="value" id="value" class="form-control" placeholder="" required="" readonly/>
                        </div>
                    </div>

                    <div class="form-group mt-lg" id="month" style="display: none">
                        <label class="col-sm-3 control-label">Month*</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control datetimepicker3" name="month"  placeholder="" />
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
            $('.select2').select2({
                theme: 'bootstrap'
            })

            $('.datetimepicker3').datetimepicker({
                format: 'MMM'
            });
            

            $('#cat_id').on('change', function() {
                var session_id = $('#session_id').find(":selected").val();
                var cat_id = $('#cat_id').find(":selected").val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    type: "post",
                    url: '<?php echo e(route("feesBook.valueByCategory")); ?>',
                    data: {
                        _token: _token,
                        session_id: session_id,
                        cat_id: cat_id
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.responseCode == 1) {
                            $("#value").val(response.data);
                        } else {
                            alert("Sorry! Value not found");
                        }
                    }
                });

                if(cat_id == 2){
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sms\project\resources\views/fees_book.blade.php ENDPATH**/ ?>