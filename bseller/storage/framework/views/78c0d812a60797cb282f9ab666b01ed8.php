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
      Model: <?php echo e($viewData["shoe"]->getModel()); ?>

    </p>
    <p class="card-title">
      Brand: <?php echo e($viewData["shoe"]->getBrand()); ?>

    </p>
    <p class="card-title">
      Size: <?php echo e($viewData["shoe"]->getSize()); ?>

    </p>
    <p class="card-text">
      Price: <?php echo e($viewData["shoe"]->getPrice()); ?>

    </p>
    <form method="POST" action="<?php echo e(route('admin.shoeDelete', ['id' => $viewData["shoe"]->getId()])); ?>">
      <?php echo csrf_field(); ?>
      <?php echo method_field('DELETE'); ?>
      <button type="submit" class="btn btn-danger">Delete</button>
    </form>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Eafit\bseller\bseller\resources\views/admin/shoeShow.blade.php ENDPATH**/ ?>