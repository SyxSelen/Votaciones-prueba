<nav class="navbar navbar-expand-lg navbar-light bg-light" >
  <div class="container-fluid" style="background:#f97d25; " >
<a class="navbar-brand" href="menu_principal.php" style="color:#fff;">Menu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #000;">
            Gestionar Candidatos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="GestionarCandidatos/RegistrarCandidatos.php" >Registrar</a></li>
            <li><a class="dropdown-item" href="#">Listar</a></li>
            <li><a class="dropdown-item" href="#">Editar</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#000;">
            Gestionar Votantes
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Restablecer contraseña</a></li>
            <li><a class="dropdown-item" href="GestionarVotantes/Registrar.php" >Registrar</a></li>
            <li><a class="dropdown-item" href="#">Listar</a></li>
            <li><a class="dropdown-item" href="#">Actualizar</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#000;">
            Gestionar reportes
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="GestionarReportes/ListarVotantes.php">Listar votantes</a></li>
            <li><a class="dropdown-item" href="#" >Mostrar candidatos x cantidad de votos</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="AgendarVotacion.php"  style="color:#000;">Registrar agenda de votacion</a>
        </li>
      </ul>
      </div>
      <?php print("Bienvenido Administrador. "); ?>
    <div class="cerrar_sesion" style="margin: 0 10px;"><a style="text-decoration: none;   " href="../cerrarsesion.php">Cerrar Sesion</a></div>
  </div>
  </nav>