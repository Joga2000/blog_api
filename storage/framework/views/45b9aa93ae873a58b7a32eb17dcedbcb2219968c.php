<?php $__env->startSection('dashboard-content'); ?>
    <h1> Update blog post </h1>

    <?php if(Session::get('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
            <strong> <?php echo e(Session::get('success')); ?> </strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if(Session::get('failed')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong> <?php echo e(Session::get('failed')); ?> </strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(URL::to('update-blog-post')); ?>/<?php echo e($blogPost->id); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="exampleInputEmail1">Blog title</label>
            <input type="text" value="<?php echo e($blogPost->title); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter blog title" name="blogTitle">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Blog details</label>
            <textarea class="form-control" id="editor1" name="blogDetails"><?php echo e($blogPost->details); ?></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Select category</label>
            <select class="form-control" name="category">
                <option> Select </option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>" <?php if($category->id == $blogPost->category_id): ?> <?php endif; ?> selected> <?php echo e($category->name); ?> </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div>
            <label> Select featured photo</label>
            <input type="file" name="featuredPhoto" class="form-control" onchange="loadPhoto(event)">
        </div>

        <div>
            <img id="photo" height="100" width="100">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <script>
        function loadPhoto(event){
            var reader = new FileReader();
            reader.onload = function (){
                var output = document.getElementById('photo');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Gabriel\Desktop\Master Flutter\blog_api\resources\views/blog/edit.blade.php ENDPATH**/ ?>