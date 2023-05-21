<?php $__env->startSection('title', $viewData["title"]); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
    <?php endif; ?>
    <h1><?php echo e(__('orders.details')); ?></h1>
    <hr>
    <h1>Order <?php echo e($viewData["orders"]->id); ?></h1>
    <div class="row">
        <div class="col-md-4">
            <strong>ID:</strong> <?php echo e($viewData["orders"]->id); ?><br>
            <strong><?php echo e(__('orders.tot_price')); ?>:</strong> $<?php echo e($viewData["orders"]->total_price); ?><br>
            <strong><?php echo e(__('orders.status')); ?>:</strong> <?php echo e($viewData["orders"]->status); ?><br>
            <a href="<?php echo e(route('order.pdf', ['id'=> $viewData["orders"]->getId()])); ?>" class="btn bg-primary text-white">Bill generator</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Eafit\bseller\bseller\resources\views/order/show.blade.php ENDPATH**/ ?>