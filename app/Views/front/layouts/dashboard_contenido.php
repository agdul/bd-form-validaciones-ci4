<?php echo $this->extend('front\layouts\layout') ?>
<?php echo $this->section('contenido'); ?>


<?php $nivel = $session->get('nivel')?>
    <?php if($nivel == 0) :?>
        <?php echo $this->include('front\layouts\productos_contenido'); ?> ?>
    <?php elseif ($nivel == 1) : ?>
        <?php echo $this->include('front\layouts\users_table') ?>
    <?php else :  ?>    
        <?php return false ?>
    <?php endif;?>

<?php echo $this->endSection(); ?>