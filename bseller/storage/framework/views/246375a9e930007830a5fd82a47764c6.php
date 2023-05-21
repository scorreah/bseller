<?php $__env->startSection('title', $viewData["title"]); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1><?php echo e(__('bids.create')); ?></h1>

        <?php if(session('status')): ?>
            <div class="alert alert-success">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <ul id="errors" class="alert alert-danger list-unstyled"> 
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </ul>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('admin.bidStore')); ?>">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="initial_price"><?php echo e(__('bids.initial_p')); ?>:</label>
                <input type="number" class="form-control" id="initial_price" name="initial_price" value="<?php echo e(old('initial_price')); ?>" required>
            </div>

            <div class="form-group">
                <label for="current_price"><?php echo e(__('bids.current_p')); ?>:</label>
                <input type="number" class="form-control" id="current_price" name="current_price" value="<?php echo e(old('current_price')); ?>" required>
            </div>

            <div class="form-group">
                <label for="status"><?php echo e(__('bids.status')); ?>:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="">-- <?php echo e(__('bids.select')); ?> --</option>
                    <option value="active" <?php echo e(old('status') == 'active' ? 'selected' : ''); ?>><?php echo e(__('bids.active')); ?></option>
                    <option value="closed" <?php echo e(old('status') == 'closed' ? 'selected' : ''); ?>><?php echo e(__('bids.closed')); ?></option>
                </select>
            </div>

            <div class="form-group">
                <label for="start_date"><?php echo e(__('bids.start')); ?>:</label>
                <input type="datetime-local" class="form-control" id="start_date" name="start_date" value="<?php echo e(old('start_date')); ?>" required>
            </div>

            <div class="form-group">
                <label for="end_date"><?php echo e(__('bids.end')); ?>:</label>
                <input type="datetime-local" class="form-control" id="end_date" name="end_date" value="<?php echo e(old('end_date')); ?>" required>
            </div>

            <div class="form-group">
                <label for="shoe_id"><?php echo e(__('bids.choose')); ?>:</label>
                <select class="form-control" id="shoe_id" name="shoe_id" required>
                    <option value="">-- <?php echo e(__('bids.select')); ?> --</option>
                    <?php $__currentLoopData = $viewData['shoes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shoe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($shoe->getId()); ?>" <?php echo e(old('shoe_id') == $shoe->id ? 'selected' : ''); ?>><?php echo e($shoe->getBrand()); ?> <?php echo e($shoe->getModel()); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>


            <button type="submit" class="btn btn-primary"><?php echo e(__('bids.Create')); ?></button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Eafit\bseller\bseller\resources\views/admin/bidCreate.blade.php ENDPATH**/ ?>