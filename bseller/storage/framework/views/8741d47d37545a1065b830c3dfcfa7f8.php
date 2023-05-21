<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8 offset-md-0.5>
            <div class="title">
                <h2>Create Order </h2>
            </div>
            <div class ="d-flex flex-col justify-content-center">
                <div class="card">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <style>
                        .title {
                            display: flex;
                            text-align: left;
                            vertical-align: top;
                            top: 0;
                            left: 0;
                            padding: 5px;
                        }

                        .card {
                            display: flex;
                            width: 40%;
                            margin: 15% auto;
                            border: solid 1px transparent;
                        }

                        button{
                            margin-top: 10px;
                        }
                        form {
                            width: 50%;
                            margin: 0 auto;
                        }
                    </style>
                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('orders.store')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="total_price">Total Price:</label>
                                <input type="number" class="form-control <?php $__errorArgs = ['total_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="total_price" name="total_price" value="<?php echo e(old('total_price')); ?>" required>
                                <?php $__errorArgs = ['total_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="status"
                                    name="status" required>
                                    <option value="">-- Select Status --</option>
                                    <option value="new" <?php if(old('status') == 'new'): ?> selected <?php endif; ?>>New</option>
                                    <option value="processing" <?php if(old('status') == 'processing'): ?> selected <?php endif; ?>>
                                        Processing
                                    </option>
                                    <option value="completed" <?php if(old('status') == 'completed'): ?> selected <?php endif; ?>>
                                        Completed
                                    </option>
                                    <option value="cancelled" <?php if(old('status') == 'cancelled'): ?> selected <?php endif; ?>>
                                        Cancelled
                                    </option>
                                </select>
                                <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Eafit\bseller\bseller\resources\views/orders/create.blade.php ENDPATH**/ ?>