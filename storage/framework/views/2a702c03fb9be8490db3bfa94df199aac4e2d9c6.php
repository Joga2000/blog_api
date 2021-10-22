<?php $__env->startSection('content'); ?>
    <h3>From hello view</h3>
    <?php echo e($variable); ?> </br>
    <?php echo e($blog->title); ?> </br>

    <?php $__currentLoopData = $array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($arr); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Gabriel\Desktop\Master Flutter\blog_api\resources\views/hello.blade.php ENDPATH**/ ?>