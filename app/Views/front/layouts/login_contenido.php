<?php echo $this->extend('front\layouts\layout') ?>
<?php echo $this->section('contenido'); ?>

<!-- INICIO DEL LOGIN -->


<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Arte y Tradición en Cada Inicio de Sesión</h1>
        <p class="col-lg-10 fs-4 text-justify">Inicia sesión y descubre el encanto de los mates artesanales de Serafina, pintados a mano y únicos en su especie. Conéctate con la tradición y personaliza tu experiencia. Cada mate cuenta una historia; inicia la tuya hoy. ¡Explora nuestra colección exclusiva y encuentra tu compañero perfecto!</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" action="<?php base_url('login')?>" method="post" autocomplete="off">
          <!-- Mostrar mensaje de éxito si el registro fue exitoso -->
          <?php if (session()->has('success_message')) : ?>
                  <div class="alert alert-success">
                       <?= session('success_message') ?>
                  </div>
          <?php endif; ?>
           <!-- Mostrar mensaje de error de password o correo si el registro fue exitoso -->
          <?php if (session()->has('error_message')) : ?>
                  <div class="alert alert-danger">
                      <?= session('error_message') ?>
                  </div>
          <?php endif; ?>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com", name="correo" required>
            <label for="floatingInput">Correo Electronico</label>
            <?php if (isset($validation) && $validation->hasError('correo')): ?>
              <div class="alert alert-danger"><?php echo $validation->getError('correo')?></div>
            <?php endif; ?>
       
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password", name="contrasena" required>
            <label for="floatingPassword">Contraseña</label>
            <?php if (isset($validation) && $validation->hasError('contrasena') ): ?>
              <div class="alert alert-danger"><?php echo $validation->getError('contrasena')?></div>
            <?php endif; ?>
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Recordame!
            </label>
          </div>
          <button class="w-100 btn btn-lg bg-custom-btn" type="submit">Iniciar Sesión</button>
          <hr class="my-4">
          <small class="text-body-secondary">Todavia no tenes cuenta!?</small>
          <button class="w-100 btn btn-lg bg-custom-btn-1" type="button" onclick="window.location.href='<?php echo base_url('registrate'); ?>'">Registrate</button>
        </form>
      </div>
    </div>
  </div>


  <!-- FIN DEL LOGIN -->

<?php echo $this->endSection(); ?>