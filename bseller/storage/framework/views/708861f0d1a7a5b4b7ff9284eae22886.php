<?php $__env->startSection('title', 'Home Page - BSeller'); ?>
<?php $__env->startSection('content'); ?>

<div class="main">
    <div class = "mainText">
        <div class="secondText">
            <span><?php echo e(__('home.welcome')); ?></span>
        </div>
    </div>

    <div class = "mainSlider">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="<?php echo e(URL::asset('/storage/img/index/navImageNB.svg')); ?>" class="d-block" alt="">
              </div>
              <div class="carousel-item">
                <img src="<?php echo e(URL::asset('/storage/img/index/navImageJordan.svg')); ?>" class="d-block" alt="">
              </div>
              <div class="carousel-item">
                <img src="<?php echo e(URL::asset('/storage/img/index/navImageTrending.svg')); ?>" class="d-block" alt="">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="brandSpace">
        <div class="tituloFila">
            <b>Nuestras marcas</b>
        </div>
        <div class="espacioFila">
            <div class="fila">
                <div class="columnaC4">
                    <img src="<?php echo e(URL::asset('/storage/img/index/womenNike.jpg')); ?>">
                </div>
                <div class="columnaC4">
                    <img src="<?php echo e(URL::asset('/storage/img/index/menJordan.jpg')); ?>">
                </div>
                <div class="columnaC4">
                    <img src="<?php echo e(URL::asset('/storage/img/index/menNewBalance.jpg')); ?>">
                </div>
                <div class="columnaC4">
                    <img src="<?php echo e(URL::asset('/storage/img/index/womenReebok.jpg')); ?>">
                </div>
            </div>
        </div>
    </div>

    <div class="ourStore">
        <div class="tituloFila">
            <b>Nuestras tiendas</b>
        </div>
        <div class="espacioFila">
            <div class="fila">
                <div class="columnaC3">
                    <h3>Somos expertos en la reventa de sneakers.</h3>
                    <p>En bseller sabemos que mas que unos sneakers, son una forma de expresion e identidad, por eso contamos con los ultimos modelos y las mejores marcas.</p>
                </div>
                <div class="columnaC3">
                    <img src="<?php echo e(URL::asset('/storage/img/index/bogotaStore.svg')); ?>">
                </div>
                <div class="columnaC3">
                    <img src="<?php echo e(URL::asset('/storage/img/index/medellinStore.svg')); ?>">
                </div>
            </div>
        </div>
    </div>

    <div class="springPic">
        <div class="lacosteMen">
            <img src="<?php echo e(URL::asset('/storage/img/index/menLacoste.svg')); ?>">
        </div>
    </div>
    <footer>
        <div class="footer-content">
            <h3>BSeller</h3>
            <p>Bseller, es una tienda online de reventa de sneakers exclusivos. La cual tendrá como elemento diferenciador un sistema de pujas, con el cual se busca vender al mejor postor sus unidades únicas de sneakers.</p>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samue\Desktop\2023-01\Topicos Software\bseller\bseller\resources\views/home/index.blade.php ENDPATH**/ ?>