<?php $__env->startSection('title', $viewData["title"]); ?>
<?php $__env->startSection('content'); ?>
    <h1>This is the Orders page</h1>
    <p>In this page you're gonna see all your orders made!</p>
    <center>
        <div class="container">
            <a href="<?php echo e(route('orders.create')); ?>" class ="btn btn-primary">Create Order</a>
            <a href="<?php echo e(route('orders.list')); ?>" class ="btn btn-primary">List Orders</a>
        </div>
    </center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samue\Desktop\2023-01\Topicos Software\bseller\bseller\resources\views/orders/index.blade.php ENDPATH**/ ?>