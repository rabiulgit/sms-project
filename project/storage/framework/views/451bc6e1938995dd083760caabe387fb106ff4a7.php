<?php $__env->startPush('top-scripts'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<section role="main" class="content-body">
	<header class="page-header">
		<h2>Topics</h2>
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
			<a  class="modal-with-form  btn btn-success pull-right" href="#topicModalForm" style="font-size: 12px"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Class</a>
			<h2 class="panel-title">Class List</h2>
		</header>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-condensed mb-none">
					<thead>
						<tr>
							<th >#</th>
							<th>Name</th>
							<th>Status</th>
							<th width="80" >Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($topics) && count($topics)>0): ?>
						<?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($key+1); ?></td>
							<td><?php echo e($topic->name); ?></td>

							<td><?php echo e($topic->status == 1? 'Active' : 'Inactive'); ?></td>
							<td >
								<a class="mb-xs  modal-basic btn-xs btn  btn-info openeditModal
								" href="#edittopicModalForm" data-id="<?php echo e($topic->id); ?>" data-category="<?php echo e($topic->categoryInfo->id); ?>" data-name="<?php echo e($topic->name); ?>"  data-status="<?php echo e($topic->status); ?>" ><i class="fa fa-edit"></i></a>
								<a class="mb-xs  btn btn-danger btn-xs delete" data-confirm="Are you sure you want to  delete this item?" href="<?php echo e(url('topic/delete/' .$topic->id)); ?>"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>

					</tbody>
				</table>
				<?php if(!empty($topics) && count($topics)>0): ?>
				<?php echo e($topics->links()); ?>

				<?php endif; ?>
			</div>
		</div>
	</section>
</section>


<!-- Create Category Modal Form -->
<div id="topicModalForm" class="modal-block modal-block-primary mfp-hide">
	<section class="panel">
		<header class="panel-heading">
			<button type="button"  style="color: black; float: right;padding: 0px 7px;font-size: 16px;" class="btn btn-default modal-dismiss">&times;</button>
			<h2 class="panel-title">Create Class</h2>
		</header>
		<div class="panel-body">
			<form  id="demo-form" method="post" action="<?php echo e(url('student/store')); ?>" class="form-horizontal mb-lg" enctype="multipart/form-data">
				<?php echo e(csrf_field()); ?>


				<div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Name*</label>
					<div class="col-sm-9">
						<input type="text" name="name" class="form-control" placeholder="" required="" />
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


<!-- Edit topic Modal Form -->
<div id="edittopicModalForm" class="modal-block modal-block-primary mfp-hide">
	<section class="panel">

		<header class="panel-heading">
			<button type="button"  style="color: black; float: right;padding: 0px 7px;font-size: 16px;" class="btn btn-default modal-dismiss">&times;</button>
			<h2 class="panel-title">Edit Topic</h2>
		</header>
		<div class="panel-body">
			<form  method="post" action="<?php echo e(url('topic/update/')); ?>" class="form-horizontal mb-lg" enctype="multipart/form-data">
				<?php echo e(csrf_field()); ?>

				<input type="hidden" id="id" name="id">



				<div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Name*</label>
					<div class="col-sm-9">
						<input type="text" name="name" id="Name" class="form-control" placeholder="" required="" />
					</div>
				</div>


				<div class="form-group mt-lg">
					<label class="col-md-3 control-label" for="inputSuccess">Status*</label>
					<div class="col-md-9" >
						<select class="form-control" id="Status" name="status" required="">
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>
					</div>
				</div>
				<footer class="panel-footer" style="margin-top: 10px">
					<div class="row">
						<div class="col-md-12 text-right">
							<button type="submit" class="btn btn-success ">Update</button>
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
	$(".openeditModal").click(function(){
		var id = $(this).data('id');
		var category = $(this).data('category');
		var name = $(this).data('name');
		var level = $(this).data('level');
		var status = $(this).data('status');

		$('.panel-body #id').val(id);
		$('.panel-body #categoryId').val(category);
		$('.panel-body #Name').val(name);
		$('.panel-body #Level').val(level);
		$('.panel-body #Status').val(status);
	});
</script>

<script type="text/javascript">
	$('.delete').on("click", function (e) {
		e.preventDefault();
		var choice = confirm($(this).attr('data-confirm'));
		if (choice) {
			window.location.href = $(this).attr('href');
		}
	});
</script>


<script type="text/javascript">
	$(function () {
		$('.datetimepicker3').datetimepicker({
			format: 'HH:mm:ss'
		});
	});
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sms\project\resources\views/student.blade.php ENDPATH**/ ?>
