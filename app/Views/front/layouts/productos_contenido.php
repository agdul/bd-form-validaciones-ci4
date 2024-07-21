<?php echo $this->extend('front\layouts\layout') ?>
<!-- Abiendo estructura que mostrara el contenido en el layout -->
<?php echo $this->section('contenido'); ?>
<div id="main_contenidos" class="container"> 
<section class="container mt-5">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center mt-3 mb-3">
                <div class="card" style="width: 18rem;">
                    <img src="assets/img/serafina/productos/1.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">OLIMPIA</h5>
                        <p class="card-text text-justify">Destila armonía con su paleta de rosa, turquesa, negro y dorado, invocando tradición en cada detalle artesanal.</p>
                        <a href="#" class="btn bg-custom-btn d-flex justify-content-center">Comprar</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center mt-3 mb-3">
                <div class="card" style="width: 18rem;">
                    <img src="assets/img/serafina/productos/2.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">LUPE</h5>
                        <p class="card-text text-justify">Resplandece con naranja vibrante, negro y verde, un patrón floral que contrasta y complementa su entorno natural y sereno.</p>
                        <a href="#" class="btn bg-custom-btn d-flex justify-content-center">Comprar</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center mt-3 mb-3">
                <div class="card" style="width: 18rem;">
                    <img src="assets/img/serafina/productos/3.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">MARGARITA</h5>
                        <p class="card-text text-justify">Encanta con margaritas sobre fondo púrpura, un tapiz floral que invita a la contemplación y celebra la primavera.</p>
                        <a href="#" class="btn bg-custom-btn d-flex justify-content-center">Comprar</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center mt-3 mb-3">
                <div class="card" style="width: 18rem;">
                    <img src="assets/img/serafina/productos/4.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">ISADORA</h5>
                        <p class="card-text text-justify">Armoniza azules y rosas, un patrón floral que refleja la belleza serena del entorno natural en primavera..</p>
                        <a href="#" class="btn bg-custom-btn d-flex justify-content-center">Comprar</a>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>



<?php echo $this->endSection(); ?>