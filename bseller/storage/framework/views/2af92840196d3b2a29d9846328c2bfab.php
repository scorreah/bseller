<?php $__env->startSection('title', 'Home Page - BSeller'); ?>
<?php $__env->startSection('content'); ?>

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

<div class="container">
    <h1><?php echo e(__('shoes.add')); ?></h1>
    <p><?php echo e(__('shoes.add_desc')); ?></p>
    <form method="POST" action="<?php echo e(route('shoe.save')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="price"><?php echo e(__('shoes.price')); ?>:</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo e(old('price')); ?>" required>
            </div>
            <div class="form-group">
                <label for="image"><?php echo e(__('shoes.image')); ?>:</label>
                <input type="file" class="form-control" id="image" name="image_shoe" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="status"><?php echo e(__('shoes.size')); ?></label>
                <input type="number" class="form-control" id="size" name="size" value="<?php echo e(old('size')); ?>" required>
            </div>
            <div class="form-group">
                <label for="brand"><?php echo e(__('shoes.brand')); ?>:</label>
                <input type="text" class="form-control" id="brand" name="brand" value="<?php echo e(old('brand')); ?>" required>
            </div>
            <div class="form-group">
                <label for="model"><?php echo e(__('shoes.model')); ?>:</label>
                <input type="text" class="form-control" id="model" name="model" value="<?php echo e(old('model')); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo e(__('shoes.create')); ?></button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\simoe\OneDrive - Universidad EAFIT\Universidad\7ptimo semestre\Topicos SW\Repo\bseller\bseller\resources\views/shoe/create.blade.php ENDPATH**/ ?>