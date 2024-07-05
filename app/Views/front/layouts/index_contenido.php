<?php

/**
 * @var CodeIgniter\View\View $this
 */
?>

<?php echo $this->extend('front\layouts\layout') ?>

<!-- Abiendo estructura que mostrara el contenido en el layout -->
<?php echo $this->section('contenido'); ?>

<div id="main_contenidos" class="container">
    <section id="sub_contenido " class="my-3">
        <p class="lead text-justify">
        ¡Bienvenidos a Serafina, el corazón artesanal de la tradición! Somos una empresa familiar dedicada a la creación de mates artesanales, cada uno con su propia historia y personalidad. Nuestra pasión es llevar a tu hogar no solo un producto, sino una pieza de arte que celebra la cultura y el arte del mate.<br>
        
        <br>En Serafina, creemos que cada sorbo de mate debe ser una experiencia única. Por eso, nuestros artistas dedican su talento y atención en pintar cada mate a mano, asegurando que no haya dos iguales. Desde los diseños más clásicos hasta las expresiones más modernas y personalizadas, nuestros mates son el reflejo de un trato artesanal y una dedicación sin igual.<br>
        
        <br>Nuestros mates no son simplemente recipientes; son compañeros de vida, testigos de encuentros y conversaciones. Con cada detalle cuidadosamente seleccionado y cada pincelada aplicada con amor, buscamos que nuestros mates se conviertan en un símbolo de hospitalidad y amistad.<br>
        <br>En Serafina, cada mate es una obra maestra, esperando ser parte de tus momentos más preciados. Te invitamos a explorar nuestra colección y encontrar ese compañero perfecto que resonará con tu espíritu y embellecerá tus rituales diarios.<br>
        <br>Gracias por elegir la calidad, la originalidad y el alma de Serafina. ¡Celebremos juntos la belleza del arte artesanal!<br>
        </p>

    </section>

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div id="index_carousel-item" class="carousel-item active">
                <img src="assets\img\serafina\3.jpeg" class="d-block mx-auto" alt="...">
            </div>
            <div id="index_carousel-item" class="carousel-item">
                <img src="assets\img\serafina\2.jpeg" class="d-block mx-auto" alt="...">
            </div>
            <div id="index_carousel-item" class="carousel-item">
                <img src="assets\img\serafina\1.jpeg" class="d-block mx-auto" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



    <!-- PRODCUTOS -->
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
    <!-- FIN-PRODUCTOS -->
    
</div>

<!-- Cerrando estructura que se mostrara en el layout -->
<?php echo $this->endSection(); ?>