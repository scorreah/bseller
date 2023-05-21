<?php $__env->startSection('title', $viewData["title"]); ?>
<?php $__env->startSection('content'); ?>
<div class="container">

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <p>Errors</p>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <h1>Bid <?php echo e($viewData["bid"]->getId()); ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4 box-shadow">
                <div class="card-body">
                    <h2>Current Price: $<?php echo e($viewData["bid"]->getCurrentPrice()); ?></h2>
                    <p class="card-text"><?php echo e(__('bids.initial_p')); ?>: $<?php echo e($viewData["bid"]->getInitialPrice()); ?></p>
                    <p class="card-text"><?php echo e(__('bids.status')); ?>: <?php echo e($viewData["bid"]->getStatus()); ?></p>
                    <p class="card-text"><?php echo e(__('bids.avail')); ?>: (<?php echo e($viewData["bid"]->getStartDate()); ?>) - (<?php echo e($viewData["bid"]->getEndDate()); ?>)</p>
                    <form method="POST" action="<?php echo e(route('bid.up', ['id' => $viewData["bid"]->getId()])); ?>">
                        <?php echo csrf_field(); ?>
                        <input name="price" id="price" type="number" min="<?php echo e($viewData["min_price"]); ?>" value="<?php echo e($viewData["min_price"]); ?>">
                        <button type="submit" class="btn btn-warning">Bid up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Eafit\bseller\bseller\resources\views/bid/show.blade.php ENDPATH**/ ?>