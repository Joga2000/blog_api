;
<?php $__env->startSection('dashboard-content'); ?>;

    <?php if(Session::get('deleted')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="gone">
            <strong> <?php echo e(Session::get('deleted')); ?> </strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if(Session::get('deleted-failed')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
            <strong> <?php echo e(Session::get('deleted-failed')); ?> </strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            All Blog Posts
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                    <th> Blog Title </th>
                    <th> Blog Details </th>
                    <th> Blog Featured Image </th>
                    <th> Action </th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th> Blog Title </th>
                    <th> Blog Details </th>
                    <th> Blog Featured Image </th>
                    <th> Action </th>
                </tr>
                </tfoot>
                <tbody>

                <?php $__currentLoopData = $blogPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blogPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td><?php echo e($blogPost->title); ?></td>
                        <td><?php echo $blogPost->details; ?></td>
                        <td> <img src="<?php echo e($blogPost->featured_image_url); ?>" width="100" height="100"></td>
                        <td>
                            <a href="<?php echo e(URL::to('edit-blog-post')); ?>/<?php echo e($blogPost->id); ?>" class="btn btn-outline-primary btn-sm">Edit</a>
                            |
                            <a href="<?php echo e(URL::to('delete-blog-post')); ?>/<?php echo e($blogPost->id); ?>" class="btn btn-outline-danger btn-sm" onclick="checkDelete()">Delete</a>
                        </td>
                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
        </div>
    </div>

    <script>
        function checkDelete(){
            var check = confirm('Are you sure you want to Delete this?');
            if(check){
                return true;
            }
            return false;
        }
    </script>

<?php $__env->stopSection(); ?>;

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Gabriel\Desktop\Master Flutter\blog_api\resources\views/blog/index.blade.php ENDPATH**/ ?>