<?php $__env->startSection('title', $viewData["title"]); ?>
<?php $__env->startSection('content'); ?>
<?php if(session('status')): ?>
  <div class="alert alert-success">
    <?php echo e(session('status')); ?>

  </div>
<?php endif; ?>

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

<section class="product-section">
  <div class="card-estilo-0">
    <div class="img-container">
      <img src="<?php echo e(asset($viewData["shoe"]["image"])); ?>">
    </div>
    <p class="card-title">
      <?php echo e(__('shoes.model')); ?>: <?php echo e($viewData["shoe"]->getModel()); ?>

    </p>
    <p class="card-title">
      <?php echo e(__('shoes.brand')); ?>: <?php echo e($viewData["shoe"]->getBrand()); ?>

    </p>
    <p class="card-title">
      <?php echo e(__('shoes.size')); ?>: <?php echo e($viewData["shoe"]->getSize()); ?>

    </p>
    <p class="card-text">
      <?php echo e(__('shoes.price')); ?>: <?php echo e($viewData["shoe"]->getPrice()); ?>

    </p>
    <h2><a href="<?php echo e(route('cart.add', ['id'=> $viewData['shoe']->getId()])); ?>" class="btn bg-primary text-white">Add to cart</a></h2>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\simoe\OneDrive - Universidad EAFIT\Universidad\7ptimo semestre\Topicos SW\Repo\bseller\bseller\resources\views/shoe/show.blade.php ENDPATH**/ ?>