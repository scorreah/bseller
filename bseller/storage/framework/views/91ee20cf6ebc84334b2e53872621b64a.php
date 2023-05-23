<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo e(asset('/css/app.css')); ?>" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />

    <title><?php echo $__env->yieldContent('title', 'BSeller'); ?></title>
</head>
<body>
    <nav>
        <div class="navTop">
            <div class="navItem">
                <img src="/img/index/bsellerLogo.png" width="150" height="60" alt="">
            </div>
            <div class = "references">
                <ul>
                    <li><a href="<?php echo e(route('home.index')); ?>"><?php echo e(__('home.home')); ?></a></li>
                    <li><a href="<?php echo e(route('shoe.index')); ?>"><?php echo e(__('home.shoes')); ?></a></li>
                    <li><a href="<?php echo e(route('order.index')); ?>"><?php echo e(__('home.orders')); ?></a></li>
                    <li><a href="<?php echo e(route('bid.index')); ?>"><?php echo e(__('home.bids')); ?></a></li>
                    <li><a href="<?php echo e(route('cart.index')); ?>"><?php echo e(__('home.cart')); ?></a></li>
                </ul>
            </div>
                <div class = "login">
                    <?php if(auth()->guard()->guest()): ?>
                        <div class = "logiin">
                            <a class="nav-link active" href="<?php echo e(route('login')); ?>"><?php echo e(__('home.login')); ?></a>
                        </div>
                        <div class = "Register">
                            <a class="nav-link active" href="<?php echo e(route('register')); ?>"><?php echo e(__('home.register')); ?></a>
                        </div>
                    <?php else: ?>
                        <form id="logout" action="<?php echo e(route('logout')); ?>" method="POST">
                            <a role="button" class="nav-link active"onclick="document.getElementById('logout').submit();"><?php echo e(__('home.logout')); ?></a>
                            <?php echo csrf_field(); ?>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
            <div>
                <form method="POST" action="<?php echo e(route('lang.locale')); ?>">
                    <?php echo csrf_field(); ?>
                    <select name="locale" onchange="this.form.submit()">
                        <?php $__currentLoopData = config('app.available_locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeName => $localeCode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($localeCode); ?>" <?php echo e(app()->getLocale() == $localeCode ? 'selected' : ''); ?>>
                                <?php echo e($localeName); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </form>
            </div>
        </div>
	</nav>
    <?php echo $__env->yieldContent('content'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</body>
</html><?php /**PATH C:\Users\simoe\OneDrive - Universidad EAFIT\Universidad\7ptimo semestre\Topicos SW\Repo\bseller\bseller\resources\views/layouts/app.blade.php ENDPATH**/ ?>