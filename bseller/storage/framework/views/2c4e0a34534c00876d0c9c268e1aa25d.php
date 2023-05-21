 
<?php $__env->startSection('title', $viewData["title"]); ?> 
<?php $__env->startSection('subtitle', $viewData["subtitle"]); ?> 
<?php $__env->startSection('content'); ?> 

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <p><?php echo e(__('cart.errors')); ?></p>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<div class="card"> 
    <div class="card-header"><?php echo e(__('cart.shoe')); ?></div> 
    <div class="card-body"> 
        <table class="table table-bordered table-striped text-center"> 
            <thead> 
                <tr> 
                    <th scope="col"><?php echo e(__('cart.id')); ?></th> 
                    <th scope="col"><?php echo e(__('cart.name')); ?></th> 
                    <th scope="col"><?php echo e(__('cart.price')); ?></th> 
                </tr> 
            </thead> 
            <tbody> 
                <?php $__currentLoopData = $viewData["shoes"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shoe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <tr> 
                    <td><?php echo e($shoe->getId()); ?></td> 
                    <td><?php echo e($shoe->getModel()); ?></td> 
                    <td>$<?php echo e($shoe->getPrice()); ?></td> 
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </tbody> 
        </table> 
        <div class="row"> 
            <div class="text-end"> 
                <a class="btn btn-outline-secondary mb-2"><b><?php echo e(__('cart.total')); ?>:</b> $<?php echo e($viewData["total"]); ?></a> 
                <?php if(count($viewData["shoes"]) > 0): ?>
                <a href = "<?php echo e(route('cart.purchase')); ?>" class="btn bg-primary text-white mb-2"><?php echo e(__('cart.purchase')); ?></a> 
                <a href="<?php echo e(route('cart.delete')); ?>"> 
                    <button class="btn btn-danger mb-2"><?php echo e(__('cart.remove')); ?></button> 
                </a> 
                <?php endif; ?>
            </div> 
        </div> 
    </div> 
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Eafit\bseller\bseller\resources\views/cart/index.blade.php ENDPATH**/ ?>