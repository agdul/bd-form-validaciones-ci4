<?php echo $this->extend('front\layouts\layout') ?>
<?php echo $this->section('contenido'); ?>

<div class="container">
    <section id="sub_contenido" class="my-3">
        <p class="lead text-justify">
        Desde mi infancia, mi nombre, Celeste, ha sido un reflejo de mi pasión por los colores y la creatividad. Crecí con un pincel en la mano y una imaginación desbordante, soñando con lienzos que aún no había pintado. Con el tiempo, esa pasión infantil se transformó en una vocación, llevándome a perfeccionar mi arte y a sumergirme profundamente en el mundo fascinante del arte.<br>

        <br>Hoy, con orgullo y alegría, puedo decir que mi sueño de niña se ha materializado en mi emprendimiento: una colección única de mates pintados a mano, cada uno imbuido de la esencia artesanal de mi querida ciudad natal, Corrientes Capital. En cada mate, hay una historia; en cada diseño, hay un pedazo de mi alma.<br>

        <br>Serafina es más que un nombre; es una promesa de calidad, originalidad y belleza. Cada mate que sale de nuestro taller es un testimonio de la tradición artesanal argentina, una celebración de la cultura y un homenaje al arte del mate. Con cada pincelada, busco capturar no solo la atención visual sino también el corazón de quien lo sostiene.<br>

        <br>Nuestros mates son símbolos de hospitalidad y amistad, compañeros fieles en cada sorbo compartido. Son piezas que no solo sirven para disfrutar del mate sino que también adornan hogares y enriquecen momentos.<br>

        <br>En Serafina, cada mate es una invitación a apreciar el arte en su forma más funcional y encantadora. Te invito a ser parte de esta aventura artística y a encontrar el mate que resuene contigo y tus tradiciones.<br>

        <br>Gracias por acompañarme en este viaje colorido y por elegir Serafina, donde cada trazo cuenta una historia y cada mate es una obra maestra esperando ser descubierta.<br>
        </p>

    </section>

    <!-- Inicio del carrusel de quienes somos -->
    <div id="carouselExampleCaptions" class="carousel slide mb-3">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div id="quienesomos_carousel-item" class="carousel-inner">
            <div class="carousel-item active">
                <img src=<?php echo site_url("assets/img/serafina/productos/6.jpeg") ?> class="d-block " alt="...">
                <div class="carousel-caption d-none d-md-block text-black">
                 
                </div>
            </div>
            <div id="quienesomos_carousel-item" class="carousel-item">
                <img src=<?php echo site_url("assets/img/serafina/productos/7.jpeg") ?> class="d-block" alt="...">
                <div class="carousel-caption d-none d-md-block text-black">
                
                </div>
            </div>
            <div id="quienesomos_carousel-item" class="carousel-item">
                <img src=<?php echo site_url("assets/img/serafina/productos/8.jpeg") ?> class="d-block" alt="...">
                <div class="carousel-caption d-none d-md-block text-black">
                    
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- fin del carrusel de quienes somos -->

</div>
<?php echo $this->endSection(); ?>