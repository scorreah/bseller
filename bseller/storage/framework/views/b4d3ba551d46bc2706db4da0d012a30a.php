<?php $__env->startSection('title', 'Home Page - BSeller'); ?>
<?php $__env->startSection('content'); ?>
<?php if(session('status')): ?>
  <div class="alert alert-success">
    <?php echo e(session('status')); ?>

  </div>
<?php endif; ?>

<div class="container">
  <h1>Shoe List</h1>
  <div class="row">
    <?php $__currentLoopData = $viewData['shoes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shoe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <div class="card-body">
            <img src="<?php echo e(asset($shoe->image)); ?>">
            <h4>Model: <?php echo e($shoe->getModel()); ?></h4>
            <p class="card-text">Price: <?php echo e($shoe->getPrice()); ?></p>
            <h2><a href="<?php echo e(route('shoe.show', ['id'=> $shoe->getId()])); ?>" class="btn bg-primary text-white">shoe <?php echo e($shoe->getId()); ?></a></h2>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samue\Desktop\2023-01\Topicos Software\bseller\bseller\resources\views/shoe/list.blade.php ENDPATH**/ ?>