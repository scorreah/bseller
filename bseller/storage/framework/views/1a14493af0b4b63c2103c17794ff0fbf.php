<?php $__env->startSection('title', $viewData["title"]); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
    <?php endif; ?>
    <h1>Order Details</h1>
    <hr>
    <h1>Order <?php echo e($viewData["orders"]->id); ?></h1>
    <div class="row">
        <div class="col-md-4">
            <strong>ID:</strong> <?php echo e($viewData["orders"]->id); ?><br>
            <strong>Total Price:</strong> $<?php echo e($viewData["orders"]->total_price); ?><br>
            <strong>Status:</strong> <?php echo e($viewData["orders"]->status); ?><br>
            <form method="POST" action="<?php echo e(route('order.delete', ['order' => $viewData["orders"]->id])); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\simoe\OneDrive - Universidad EAFIT\Universidad\7ptimo semestre\Topicos SW\Repo\bseller\bseller\resources\views/order/show.blade.php ENDPATH**/ ?>