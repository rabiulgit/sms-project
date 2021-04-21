<?php echo e($feesBook->student_name); ?>

<br/>
<br/>
<br/>
<table border="1px">
    <?php $__currentLoopData = $feesCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feesCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>
                <?php echo e($feesCategory->name); ?>

            </td>
            <td>
                <?php if($feesCategory->id == $feesBook->cat_id): ?>
                    <?php echo e($feesBook->value); ?>

                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php /**PATH C:\xampp\htdocs\sms\project\resources\views/voucher.blade.php ENDPATH**/ ?>