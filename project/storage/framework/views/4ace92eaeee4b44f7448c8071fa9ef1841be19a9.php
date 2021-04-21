<?php $__env->startPush('top-scripts'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Student</h2>
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
                <a  class="modal-with-form  btn btn-success pull-right" href="#studentModalForm" style="font-size: 12px"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Student</a>
                <h2 class="panel-title">Student List</h2>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-condensed mb-none">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Student ID</th>
                            <th>Session</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date of Birth</th>
                            <th>Present Address</th>
                            <th>Mobile</th>
                            <th>Class</th>
                            <th>Section</th>
                            <th>Group</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($students->isNotEmpty()): ?>
                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e($student->student_id); ?></td>
                                    <td><?php echo e(date('M-y', strtotime($student->session_start))); ?> to <?php echo e(date('M-y', strtotime($student->session_end))); ?></td>
                                    <td><?php echo e($student->first_name); ?></td>
                                    <td><?php echo e($student->last_name); ?></td>
                                    <td><?php echo e($student->dob); ?></td>
                                    <td><?php echo e($student->present_address); ?></td>
                                    <td><?php echo e($student->class_name); ?></td>
                                    <td><?php echo e($student->section_name); ?></td>
                                    <td><?php echo e($student->groups_name); ?></td>
                                    <td><?php echo e($student->sms_no); ?></td>

                                    <td><?php echo e($student->status == 1 ? 'Active' : 'Inactive'); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        </tbody>
                    </table>
                    <?php echo e($students->render()); ?>

                </div>
            </div>
        </section>
    </section>


    <!-- Create Category Modal Form -->
    <div id="studentModalForm" class="modal-block modal-block-primary mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <button type="button"  style="color: black; float: right;padding: 0px 7px;font-size: 16px;" class="btn btn-default modal-dismiss">&times;</button>
                <h2 class="panel-title">Create Student</h2>
            </header>
            <div class="panel-body">
                <form  id="demo-form" method="post" action="<?php echo e(route('student.store')); ?>" class="form-horizontal mb-lg" enctype="multipart/form-data">
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
                        <label class="col-sm-3 control-label">First Name*</label>
                        <div class="col-sm-9">
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="" required="" />
                        </div>
                    </div>

                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Last Name*</label>
                        <div class="col-sm-9">
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="" required="" />
                        </div>
                    </div>

                    <div class="form-group mt-lg">
                        <label class="col-md-3 control-label" for="inputSuccess">Gender*</label>
                        <div class="col-md-9">
                            <select class="form-control " name="gender" required="">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Date of Birth*</label>
                        <div class="col-sm-9">
                            <input type="text" class="datetimepicker3" name="dob" id="dob" class="form-control" placeholder="" required="" />
                        </div>
                    </div>

                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Present Address*</label>
                        <div class="col-sm-9">
                            <textarea name="present_address" id="present_address" class="form-control" placeholder="" required=""></textarea>
                        </div>
                    </div>

                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Mobile No*</label>
                        <div class="col-sm-9">
                            <input type="text" name="sms_no" id="sms_no" class="form-control" placeholder="" required="" />
                        </div>
                    </div>

                    <div class="form-group mt-lg">
                        <label class="col-md-3 control-label" for="inputSuccess">Class*</label>
                        <div class="col-md-9">
                            <select class="form-control" name="class_id" required="">
                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($class->id); ?>"><?php echo e($class->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-lg">
                        <label class="col-md-3 control-label" for="inputSuccess">Section*</label>
                        <div class="col-md-9">
                            <select class="form-control" name="section_id" required="">
                                <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($section->id); ?>"><?php echo e($section->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-lg">
                        <label class="col-md-3 control-label" for="inputSuccess">Group*</label>
                        <div class="col-md-9">
                            <select class="form-control" name="group_id" required="">
                                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Roll*</label>
                        <div class="col-sm-9">
                            <input type="number" name="roll" id="roll" class="form-control" placeholder="" required="" />
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js" type="text/javascript" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $('.datetimepicker3').datetimepicker({
                // format: 'HH:mm:ss'
            });
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sms\project\resources\views/student.blade.php ENDPATH**/ ?>