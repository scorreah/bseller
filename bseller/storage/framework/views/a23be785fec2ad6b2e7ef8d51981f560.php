<?php $__env->startSection('title', 'Home Page - BSeller'); ?>
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
<h1><?php echo e(__('shoes.title')); ?></h1>
<p><?php echo e(__('shoes.welcome')); ?></p>
<div class="botton-position">
  <form method="GET" action="<?php echo e(route('shoe.index')); ?>">
      <div class="form-group">
        <label for="brand"><?php echo e(__('shoes.brand')); ?>:</label>
        <select class="form-control" id="brand" name="brand">
          <option value=""><?php echo e(__('shoes.all_brand')); ?></option>
          <?php $__currentLoopData = $viewData['brands']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($brand); ?>"><?php echo e(ucfirst($brand)); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <div class="form-group">
        <label for="is_bid"><?php echo e(__('shoes.type')); ?>:</label>
        <select class="form-control" id="is_bid" name="is_bid">
          <option value=""><?php echo e(__('shoes.all_types')); ?></option>
          <option value="1"><?php echo e(__('shoes.bidable')); ?></option>
          <option value="0"><?php echo e(__('shoes.nonbidable')); ?></option>
        </select>
      </div>
      <div class="form-group">
            <label for="q"><?php echo e(__('shoes.search')); ?>:</label>
            <input type="text" class="form-control" id="q" name="q" placeholder="Search for model or brand" value="<?php echo e($request->q ?? ''); ?>">
        </div>
      <button type="submit" class="btn btn-primary"><?php echo e(__('shoes.filter')); ?></button>
  </form>
  <div class="row">
    <?php $__currentLoopData = $viewData['shoes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shoe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <div class="card-body">
            <div class = "shoeImg">
              <img src="<?php echo e(asset($shoe->image)); ?>">
            </div>
            <div class = "shoeDesc">
              <h4>Model: <?php echo e($shoe->getModel()); ?></h4>
              <p class="card-text">Price: <?php echo e($shoe->getPrice()); ?></p>
              <h2><a href="<?php echo e(route('shoe.show', ['id'=> $shoe->getId()])); ?>" class="btn bg-primary text-white"><?php echo e(__('shoes.Shoe')); ?> <?php echo e($shoe->getId()); ?></a></h2>
              <h2><a href="<?php echo e(route('cart.add', ['id'=> $shoe->getId()])); ?>" class="btn bg-primary text-white"><?php echo e(__('shoes.cart')); ?></a></h2>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samue\Desktop\2023-01\Topicos Software\bseller\bseller\resources\views/shoe/index.blade.php ENDPATH**/ ?>