<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Plants Table</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('plants.create')); ?>"> Create New Plant</a>
            </div>
        </div>
    </div>

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>

    <table class="table table-bordered">
        <tr>
            <th>Botanical Name</th>
            <th>Common Name</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        <?php $__currentLoopData = $plants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($plant->botanical_name); ?></td>
            <td><?php echo e($plant->common_name); ?></td>
            <td><?php echo e($plant->description); ?></td>
            <td>
                <form action="<?php echo e(route('plants.destroy',$plant->id)); ?>" method="POST">

                    <a class="btn btn-info" href="<?php echo e(route('plants.show',$plant->id)); ?>">Show</a>

                    <a class="btn btn-primary" href="<?php echo e(route('plants.edit',$plant->id)); ?>">Edit</a>

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

    <?php echo $plants->links(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('products.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/plants/index.blade.php ENDPATH**/ ?>