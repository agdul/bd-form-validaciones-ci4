<?php echo $this->extend('front\layouts\layout') ?>
<?php echo $this->section('contenido'); ?>





<div class="container">
<h1>HOLA GOLA</h1>
<?php var_dump($session->get('correo'))?>


</div>

<?php echo $this->endSection(); ?>