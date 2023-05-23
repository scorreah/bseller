<?php $__env->startSection('title', $viewData["title"]); ?>
<?php $__env->startSection('content'); ?>

<?php if(session('status')): ?>
  <div class="alert alert-success">
    <?php echo e(session('status')); ?>

  </div>
<?php endif; ?>

    <div class="container">
        <h1><?php echo e(__('orders.title')); ?></h1>
        <p><?php echo e(__('orders.welcome')); ?></p>
        <div class="row">
            <tbody>
                <?php if(count($viewData['orders'])<=0): ?>
                    <p><?php echo e(__('orders.no_orders')); ?></p>
                <?php else: ?>
                    <?php $__currentLoopData = $viewData['orders']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(route('order.show', ['id'=> $order["id"]])); ?>" class="btn bg-primary text-white"><?php echo e(__('orders.id')); ?> <?php echo e($order["id"]); ?></a>
                                </form>
                                <p class="card-text"><?php echo e(__('orders.tot_price')); ?>: <?php echo e($order->total_price); ?></p>
                                <p class="card-text"><?php echo e(__('orders.status')); ?>: <?php echo e($order->status); ?></p>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </tbody>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\simoe\OneDrive - Universidad EAFIT\Universidad\7ptimo semestre\Topicos SW\Repo\bseller\bseller\resources\views/order/index.blade.php ENDPATH**/ ?>