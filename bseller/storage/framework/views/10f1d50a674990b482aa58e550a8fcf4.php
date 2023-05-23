<?php $__env->startSection('title', $viewData["title"]); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Bid List</h1>
    <div class="row">
        <?php $__currentLoopData = $viewData['bids']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <div class="card-body">
                        <h2><a href="<?php echo e(route('bid.show', ['id'=> $bid->getId()])); ?>"
          class="btn bg-primary text-white">Bid <?php echo e($bid->getId()); ?></a></h2>
                        <h4>Current Price: <?php echo e($bid->getCurrentPrice()); ?></h4>
                        <p class="card-text">Initial Price: <?php echo e($bid->getInitialPrice()); ?></p>
                        <p class="card-text">Status: <?php echo e($bid->getStatus()); ?></p>
                        <p class="card-text">Start Date: <?php echo e($bid->getStartDate()); ?></p>
                        <p class="card-text">End Date: <?php echo e($bid->getEndDate()); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\simoe\OneDrive - Universidad EAFIT\Universidad\7ptimo semestre\Topicos SW\Repo\bseller\bseller\resources\views/bid/list.blade.php ENDPATH**/ ?>