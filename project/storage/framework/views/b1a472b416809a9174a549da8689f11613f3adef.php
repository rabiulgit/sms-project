<html>
<head>
    <style type="text/css">

    </style>
</head>

<body>
    <div style="margin-bottom: 20px;">
        <table class="table autosize" cellspacing="0" width="100%">


            <tr>

                <td style="text-align: left;">
                    <h4 style="font-size: 14px; ">Student Name: <?php echo e($feesBook->student_name); ?></h4>
                    <h4 style="font-size: 14px;">Class:<?php echo e($feesBook->class); ?></h4>
                    <h4 style="font-size: 14px;">Section: <?php echo e($feesBook->section); ?></h4>
                </td>

                <td style="text-align: right;">
                    <h4 style="font-size: 14px; ">Payment Id: 00<?php echo e($feesBook->id); ?></h4>
                    <h4 style="font-size: 14px;">Gender: <?php echo e($feesBook->gender); ?></h4>
                    <h4 style="font-size: 14px;">Student Id: <?php echo e($feesBook->student_unique_id); ?></h4>
                    <h4 style="font-size: 14px;">Session : <?php echo e(date('M-y', strtotime($feesBook->session_start))); ?> to <?php echo e(date('M-y', strtotime($feesBook->session_end))); ?></h4>
                </td>
            </tr>
        </table>
    </div>
    
    <br/>
    <br/>
    <br/>
    <table class="table" cellspacing="0" style="border: 1px solid black;">
       <thead>
        <tr>

            <td style="border: 1px solid black;text-align: center;">SI NO</td>
            <td style="border: 1px solid black;text-align: center;">Particulars</td>
            <td style="border: 1px solid black;text-align: center;">Amount (TK)</td>
        </tr>

    </thead>
    <?php $__currentLoopData = $feesCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $feesCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <tr>
        <td style="border: 1px solid black;text-align: center;">
            <?php echo e($key+1); ?>

        </td>

        <td style="border: 1px solid black;text-align: left;">
            <?php echo e($feesCategory->name); ?>

        </td>
        <td style="border: 1px solid black;text-align: right;">
            <?php if($feesCategory->id == $feesBook->cat_id): ?>
            <?php echo e($feesBook->value); ?>

            <?php endif; ?>
        </td>

    </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr>
        
        <td colspan="2" style="border: 1px solid black;text-align: right;">Total</td>
        
        <td style="border: 1px solid black;text-align: right;"><?php echo e($feesBook->value); ?></td>
    </tr>
</table>
</body>
</html><?php /**PATH C:\xampp\htdocs\sms\project\resources\views/voucher.blade.php ENDPATH**/ ?>