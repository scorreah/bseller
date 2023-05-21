<?php $__env->startSection('title', $viewData["title"]); ?>
<?php $__env->startSection('content'); ?>

<?php if(session('status')): ?>
  <div class="alert alert-success">
    <?php echo e(session('status')); ?>

  </div>
<?php endif; ?>

    <div class="container">
        <h1>Orders List</h1>
        <div class="row">
            <tbody>
                <?php $__currentLoopData = $viewData['orders']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <a href="<?php echo e(route('order.show', ['id'=> $order["id"]])); ?>" class="btn bg-primary text-white">Order ID <?php echo e($order["id"]); ?></a>
                            </form>
                            <p class="card-text">Total Price: <?php echo e($order->total_price); ?></p>
                            <p class="card-text">Status: <?php echo e($order->status); ?></p>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Eafit\bseller\bseller\resources\views/order/list.blade.php ENDPATH**/ ?>