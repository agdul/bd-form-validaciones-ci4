<?php
$nivel;
$nivel = 0;
/**
 * @var CodeIgniter\View\View $this
 */
?>
<!-- Inicio del Head  -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo esc($t_head); ?></title>
    <link href="<?php echo base_url("assets/css/bootstrap.min.css")?>" rel="stylesheet">
    <link href=<?php echo base_url("assets/css/style.css")?> rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <!-- CLASES DE FONT AWESOME 
       para los iconos del footer-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" type="image/png" href="assets/img/serafina/mate.png">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/serafina/mate.png')?>">
</head>

<header class="text-center">
    <div class="texto-deslizante">
    <p>PAGOS EN EFECTIVO / TRANSFERENCIA 10% DE DESCUENTO || COMPRAS MAYORES A $25000 ENVIO GRATIS (CORRIENTES, CAPITAL)</p>
    </div>
    <div class="text-center mx-auto img-contenido pb-2">
    <img class="rounded img-fluid mx-auto d-block" src="<?php echo base_url("assets/img/serafina/bienvenida.jpeg") ?>" alt="Bienvenida">
    </div>
    
</header>


<!-- Fin del header  -->

<body>
    <!-- (0-Usuario || 1-Administrador) -->
    <?php $nivel = $session->get('nivel')?>
    <?php if($nivel == 0) :?>
        <?php echo $this->include('front/layouts/navbar_view'); ?>
    <?php elseif ($nivel == 1) : ?>
        <?php echo $this->include('front/layouts/navbar_adm_view') ?>
    <?php else :  ?>    
        <?php echo $this->include('front/layouts/navbar_view') ?>
    <?php endif;?>

    <?php echo $this->renderSection('contenido'); ?>

    <!-- inicio del footer -->
    <footer class="bg-custom text-center text-muted mt-auto py-3">
        <div class="container">
            <!-- Iconos de redes sociales -->
            <div class="mb-3">
                <a href="https://www.facebook.com" class="btn btn-outline-secondary btn-sm"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.twitter.com" class="btn btn-outline-secondary btn-sm"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/_serafinadeco/" class="btn btn-outline-secondary btn-sm"><i class="fab fa-instagram"></i></a>
            </div>
            <p>© 2024 Sitio web desarrolado por Hamm, Abdul. Todos los derechos reservados. <br></p>
        </div>
    </footer>
    <!-- fin del footer -->

    <script src= "<?php echo base_url("assets/js/bootstrap.bundle.min.js")?>"> </script>
    </body>

</html>