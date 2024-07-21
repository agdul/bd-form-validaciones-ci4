<?php echo $this->extend('front\layouts\layout') ?>
<?php echo $this->section('contenido'); ?>


<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Cargar - Nuevo Usuario</h1>
            <p class="col-lg-10 fs-4 text-justify">
            <button class="w-100 btn btn-lg bg-custom-btn-1" type="button" onclick="window.location.href='<?php echo base_url('dashboard'); ?>'">Ver Usuarios</button>
            </p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" action="<?php base_url('cargar_user') ?>" method="post" autocomplete="off">
                <!-- Mostrar mensaje de error si el usuario ya existe -->
                <?php if (session()->has('error_message')) : ?>
                    <div class="alert alert-danger">
                        <?= session('error_message') ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->has('success_message')) : ?>
                    <div class="alert alert-success">
                        <?= session('success_message') ?>
                    </div>
                <?php endif; ?>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput-Usuario" placeholder="fulanito_kpo123" name="nombre_usuario" required>
                    <label for="floatingInput">Nombre de Usuario</label>
                    <?php if (isset($validation) && $validation->hasError('nombre_usuario')) : ?>
                        <div class="alert alert-danger"><?php echo $validation->getError('nombre_usuario') ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput-Nombre" placeholder="Fulanito" name="nombre_user" required>
                    <label for="floatingInput">Nombre</label>
                    <?php if (isset($validation) && $validation->hasError('nombre_user')) : ?>
                        <div class="alert alert-danger"><?php echo $validation->getError('nombre_user') ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput-Apellido" placeholder="Inserte Apellido" name="apellido_user" required>
                    <label for="floatingInput">Apellido</label>
                    <?php if (isset($validation) && $validation->hasError('apellido_user')) : ?>
                        <div class="alert alert-danger"><?php echo $validation->getError('apellido_user') ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput-Email" placeholder="name@example.com" name="correo_user" required>
                    <label for="floatingInput">Correo Electronico</label>
                    <?php if (isset($validation) && $validation->hasError('correo_user')) : ?>
                        <div class="alert alert-danger"><?php echo $validation->getError('correo_user') ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="contrasena_user" required>
                    <label for="floatingPassword">Contraseña</label>
                    <?php if (isset($validation) && $validation->hasError('contrasena_user')) : ?>
                        <div class="alert alert-danger"><?php echo $validation->getError('contrasena_user') ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-floating mb-3">
                    <input type="tel" class="form-control" id="floatingInput-Tel" placeholder="Num de tel" name="tel_user" required>
                    <label for="floatingInput">Numero de Telefono</label>
                    <?php if (isset($validation) && $validation->hasError('tel_user')) : ?>
                        <div class="alert alert-danger"><?php echo $validation->getError('tel_user') ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput-Adress" placeholder="Direccion" name="direccion_user" required>
                    <label for="floatingInput">Direccion</label>
                    <?php if (isset($validation) && $validation->hasError('direccion_user')) : ?>
                        <div class="alert alert-danger"><?php echo $validation->getError('direccion_user') ?></div>
                    <?php endif; ?>
                </div>
                <hr class="my-4">
                <button class="w-100 btn btn-lg bg-custom-btn" type="submit">Agregar Usuario</button>
            </form>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>