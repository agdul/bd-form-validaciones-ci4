<?php echo $this->extend('front\layouts\layout') ?>

<?php echo $this->section('contenido'); ?>

<div class="container mt-3">
    <div class="table-responsive ">
        <table class="table table-sm table-danger table-striped table-hover">
            <?php if (session()->has('success_message')) : ?>
                <div class="alert alert-success text-center">
                    <?= session('success_message') ?>
                </div>
            <?php endif; ?>
            <thead>
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Funcion</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Alta</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($users as $user) : ?>
                    <tr class="text-center">
                        <td class="align-middle"><?= $user->id_user; ?></td>
                        <td class="align-middle">
                        <button type="button" class="btn btn-warning" onclick="window.location.href='<?php echo base_url('edit_user/'.$user->id_user); ?>'">Editar
                        </button>

                         <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop" 
                         data-id="<?= $user->id_user; ?>" data-name="<?= $user->nombre_user?>" data-nick="<?=$user->nombre_usuario?>">
                         Eliminar
                        </button> </td>
                        <td class="align-middle"><?= $user->nombre_usuario; ?></td>
                        <td class="align-middle"><?= $user->nombre_user; ?></td>
                        <td class="align-middle"><?= $user->apellido_user; ?></td>
                        <td class="align-middle"><?= $user->correo_user; ?></td>
                        <td class="align-middle"><?= $user->tel_user; ?></td>
                        <td class="align-middle"><?= $user->fechaUp_user; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-custom">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Esta seguro que desa eliminar a <span id="userNombre"></span>?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Esta por eliminar el usuario id : <span id="userIdToDelete"></span></p>
                        <p>Nombre de usuario : <span id="nickName"></span></p>
        
                    </div>
                    <div class="modal-footer bg-custom">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="eliminarUsuario">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php echo $this->endSection(); ?>