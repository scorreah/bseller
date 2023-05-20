<?php $__env->startSection('title', $viewData["title"]); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Create Bid Rule</h1>

        <?php if(session('status')): ?>
            <div class="alert alert-success">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>


        <form method="POST" action="<?php echo e(route('bid.store')); ?>">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="initial_price">Initial Price:</label>
                <input type="number" class="form-control" id="initial_price" name="initial_price" value="<?php echo e(old('initial_price')); ?>" required>
            </div>

            <div class="form-group">
                <label for="current_price">Current Price:</label>
                <input type="number" class="form-control" id="current_price" name="current_price" value="<?php echo e(old('current_price')); ?>" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="">-- Select Status --</option>
                    <option value="active" <?php echo e(old('status') == 'active' ? 'selected' : ''); ?>>Active</option>
                    <option value="closed" <?php echo e(old('status') == 'closed' ? 'selected' : ''); ?>>Closed</option>
                </select>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="datetime-local" class="form-control" id="start_date" name="start_date" value="<?php echo e(old('start_date')); ?>" required>
            </div>

            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="datetime-local" class="form-control" id="end_date" name="end_date" value="<?php echo e(old('end_date')); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samue\Desktop\2023-01\Topicos Software\bseller\bseller\resources\views/bid/create.blade.php ENDPATH**/ ?>