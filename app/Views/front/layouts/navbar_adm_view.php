<!-- Recupero con service('uri') recupero la la pag actual y con el get segmet recupero el primer segmento de la direccion -->

<?php $currentPage = service('uri')->getSegment(1); ?>

<!-- inicio del Navbar -->

<nav class="navbar navbar-expand-lg bg-custom rounded mt-2" aria-label="Eleventh navbar example">
  <div class="container-fluid logotipo">
    <!-- El Logo de la empresa con su respectiva referencia  -->
    <a class="navbar-brand" href="<?php echo base_url("index") ?>">
      <img class="img rounded-pill" src="<?php echo base_url("assets/img/serafina/serafina_logo.jpeg") ?>" alt="Logo de la marca" width="75" height="auto">
    </a>
    <!-- las clases navbar-brand y d-lg-none, lo que significa que se mostrará 
    como una marca de la barra de navegación y estará oculto en tamaños de pantalla lg y superiores. -->
    <a class="navbar-brand d-lg-none navbar-brand-custom" href="#">
      <?php echo esc($titulo); ?>
    </a> <!-- Este es el título que se muestra cuando la barra de navegación se colapsa -->

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">

      </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample09">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?php echo ($currentPage == 'productos') ? 'active' : '' ?>" href="#" data-bs-toggle="dropdown" aria-expanded="false">CRUD - Usuario</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?= base_url('dashboard');?>">Ver Usuarios</a></li>
              <li><a class="dropdown-item" href="<?= base_url('add_user');?>">Agregar Usuario</a></li>
            </ul>
        </li>
        
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?php echo ($currentPage == 'productos') ? 'active' : '' ?>" href="#" data-bs-toggle="dropdown" aria-expanded="false">CRUD - Productos</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Ver Producto</a></li>
              <li><a class="dropdown-item" href="#">Agregar Producto</a></li>
            </ul>
        </li>

      <li class="nav-item">
          <a class="nav-link <?php echo ($currentPage == 'login') ? 'active' : '' ?>" href="<?php echo base_url('cerrar_sesion')?>"> Cerrar Session</a>
        </li>
      </ul>

      <form role="search">
        <input class="form-control" type="search" placeholder="Busca un producto" aria-label="Search">
      </form>
    </div>
  </div>
</nav>

<!-- fin del Navbar -->