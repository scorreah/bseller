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
<h1>Shoes</h1>
<p>Here you can find all the current available Shoes!</p>
<div class="botton-position">
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
              <h2><a href="<?php echo e(route('admin.shoeShow', ['id'=> $shoe->getId()])); ?>" class="btn bg-primary text-white">shoe <?php echo e($shoe->getId()); ?></a></h2>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\simoe\OneDrive - Universidad EAFIT\Universidad\7ptimo semestre\Topicos SW\Repo\bseller\bseller\resources\views/admin/shoeList.blade.php ENDPATH**/ ?>